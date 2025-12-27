<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBQueryController extends Controller
{
    function query(){
        // $data = DB::table('students')->get();
        $data = DB::table('students')->find(2);
        return view('DBQuery', compact('data'));
    }
}
