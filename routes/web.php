<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\BookController;
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


Route::get('/book-catalog', [BookController::class, "catalog"]);
Route::get('/detail-book', [BookController::class, "details"]);

Route::get('/library', [BookController::class, "library"]);

Route::get('/create-book', function () {
    $categories = Category::all();
    return view('book.create-book', compact('categories'));
});


// Route::get('/session', function (Request $request) {
//     $user = $request->session()->get('user');
//     return $user->role_id;
// });
// Route::post('/create-book', function (Request $request) {
//     $categories = $request->input('category');
//     foreach ($categories as $category) {
//         echo $category;
//     }
// });
