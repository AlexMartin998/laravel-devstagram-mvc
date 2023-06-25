<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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

// // closure
Route::get('/', function () {
    // blade es el     template engine     de laravel
    return view('home'); // /resources/views/file.blade.php <- renderiza la view
});



// // // controllers
Route::get('/register', [RegisterController::class, 'index'])->name('register'); // [class controller, method] ->name('name') <- tomarlo en la view y asi tenerlo dinamico
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'init'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');



Route::get('/muro', [PostController::class, 'init'])->name('posts.index');
