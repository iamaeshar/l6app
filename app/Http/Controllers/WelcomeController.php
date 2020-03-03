<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $users = User::with('profile.country:id,name')->get();
        return view('welcome', compact('users'));
    }
}
