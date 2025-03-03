@extends('master')

@section('title', 'Profile')

@section('content')
    <div class="min-w-[300px] max-w-[400px] w-full p-8 rounded-lg shadow-md bg-white">
        <div>
            <h2 class="text-2xl font-bold text-center mb-6">Profile</h2>

            <div class="text-center mb-6 relative group">
                <img src="{{ auth()->user()->profile_picture ?? env('FILESYSTEM_URL') . 'default-profile.png' }}"
                    class="w-24 h-24 rounded-full mx-auto cursor-pointer" id="profile-image" alt="Profile Picture">
                <div
                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button type="button" class="bg-gray-500 text-white rounded-full p-2" id="upload-button">
                        <span class="text-xl">+</span>
                    </button>
                </div>

                <form action="{{ route('profile.upload-photo') }}" method="POST" enctype="multipart/form-data"
                    class="hidden" id="upload-form">
                    @csrf
                    <input type="file" name="profile_picture" id="profile-picture-input" accept="image/*" class="hidden">
                    <button type="submit" class="hidden" id="submit-button"></button>
                </form>

                <p class="text-lg font-semibold mt-2">{{ auth()->user()->name }}</p>
                <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                <p class="text-sm text-gray-500">Joined on {{ auth()->user()->created_at->diffForHumans() }}</p>
            </div>

            <form action="" method="POST">
                <x-input-field type="text" name="name" label="Name" />
                <x-input-field type="email" name="email" label="Email" />
                <x-input-field type="password" name="password" label="Password" />
            </form>
        </div>
    </div>
@endsection
