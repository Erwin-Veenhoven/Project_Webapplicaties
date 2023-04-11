<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/contract', function () {
    return view('contract');
});

Route::get('/monitor', function () {
    return view('monitor');
});

Route::get('/user_reg', function () {
    return view('user_reg');
});

Route::get('/about', function () {
    return view('about');
});

Route::resource('/auth', 'App\Http\Controllers\userController');

