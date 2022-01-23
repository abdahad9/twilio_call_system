<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserIp;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function show(User $user)
    {
        $data['user'] = $user;
        $data['user_ips'] = UserIp::where('user_id',$user->id)->paginate(3);
        return view('admin.user.view', $data);
    }

    public function getAll(Request $request)
    {
        return datatables(User::where('role', 'user')->with('subscription'))->toJson();
    }
}
