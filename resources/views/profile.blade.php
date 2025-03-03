@extends('master')

@section('title', 'Profile')

@section('content')
    <div class="min-w-[300px] max-w-[400px] w-full p-8 rounded-lg shadow-md bg-white">
        <div>
            <h2 class="text-2xl font-bold text-center mb-6">Profile</h2>

            <div class="text-center mb-6">
                <div class="w-24 h-24 rounded-full mx-auto relative group">
                    <img src="{{ env('FILESYSTEM_URL') . auth()->user()->profile_picture ?? env('FILESYSTEM_URL') . 'default-profile.png' }}"
                        class="cursor-pointer rounded-full w-24 h-24" id="profile-image" alt="Profile Picture">
                    <div
                        class="absolute top-0 left-0 flex items-center justify-center opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                        <button type="button" class="bg-gray-500 text-white rounded-full p-2  w-24 h-24" id="upload-button">
                            <span class="text-xl">+</span>
                        </button>
                    </div>
                </div>

                <form action="{{ route('profile.upload-photo') }}" method="POST" enctype="multipart/form-data"
                    class="hidden" id="upload-form">
                    @csrf
                    <input type="file" name="file" id="profile-picture-input" accept="image/*" class="hidden">

                    @error('file')
                        <div class="text-red-500 mt-2 text-sm font-medium">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="hidden" id="submit-button"></button>
                </form>



                <p class="text-lg font-semibold mt-2">{{ auth()->user()->name }}</p>
                <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                <p class="text-sm text-gray-500">Joined on {{ auth()->user()->created_at->diffForHumans() }}</p>
            </div>

            <form action="{{ route('profile.update') }}" method="POST">
                @method('PUT')
                @csrf
                <x-input-field type="text" name="name" label="Name" value="{{ auth()->user()->name }}" />
                <x-input-field type="email" name="email" label="Email" value="{{ auth()->user()->email }}" />
                <x-input-field type="password" name="password" label="New Password" />
                <x-input-field type="password" name="password_confirmation" label="Confirm Password" />

                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md
                    hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Update Profile</button>
            </form>
        </div>
    </div>
@endsection
