<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//home
Route::get('/home', function () {
    return Inertia::render('home');
}) ->name('home');

//login routes
Route::get('/login', function () {
    return Inertia::render('login');
}) ->name('login');

Route::post('/login',[AuthController::class,'login']);


//register routes
Route::get('/register', function () {
    return Inertia::render('register');
}) ->name('register');

Route::post('/register',[AuthController::class,'register']);

//tickets
Route::inertia('/tickets','tickets',['user'=>'enzo']) ->name('tickets');

