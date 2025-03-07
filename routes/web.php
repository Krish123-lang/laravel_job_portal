<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\doNotAllowUserToMakePayment;
use App\Http\Middleware\isEmployer;
use App\Http\Middleware\isPremium;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [JobListingController::class, 'index'])->name('user.index');
Route::get('company/{id}', [JobListingController::class, 'company'])->name('user.company');
Route::get('/jobs/{listing:slug}', [JobListingController::class, 'show'])->name('job.show');
Route::post('resume/upload', [FileUploadController::class, 'store'])->name('resume.upload')->middleware('auth');

// Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('register/seeker', [UserController::class, 'createSeeker'])->name('create.seeker')->middleware(CheckAuth::class);
Route::post('register/seeker', [UserController::class, 'storeSeeker'])->name('store.seeker');
Route::get('login', [UserController::class, 'login'])->name('login')->middleware(CheckAuth::class);
Route::post('login', [UserController::class, 'postLogin'])->name('login.post');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['verified', isPremium::class]);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('register/employer', [UserController::class, 'createEmployer'])->name('create.employer')->middleware(CheckAuth::class);
Route::post('register/employer', [UserController::class, 'storeEmployer'])->name('store.employer');

Route::get('verify', [DashboardController::class, 'verify'])->name('verification.notice');
Route::get('resend/verification/email', [DashboardController::class, 'resend'])->name('resend.email');

Route::get('subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe')->middleware(['auth', isEmployer::class]); // , doNotAllowUserToMakePayment::class
Route::get('pay/weekly', [SubscriptionController::class, 'initiatePayment'])->name('pay.weekly')->middleware(['auth', isEmployer::class, doNotAllowUserToMakePayment::class]);
Route::get('pay/monthly', [SubscriptionController::class, 'initiatePayment'])->name('pay.monthly')->middleware(['auth', isEmployer::class, doNotAllowUserToMakePayment::class]);
Route::get('pay/yearly', [SubscriptionController::class, 'initiatePayment'])->name('pay.yearly')->middleware(['auth', isEmployer::class, doNotAllowUserToMakePayment::class]);

Route::get('payment/success', [SubscriptionController::class, 'paymentSuccess'])->name('payment.success')->middleware('auth');
Route::get('payment/cancel', [SubscriptionController::class, 'paymentCancel'])->name('payment.cancel')->middleware('auth');

Route::get('job', [PostJobController::class, 'index'])->name('job.index')->middleware('auth');
Route::get('job/create', [PostJobController::class, 'create'])->name('job.create')->middleware(isPremium::class, 'auth');
Route::post('job/store', [PostJobController::class, 'store'])->name('job.store')->middleware(isPremium::class, 'auth');
Route::get('job/{listing}/edit', [PostJobController::class, 'edit'])->name('job.edit');
Route::put('job/{id}/update', [PostJobController::class, 'update'])->name('job.update');
Route::delete('job/{id}/delete', [PostJobController::class, 'delete'])->name('job.delete');

Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::post('user/profile', [UserController::class, 'update_profile'])->name('user.update.profile')->middleware('auth');

Route::get('user/job/applied', [UserController::class, 'jobApplied'])->name('job.applied')->middleware(['auth', 'verified']);

Route::get('user/profile/seeker', [UserController::class, 'seekerProfile'])->name('seeker.profile')->middleware('auth');
Route::post('user/password', [UserController::class, 'changePassword'])->name('user.password')->middleware('auth');
Route::post('upload/resume', [UserController::class, 'uploadResume'])->name('upload.resume')->middleware('auth');

Route::get('applicants', [ApplicantController::class, 'index'])->name('applicants.index');
Route::get('applicants/{listing:slug}', [ApplicantController::class, 'show'])->name('applicants.show');
Route::post('shortlist/{listingId}/{userId}', [ApplicantController::class, 'shortlist'])->name('applicants.shortlist');

Route::post('application/{listingId}/submit', [ApplicantController::class, 'apply'])->name('application.submit');