<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    function getUserName(){
        return "<h1>Ali Azeem</h1>";
    }

    function aboutUser(){
        return "<h1>Laravel Developer</h1>";
    }
}
