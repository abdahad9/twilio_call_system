<?php

namespace App\Http\Controllers\Forwarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForwardingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function index()
    {
        return view('forwarding.index');
    }


    public function edit()
    {
        return view('forwarding.edit');
    }
}
