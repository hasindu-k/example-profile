@extends('auth.master')

@section('title', 'Create Student')

@section('content')

    <div class="max-w-[400px] min-w-[300px] bg-white p-8 rounded-lg shadow-md w-full">
        <div>
            <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <x-input-field type="text" name="name" label="Name" />

                <x-input-field type="email" name="email" label="Email" />

                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Create
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
