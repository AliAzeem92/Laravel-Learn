<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserDBController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApiCallController;
use App\Http\Controllers\DBQueryController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\InsertDataController;

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

Route::get('dummy-api-call', [ApiCallController::class, 'getData']);


Route::get('DBQuery', [DBQueryController::class, 'query']);

Route::view('login', 'login');
Route::post('session', [SessionController::class, 'login']);
Route::view('session', 'session');

Route::view('add', 'insert-data')->name('insert.form');
Route::controller(InsertDataController::class)->group(function () {
    Route::post('add', 'add')->name('insert.store');
    Route::get('data', 'fetchData')->name('Inserted-Data-Fetch');
    Route::get('delete/{id}', 'delete')->name('insert.delete');
    Route::get('edit/{id}', 'populateData')->name('insert.populateData');
    Route::put('edit/{id}', 'update')->name('insert.update');
    Route::get('search', 'search')->name('insert.search');
});