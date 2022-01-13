<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Google_Client;
use Google_Service_Oauth2;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;
use Session;
use DB;


class gCalendarController extends Controller
{
 
    
    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig('credentials.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);

        $this->client = $client;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = DB::table('scraper')
        ->where('status', '!=', 'added')
        // ->orWhere('archived', '!=', 'yes')
        ->orWhereNull('status')
        // ->orWhereNull('archived')
        ->get();

        // dd($meetings);
        return view('calander.calander')->with('meetings',$meetings);

        session_start();
        if (isset($_SESSION['access_token']) ) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $service2= new Google_Service_Oauth2($this->client);
            $email= $service2->userinfo_v2_me->get()->email;
            // dd($email);
            $savingpage = new save;
            $savingpage->save_email($email);
            $savingpage->delete($email);
            $emailid = $savingpage->getemailid($email);
             $service = new Google_Service_Calendar( $this->client);
             $calendarId = 'primary';
              $results = $service->events->listEvents($calendarId);
         $events = $results->getItems();
         for ($x = 0; $x < count($events); $x++){
                //  dd($events);
                if(isset($events[$x]->conferenceData['entryPoints'][2]->pin)) {$pin =($events[$x]->conferenceData['entryPoints'][2]->pin);} else {$pin = "null";};
                if(isset($events[$x]->conferenceData['entryPoints'][2]->label)) {$phone = ($events[$x]->conferenceData['entryPoints'][2]->label);} else {$phone = "null";};
                if(isset($events[$x]->start->dateTime)) {$startdate = ($events[$x]->start->dateTime);} else {$startdate = "null";};
                if(isset($events[$x]->organizer->email)) {$organizerEmail = ($events[$x]->organizer->email);} else {$organizerEmail = "null";};
                $Totalguest='';
                $guests= $events[$x]['attendees']; foreach ($guests as $guest) { $Totalguest = $Totalguest. ($guest->email). " \n";};
               $done= $savingpage->save($email,$emailid,$startdate,$events[$x]->getSummary(),$events[$x]->getDescription(),$events[$x]->getLocation(),$events[$x]->getHangoutLink(),$organizerEmail,$phone,$pin,$Totalguest);
             }

             return view('calander.calander');
            // return "Thank you! You have successfully connected your GSuite Account to NoteTakerPro. By doing this will start to sync your calendar meetings over to our platform.";

        } else {
            return redirect('/oauth');
        }

    }
    public function calendarlogout(){
      // If you are using session_name("something"), don't forget it now!
session_start();
unset($_SESSION['access_token']);

        // return redirect('/cal');
    }

    public function oauth()
    {
        session_start();

        $rurl = action('gCalendarController@oauth');
        $this->client->setRedirectUri($rurl);
        $this->client->addScope("https://www.googleapis.com/auth/userinfo.email");
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            return redirect()->route('cal.index');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();
        $startDateTime = $request->start_date;
        $endDateTime = $request->end_date;

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => $request->title,
                'description' => $request->description,
                'start' => ['dateTime' => $startDateTime],
                'end' => ['dateTime' => $endDateTime],
                'reminders' => ['useDefault' => true],
            ]);
            $results = $service->events->insert($calendarId, $event);
            if (!$results) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'message' => 'Event Created']);
        } else {
            return redirect()->route('oauthCallback');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $eventId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($eventId)
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);

            $service = new Google_Service_Calendar($this->client);
            $event = $service->events->get('primary', $eventId);

            if (!$event) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'data' => $event]);

        } else {
            return redirect()->route('oauthCallback');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $eventId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $eventId)
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $startDateTime = Carbon::parse($request->start_date)->toRfc3339String();

            $eventDuration = 30; //minutes

            if ($request->has('end_date')) {
                $endDateTime = Carbon::parse($request->end_date)->toRfc3339String();

            } else {
                $endDateTime = Carbon::parse($request->start_date)->addMinutes($eventDuration)->toRfc3339String();
            }

            // retrieve the event from the API.
            $event = $service->events->get('primary', $eventId);

            $event->setSummary($request->title);

            $event->setDescription($request->description);

            //start time
            $start = new Google_Service_Calendar_EventDateTime();
            $start->setDateTime($startDateTime);
            $event->setStart($start);

            //end time
            $end = new Google_Service_Calendar_EventDateTime();
            $end->setDateTime($endDateTime);
            $event->setEnd($end);

            $updatedEvent = $service->events->update('primary', $event->getId(), $event);


            if (!$updatedEvent) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'data' => $updatedEvent]);

        } else {
            return redirect()->route('oauthCallback');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $eventId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($eventId)
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $service->events->delete('primary', $eventId);

        } else {
            return redirect()->route('oauthCallback');
        }
    }

    public function addmeeting(Request $request)
    { 
        try{

            DB::update('update scraper set status = ? where ID = ?',['added',$request->id]);

            return response()->json(['Status' => '200']); //return response in json format
        }
        catch (\Exception $e) {
             //catch block for catching all exceptions
            return redirect()->back()->with('error', 'Error Encounted while approving advertisement'.$e->getMessage());
        }
    }

    public function deletemeeting(Request $request)
    { 
        try{

            DB::update('update scraper set archived = ? where ID = ?',['yes',$request->id]);

            return response()->json(['Status' => '200']); //return response in json format
        }
        catch (\Exception $e) {
             //catch block for catching all exceptions
            return redirect()->back()->with('error', 'Error Encounted while approving advertisement'.$e->getMessage());
        }
    }
}