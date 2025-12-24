<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDataController extends Controller
{
    function addUserData(Request $request)
    {
        $request->validate([
            'name' => 'required | min:3',
            'email' => 'required | email',
            'password' => 'required | min:8',
        ],[
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password must be at least 8 characters',
        ] );

        return $request;


    }
}
