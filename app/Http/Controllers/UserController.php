<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'employer';

    // public function index()
    // {
    //     return view('user.index');
    // }

    public function createSeeker()
    {
        return view('user.seeker-register');
    }

    public function storeSeeker(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'user_type' => self::JOB_SEEKER,
        ]);
        Auth::login($user);
        $user->sendEmailVerificationNotification();
        return response()->json('success');
        // return redirect()->route('verification.notice')->with('success', 'Your account was created!');
    }

    public function createEmployer()
    {
        return view('user.employer-register');
    }

    public function storeEmployer(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'user_type' => self::JOB_POSTER,
            'user_trial' => now()->addWeek(),
        ]);
        Auth::login($user);
        $user->sendEmailVerificationNotification();
        return response()->json('success');
        // return redirect()->route('verification.notice')->with('success', 'Your account was created!');
    }

    public function login()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
