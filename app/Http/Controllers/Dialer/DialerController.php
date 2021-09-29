<?php

namespace App\Http\Controllers\Dialer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DialerController extends Controller
{
    public function index()
    {
    	return view('dialer.index');
    }
}
