<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiHandlerController;
use App\Http\Controllers\ApiResContoller;
use App\Http\Controllers\UserAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return [
        'test' => 'Testing API',
        'Name' => 'John Doe',
        'Age' => 30,
        'City' => 'New York',
    ];
});

Route::resource('res', ApiResContoller::class);

Route::controller(UserAuthController::class)->group(function () {
    Route::post('/signup', 'signup');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ApiHandlerController::class)->group(function () {
        Route::get('/get-data', 'getData');
        Route::post('/post-data', 'postData');
        Route::put('/update-data/{id}', 'updateData');
        Route::delete('/delete-data/{id}', 'deleteData');
        Route::get('/search-data/{query}', 'searchData');
    });
});

Route::get('login', [UserAuthController::class, 'login'])->name('login');
