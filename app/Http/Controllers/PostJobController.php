<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobEditFormRequest;
use App\Http\Requests\JobPostFormRequest;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostJobController extends Controller
{
    public function index()
    {
        $job_listings = Listing::where('user_id', Auth::user()->id)->latest()->get();
        return view('job.index', compact('job_listings'));
    }

    public function create()
    {
        return view('job.create');
    }

    public function store(JobPostFormRequest $request)
    {
        $imagePath = $request->file('feature_image')->store('images', 'public');
        $post = new Listing;
        $post->feature_image = $imagePath;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->roles = $request->roles;
        $post->job_type = $request->job_type;
        $post->address = $request->address;
        $post->salary = $request->salary;
        $post->application_close_date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->application_close_date)->format('Y-m-d');
        $post->slug = Str::slug($request->title) . '.' . Str::uuid();

        $post->save();
        return to_route('job.index')->with('success', 'Job posted successfully!');
    }

    public function edit(Listing $listing)
    {
        return view('job.edit', compact('listing'));
    }

    public function show(Listing $listing)
    {
        return view('job.show', compact('listing'));
    }

    public function update($id, JobEditFormRequest $request)
    {
        if ($request->hasFile('feature_image')) {
            $featureImage = $request->file('feature_image')->store('images', 'public');
            Listing::find($id)->update(['feature_image' => $featureImage]);
        }
        Listing::find($id)->update($request->except('feature_image'));
        return to_route('job.index')->with('success', 'Job Updated successfully!');
    }

    public function delete(Listing $listing, $id)
    {
        Listing::find($id)->delete();
        return to_route('job.index')->with('success', 'Record deleted!');
    }
}
