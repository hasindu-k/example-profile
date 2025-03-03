@extends('master')

@section('title', 'Not Found')

@section('content')
    <div class="text-center">
        <h1 class="text-6xl font-bold text-red-600">404</h1>
        <h2 class="text-3xl font-semibold text-gray-800 mt-2">Oops! Page Not Found</h2>
        <p class="text-lg text-gray-600 mt-2 mb-6">The page you are looking for might have been removed or is temporarily
            unavailable.</p>
        <a href="{{ url('/') }}" class="mt-6 px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
            Go Back Home
        </a>
    </div>
@endsection
