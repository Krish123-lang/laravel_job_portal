<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs = Listing::with('profile')->get();
        return view('user.index', compact('jobs'));
    }

    public function show(Listing $listing)
    {
        return view('user.show', compact('listing'));
    }
}
