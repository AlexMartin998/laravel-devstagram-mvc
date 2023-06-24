<?php

use Illuminate\Support\Facades\Route;
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


// // controller
Route::get('/signup', [RegisterController::class, 'index']); // [class controller, method]

