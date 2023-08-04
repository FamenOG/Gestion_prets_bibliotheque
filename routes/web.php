<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;

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

Route::get('/login', [UserController::class,"login"]);
Route::post('/login-traitement', [UserController::class,"doLogin"]);
Route::get('/sign-in/{role}', [UserController::class,"signIn"]);
Route::post('/create-client/{role}', [UserController::class, "createUser"]);

Route::get('/list-book', function () {
    return view('book.client.list-book');
});

Route::get('/detail-book', function () {
    return view('book.client.detail-book');
});

Route::get('/create-book', function () {
    return view('book.create-book');
});
