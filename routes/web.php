<?php

use App\Http\Controllers\AuthController;
use App\Models\ticket;
use App\Http\Controllers\ticketController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//home
Route::get('/home', function () {
    return Inertia::render('home');
}) ->name('home');

//login routes
Route::get('/', function () {
    return Inertia::render('login');
}) ->name('login');

Route::post('/login',[AuthController::class,'login']);


//register routes
Route::get('/register', function () {
    return Inertia::render('register');
}) ->name('register');

Route::post('/register',[AuthController::class,'register']);



//tickets 
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');


//create ticket

Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');

//Store
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

//edit
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');

//update
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');

//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');