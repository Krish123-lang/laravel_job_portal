<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isEmployer;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Route::get('users/', [UserController::class, 'index'])->name('user.index');
Route::get('register/seeker', [UserController::class, 'createSeeker'])->name('create.seeker');
Route::post('register/seeker', [UserController::class, 'storeSeeker'])->name('store.seeker');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'postLogin'])->name('login.post');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('register/employer', [UserController::class, 'createEmployer'])->name('create.employer');
Route::post('register/employer', [UserController::class, 'storeEmployer'])->name('store.employer');

Route::get('verify', [DashboardController::class, 'verify'])->name('verification.notice');
Route::get('resend/verification/email', [DashboardController::class, 'resend'])->name('resend.email');

Route::get('subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe')->middleware(['auth', isEmployer::class]);
Route::get('pay/weekly', [SubscriptionController::class, 'initiatePayment'])->name('pay.weekly')->middleware('auth');
Route::get('pay/monthly', [SubscriptionController::class, 'initiatePayment'])->name('pay.monthly')->middleware('auth');
Route::get('pay/yearly', [SubscriptionController::class, 'initiatePayment'])->name('pay.yearly')->middleware('auth');

Route::get('payment/success', [SubscriptionController::class, 'paymentSuccess'])->name('payment.success')->middleware('auth');
Route::get('payment/cancel', [SubscriptionController::class, 'paymentCancel'])->name('payment.cancel')->middleware('auth');