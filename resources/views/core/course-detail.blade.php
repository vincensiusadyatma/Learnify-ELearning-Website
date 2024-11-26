@extends('core.layouts.index')

@section('core-content')

<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <!-- Course Title and Info -->
    <div class="flex items-center mb-6">
        <div class="flex-1">
            <h1 class="text-3xl font-bold text-gray-900">{{ $course['title'] }}</h1>
            <p class="text-gray-500 mt-2">{{ $course['description'] }}</p>
        </div>
        <div class="ml-6">
            <img src="/img/assets/course/{{ $course['img'] }}" alt="Course Logo" class="w-24 h-24 object-contain">
        </div>
    </div>

    <!-- Course Info -->
    <div class="flex space-x-6 mb-8">
        <div class="flex items-center text-gray-600">
            <span class="material-icons text-blue-500">access_time</span>
            <span class="ml-2">{{ $course['duration'] }} Hours</span>
        </div>
        <div class="flex items-center text-gray-600">
            <span class="material-icons text-blue-500">school</span>
            <span class="ml-2">{{ $course['level'] }} Level</span>
        </div>
    </div>

    <!-- Continue Lesson Button -->
    <div class="flex justify-center mb-6">
        <button class="px-6 py-2 text-white bg-blue-600 rounded-full hover:bg-blue-700 focus:outline-none">
            Continue this lesson
        </button>
    </div>

    <!-- About Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">About</h2>
        <p class="text-gray-700">{{ $course['about'] }}</p>
    </div>

    <!-- What You'll Learn Section -->
    <div>
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">What You'll Learn</h2>
        <ul class="list-disc pl-6 space-y-2">
            {{-- @foreach ($course['learn'] as $item)
                <li class="text-gray-700">{{ $item }}</li>
            @endforeach --}}
        </ul>
    </div>
</div>

@endsection
