<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/home', function () {
    return Inertia::render('home');
}) ->name('home');

Route::get('/login', function () {
    return Inertia::render('login');
}) ->name('login');

Route::get('/register', function () {
    return Inertia::render('register');
}) ->name('register');

Route::post('/register',[AuthController::class,'register']);


Route::inertia('/tickets','tickets',['user'=>'enzo']) ->name('tickets');

