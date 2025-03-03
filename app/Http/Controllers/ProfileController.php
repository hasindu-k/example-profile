<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('profile_pictures', $filename, env('FILESYSTEM_DISK'));

        $user->profile_picture = $path;
        $user->save();

        return back()->with('success', 'Profile picture updated!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
