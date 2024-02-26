<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\UserController;
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
    return view('index');
})->name('index');
Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/performances', function () {
    return view('performances.index');
})->name('performances.index');
Route::post('/register',[UserController::class, 'store'])->name('register');
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');



Route::get('/addPerformance/{performance}',[CartController::class, 'addPerformance'])->name('addPerformance');




Route::group(['admin' => 'middleware'], function (){
    Route::resource('genres', GenreController::class);
    Route::resource('performances', PerformanceController::class);
});


