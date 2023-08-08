<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LibrarianController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Controller;
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

Route::get('/login', [UserController::class, "login"]);
Route::post('/login-traitement', [UserController::class, "doLogin"]);
Route::get('/sign-in/{role}', [UserController::class, "signIn"]);
Route::post('/create-client/{role}', [UserController::class, "createUser"]);
Route::get('/log-out', [UserController::class, 'logOut']);

Route::get('id', [ClientController::class, 'setIdUser']);

Route::get('/book-catalog/{category}', [BookController::class, "catalog"]);
Route::get('/detail-book/{book}', [BookController::class, "details"]);
Route::get('/library/{client}', [BookController::class, "library"]);
Route::post('/create-book-traitement', [BookController::class,"create"]);

Route::get('/create-book', [LibrarianController::class,"formCreate"]);
Route::get('list-client', [LibrarianController::class, 'listClient']);
Route::get('loan-book/{librarian}/{client}/{book}', [LibrarianController::class, 'loan']);
Route::get('/back-book/{librarian}/{client}/{loan}/{book}', [LibrarianController::class, 'back']);