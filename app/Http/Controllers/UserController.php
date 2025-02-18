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

    public function seekerProfile()
    {
        return view('seeker.profile');
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
            if (Auth::user()->user_type == 'employer') {
                return to_route('dashboard');
            } else {
                return to_route('user.index');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Profile Section
    public function profile()
    {
        return view('profile.index');
    }

    public function update_profile(Request $request, User $user)
    {
        $request->validate([
            'profile_pic' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'name' => 'nullable',
        ]);

        if ($request->hasFile('profile_pic')) {
            $imagePath = $request->file('profile_pic')->store('profile', 'public');
            User::find(Auth::user()->id)->update(['profile_pic' => $imagePath]);
        }
        User::find(Auth::user()->id)->update($request->except('profile_pic'));

        // $user->update($request->all());
        return back()->with('success', 'Profile Updated successfully!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed', 'different:current_password'], 
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Your password has been changed successfully.');
    }

    public function uploadResume(Request $request){
        $request->validate([
            'resume'=>'required|mimes:pdf,doc,docx'
        ]);
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume')->store('resume', 'public');
            User::find(Auth::user()->id)->update(['resume' => $resume]);
        }
        User::find(Auth::user()->id)->update($request->except('resume'));
        return back()->with('success', 'Resume uploaded successfully!');
    }

    public function jobApplied(){
        $users=User::with('listings')->where('id', Auth::user()->id)->get();
        return view('seeker.job-applied', compact('users'));
    }
}
