@extends('auth.master')

@section('title', 'Register')

@section('content')

    <div class="max-w-[400px] min-w-[300px] bg-white p-8 rounded-lg shadow-md w-full">
        <div>
            <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" value="{{ old('password') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 pr-10">
                        <button type="button" class="absolute inset-y-0 right-3 flex items-center togglePassword">
                            <i id="eyeIcon" class="fas fa-eye text-gray-500"></i>
                        </button>
                    </div>

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4 relative">
                    <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            value="{{ old('password_confirmation') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 pr-10">
                        <button type="button" class="absolute inset-y-0 right-3 flex items-center togglePassword">
                            <i id="eyeIcon" class="fas fa-eye text-gray-500"></i>
                        </button>
                    </div>

                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Register
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">Login here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
