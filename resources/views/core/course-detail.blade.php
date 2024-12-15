@extends('core.layouts.index')

@section('core-content')

<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <!-- Course Title and Info -->
    <div class="flex items-center mb-6">
        <div class="flex-1">
            <h1 class="text-3xl font-bold text-gray-900">{{ $course->title }}</h1>
            <p class="text-gray-500 mt-2">{{ $course->description }}</p>
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
        <a href="{{ route('continue-lesson', $course->uuid) }}" class="px-6 py-2 text-white bg-blue-600 rounded-full hover:bg-blue-700 focus:outline-none">
            Continue this lesson
        </a>
    </div>

{{-- 
    <!-- About Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">About</h2>
        <p class="text-gray-700">{{ $course['about'] }}</p>
    </div> --}}

    <!-- What You'll Learn Section -->
    {{-- <div>
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">What You'll Learn</h2>
        <ul class="list-disc pl-6 space-y-2">
            @foreach ($course['learn'] as $item)
                <li class="text-gray-700">{{ $item }}</li>
            @endforeach
        </ul>
    </div> --}}

    <div class="py-5">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Learning Path</h2>    
    <ol class="relative border-s border-gray-200 dark:border-gray-700">                  
        
        @foreach($lesson as $ls)
            @include('core.layouts.timeline-card', ['lesson' => $ls])

        @endforeach
                
        <!-- <li class="mb-10 ms-4">
            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">February 2022</time>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Application UI code in Tailwind CSS</h3>
            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Get access to over 20+ pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce & Marketing pages.</p>
            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Learn more 
                <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </li> -->
    </ol>
</div>
</div>

@endsection
