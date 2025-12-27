<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    function login(Request $request){
        $request->session()->put('email', $request->input('email'));   
        return redirect('session');
    }
}
