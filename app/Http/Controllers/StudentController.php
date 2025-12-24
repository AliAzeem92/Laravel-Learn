<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function getData(){
        $students = \App\Models\Student::all();
        return view('students', ['students' => $students]);
    }
}
