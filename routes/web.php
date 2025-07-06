<?php

use App\Http\Controllers\AuthController;
use App\Models\ticket;
use App\Http\Controllers\ticketController;
use App\Http\Controllers\requestController;
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



//--------------------------tickets routes-----------------------------

//Display tickets
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');


//create ticket

Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');

//Store ticket
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

//edit ticket
Route::get('/tickets/{id}/edit', [TicketController::class, 'edit'])->name('tickets.edit');

//update ticket
Route::put('/tickets/{id}', [TicketController::class, 'update'])->name('tickets.update');

//delete ticket
Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');


//--------------------------user routes---------------------------
//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//users
Route::get('/users', [AuthController::class, 'index'])->name('users');

//edit user
Route::get('/users/{id}/edit', [AuthController::class, 'edit'])->name('users.edit');

//update user
Route::put('/users/{id}', [AuthController::class, 'update'])->name('users.update');

//delete user
Route::delete('/users/{id}',[AuthController::class,'destroy'])->name('users.destroy');

//----------------------------------Request----------------------------------------
Route::get('/request/create',[requestController::class, 'create'])->name('request.create');
Route::get('/request',[requestController::class, 'index'])->name('request.index');
Route::post('/request',[requestController::class, 'store'])->name('request.store');
Route::get('/request/{id}/edit', [requestController::class, 'edit'])->name('request.edit');
Route::put('/request/{id}', [requestController::class, 'update'])->name('request.update');
Route::delete('/request/{id}', [requestController::class, 'destroy'])->name('request.destroy');
//-----------------------------------------Dasboard Admin--------------------------------
Route::get('/dashboard', [ticketController::class, 'dashboard'])->name('dashboard');