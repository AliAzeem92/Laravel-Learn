<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDBController extends Controller
{
    function users() {
        $users = DB::select("SELECT * FROM users");
        return view('users', ["users" => $users]);
    }
}
