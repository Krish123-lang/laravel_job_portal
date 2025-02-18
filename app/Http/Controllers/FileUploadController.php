<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file')->store('resume', 'public');
            User::where('id', Auth::user()->id)->update([
                'resume' => $file
            ]);
            return response()->json(['success' => true]);
        }
        return response()->json(['error' => 'error']);
    }
}
