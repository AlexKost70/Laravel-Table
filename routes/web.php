<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\FilesController;

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

Route::group(['middleware' => 'guest'],function () {
    Route::get('/', function () { return view('main'); })->name('main');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'],function () {
    Route::get('/table', [MainController::class, 'index'])->name('table');
    Route::get('/files', function () { return view('files'); })->name('files');
    Route::post('/upload', [FilesController::class, 'upload'])->name('upload');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});





