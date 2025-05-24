<?php

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

Route::inertia('/tickets','tickets',['user'=>'enzo']) ->name('tickets');
