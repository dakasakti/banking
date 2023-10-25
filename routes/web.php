<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
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
    return view('layouts.home');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('admin/application', ApplicationController::class);

    Route::resource('admin', AdminController::class)->scoped([
        'admin' => 'invoice'
    ]);
});
