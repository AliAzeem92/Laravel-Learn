<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserDBController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApiCallController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/user', [userController::class, 'getUserName']);
Route::get('/about', [userController::class, 'aboutUser']);

Route::get('/home', function () {
    $name = "Ali";

    return view('home', ["name" => $name ]);
});

Route::view('input-form', 'input-form')->name('form');

Route::post('addUserData', [UserDataController::class, 'addUserData']);


Route::prefix('user')->group(function () {
    Route::get('/home', function () {
    $name = "Ali";

    return view('home', ["name" => $name ]);
    });
    Route::get('/name', [userController::class, 'getUserName']);
    Route::get('/about', [userController::class, 'aboutUser']);
});


// Route::controller(StudentController::class)->group(function () {
//     Route::get('/student-name', 'name');
//     Route::get('/student-age', 'age');
//     Route::get('/student-gender', 'gender');
    
//     Route::get('about/{name}', 'about');
// });

Route::get('users', [UserDBController::class, 'users']);


Route::get('students', [StudentController::class, 'getData']);

Route::get('api-call', [ApiCallController::class, 'getData']);
