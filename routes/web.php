<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventRegistrationController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/events', [EventRegistrationController::class, 'index'])->name('events.index');
Route::post('/events/{event}/register', [EventRegistrationController::class, 'register'])->name('events.register');
