@extends('auth.master')

@section('title', 'Login')

@section('content')

    <div class="max-w-[400px] min-w-[300px] bg-white p-8 rounded-lg shadow-md w-full">
        <div>
            <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 pr-10">
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-3 flex items-center togglePassword">
                            <i id="eyeIcon" class="fas fa-eye text-gray-500"></i>
                        </button>
                    </div>

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Login
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500">Register here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
