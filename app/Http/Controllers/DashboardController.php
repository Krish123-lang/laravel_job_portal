<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function verify()
    {
        return view('user.verify');
    }

    public function resend()
    {
        $user = Auth::user();
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard')->with('success', 'Your email was verified!');
        }
        $user->sendEmailVerificationNotification();
        return back()->with('success', 'Verification link sent!');
    }
}
