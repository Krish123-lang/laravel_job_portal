<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('users/', [UserController::class, 'index'])->name('user.index');
Route::get('register/seeker', [UserController::class, 'createSeeker'])->name('create.seeker');
Route::post('register/seeker', [UserController::class, 'storeSeeker'])->name('store.seeker');
