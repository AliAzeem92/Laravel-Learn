<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiCallController extends Controller
{
    function getData(){
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $response = $response->json();
        return view('api-call', ['data' => $response]);
    }
}
