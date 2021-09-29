<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function storeprofileinfo(Request $request)
    {
         $input = $request->all();
            // $this->validateGenral($request);
            // dd($input['config']);

        $setting = Setting::where('key', 'site')->first();

        if (array_key_exists("profile",$input['config'])) {

                $img = $request->file('config')['profile'];
                $path = Storage::disk('public')->put('/',$img);
                $input['config']['profile']=$path;    
            }

        $setting->updateConfig($input['config']);

        $request->session()->flash('success', 'Updated successfully!');
        return back();
    }



    public function myprofile()
    {
        return view('profile.myprofile');
    }
    public function editprofile()
    {
        return view('profile.editprofile');
    }
}
