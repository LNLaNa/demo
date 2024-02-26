<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PerformanceController;
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
});
Route::get('/contacts', function () {
    return view('contacts');
});


Route::get('/registration', [AuthController::class, 'registrationPage'])->name('registrationPage');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');
Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('performances', PerformanceController::class)->only('index','show');

Route::middleware(['auth'])->group(function () {
    Route::get('/addPerformance/{performance}',[CartController::class, 'addPerformance'])->name('addPerformance');
    Route::get('/removePerformance/{performance}',[CartController::class, 'removePerformance'])->name('removePerformance');
});

Route::middleware(['admin'])->group(function () {
//    Route::get('/admin', [AdminController::class,'index'])->name('admin');
    Route::resource('genres', GenreController::class)->except('destroy');
    Route::get('/genres/{genre}/delete',[GenreController::class,'destroy'])->name('genres.destroy');

    Route::resource('performances', PerformanceController::class)->except('destroy','index','show');
    Route::get('/performances/{performance}/delete',[PerformanceController::class,'destroy'])->name('performances.destroy');
});

//Выполнение команд artisan - без терминала
//Route::get('storage', function () {
//    \Illuminate\Support\Facades\Artisan::call('storage:link');
//});
