<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Frontend/Home');
})->name('home');


Route::middleware(['auth','verified'])->get('/dashboard', function(){
    return Inertia::render('User/Dashboard');
})->name('dashboard');

Route::middleware(['auth','verified'])->get('/dashboard', function(){
    return Inertia::render('User/Dashboard');
})->name('dashboard');

Route::middleware(['auth','verified'])->get('/profile', function(){
    return Inertia::render('User/Profile',[
        'status' => session('status')
    ]);
})->name('profile');

Route::middleware(['auth','verified'])->get('/product', function(){
    return Inertia::render('User/Product');
})->name('product');
