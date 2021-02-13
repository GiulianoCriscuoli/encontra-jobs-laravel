<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/', [JobController::class, 'index'])->name('home');

Route::get('/vagas/criar', [JobController::class, 'create'])->name('jobs.create');
Route::post('/vagas/criar', [JobController::class, 'store']);
Route::get('/vagas/vizualizar/{id}', [JobController::class, 'show'])->name('jobs.show');

Route::fallback(function() {
    return view('layouts.404');
});



