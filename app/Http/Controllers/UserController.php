<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users, 'active' => 'user']);
    }

    public function profile(int $id) {
        $user = User::find($id);
        $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email))) . "?d=mp&s=80&r=g";
        return view('user.profile', ['user' => $user, 'grav_url' => $grav_url, 'active' => 'user']);
    }

    public function edit(int $id)
    {
        return "Comming soon";
    }
}