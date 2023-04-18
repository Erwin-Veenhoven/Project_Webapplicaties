<?php

use App\Http\Controllers\WeatherDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::get('/monitor', [WeatherDataController::class, 'showWeatherData'])->name('monitor');

Route::post('/monitor', [WeatherDataController::class, 'showWeatherDataKey'])->name('monitor');

Route::get('/user_reg', function () {
    return view('user_reg');
});

Route::get('/about', function () {
    return view('about');
});

//Route::resource('/auth', 'App\Http\Controllers\userController');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/postWeatherData', [WeatherDataController::class, 'postWeatherData'])->name('postWeatherData');

