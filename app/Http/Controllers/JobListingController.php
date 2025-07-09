<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $salary = $request->query('sort');
        $date = $request->query('date');
        $jobType = $request->query('job_type');

        $listings = Listing::query();

        if ($salary === 'salary_high_to_low') {
            $listings->orderByRaw('CAST(salary AS UNSIGNED) DESC');
            // $listings->orderBy('salary', 'desc');
        } elseif ($salary === 'salary_low_to_high') {
            $listings->orderByRaw('CAST(salary AS UNSIGNED) ASC');
            // $listings->orderBy('salary', 'asc');
        }

        if ($date === 'latest') {
            $listings->orderBy('created_at', 'desc');
        } elseif ($date === 'latest') {
            $listings->orderBy('created_at', 'asc');
        }

        if ($jobType === 'Full Time') {
            $listings->where('job_type', 'Full Time');
        } elseif ($jobType === 'Part Time') {
            $listings->where('job_type', 'Part Time');
        } elseif ($jobType === 'Casual') {
            $listings->where('job_type', 'Casual');
        } elseif ($jobType === 'Contract') {
            $listings->where('job_type', 'Contract');
        }

        $jobs = $listings->with('profile')->get();
        return view('user.index', compact('jobs'));
    }

    public function show(Listing $listing)
    {
        $hasApplied=$listing->applications()->where('user_id', Auth::id())->exists();
        return view('user.show', compact('listing', 'hasApplied'));
    }

    public function company($id)
    {
        $company = User::with('jobs')->where('id', $id)->where('user_type', 'employer')->first();
        return view('user.company', compact('company'));
    }
}
