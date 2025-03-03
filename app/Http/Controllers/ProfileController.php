<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use App\Http\Requests\UpdateProfileRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = Auth::id();
        return view('profile', compact('id'));
    }

    public function updateProfilePicture(FileUploadRequest $request)
    {
        try {
            $request->validated();
            $user = Auth::user();

            $file = $request->file('file');

            if (!$request->hasFile('file') || !$request->file('file')->isValid()) {
                return back()->with('error', 'No file selected or the file is invalid.');
            }

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('profile_pictures', $filename, env('FILESYSTEM_DISK'));

            $user->profile_picture = $path;
            $user->save();

            return back()->with('success', 'Profile picture updated!');
        } catch (Exception $e) {
            Log::error("Profile Photo Upload Failed", ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'An error occurred during photo upload. Please try again later.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
    {
        try {
            $request->validated();
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return back()->with('success', 'Profile updated!');
        } catch (Exception $e) {
            Log::error("Profile Update Failed", ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'An error occurred during update profile. Please try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
