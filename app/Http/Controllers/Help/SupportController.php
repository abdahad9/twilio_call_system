<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;
use Auth;
use Mail;

class SupportController extends Controller
{
    public function index()
    {
        return view('help.index');
    }


    public function getAll()
    {
        if(Auth::user()->role == 'admin'){
            return datatables(Support::orderBy('id', 'desc'))->toJson();
        }else{
            return datatables(Support::where('user_id', Auth::id())->orderBy('id', 'desc'))->toJson();
        }
        
    }


    public function create()
    {
        return view('help.create');
    }


    public function store(Request $request)
    {
        $Support = new Support;
        $Support->name = $request->name;
        $Support->email = $request->email;
        $Support->message = $request->message;
        $Support->user_id = Auth::id();
        $is_save = $Support->save();
        if($is_save){
            //create new email for help
            try{
                $mail_to = 'support@notetakerpro.com';
                $details = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'message' => $request->message,
                    'user' => Auth::user()->name,
                ];
                Mail::to($mail_to)->send(new \App\Mail\NeedHelp($details));
            }catch(\Throwable $e){
                    \Log::info('help error.', ['id' => $e->getMessage()]);
            }
        }
        $request->session()->flash('success', 'Support added successfully!');
        return redirect()->route('help.index');
    }
}
