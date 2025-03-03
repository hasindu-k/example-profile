@extends('auth.master')

@section('title', 'Register')

@section('content')

    <div class="max-w-[400px] min-w-[300px] bg-white p-8 rounded-lg shadow-md w-full">
        <div>
            <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <x-input-field type="text" name="name" label="Name" />

                <x-input-field type="email" name="email" label="Email" />

                <x-input-field type="password" name="password" label="Password" />

                <x-input-field type="password" name="password_confirmation" label="Confirm Password" />

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
