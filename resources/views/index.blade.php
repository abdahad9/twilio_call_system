<?php
require_once ('config.php');
include_once ('save.php');

require __DIR__ . '/vendor/autoload.php';
if(session_id() == ''){
    session_start();
 }

 if (isset($_GET['code'])){

    $authCode = trim($_GET['code']);
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    $client->setAccessToken($accessToken);
    $token=json_encode($client->getAccessToken());
    $_SESSION['token']=$token;
    $service2= new Google_Service_Oauth2($client);
    $email= $service2->userinfo_v2_me->get()->email;
    $savingpage = new save;
    $savingpage ->save_email($email);
    $savingpage->delete($email);
    $emailid = $savingpage->getemailid($email);
     $service = new Google_Service_Calendar($client);
     $calendarId = 'primary';
      $results = $service->events->listEvents($calendarId);
 $events = $results->getItems();
     for ($x = 0; $x < count($events); $x++){
        if(isset($events[$x]->conferenceData['entryPoints'][2]->pin)) {$pin =($events[$x]->conferenceData['entryPoints'][2]->pin);} else {$pin = "null";};
        if(isset($events[$x]->conferenceData['entryPoints'][2]->label)) {$phone = ($events[$x]->conferenceData['entryPoints'][2]->label);} else {$phone = "null";};
        $Totalguest='';
        $guests= $events[$x]['attendees']; foreach ($guests as $guest) { $Totalguest = $Totalguest. ($guest->email). " \n";};
       $done= $savingpage->save($email,$emailid, $events[$x]->start->dateTime,$events[$x]->getSummary(),$events[$x]->getDescription(),$events[$x]->getLocation(),$events[$x]->getHangoutLink(),$events[$x]->organizer->email,$phone,$pin,$Totalguest);
     }
     header("Location: /");
}else{


// Request authorization from the user.
$authUrl = $client->createAuthUrl();

header("Location: ".$authUrl);
die;
}
?>
