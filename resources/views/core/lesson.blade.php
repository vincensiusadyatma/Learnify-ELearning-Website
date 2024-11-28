@extends('core.layouts.index')

@section('core-content')

<div class="h-screen grid grid-cols-12 gap-4 p-4">
    <!-- Sidebar -->
    <div class="col-span-3 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow h-full">
        <h2 class="text-lg font-semibold mb-4 text-gray-700 dark:text-white">{{ $course->title }}</h2>
        <ul class="space-y-2">
            @foreach ($lessons as $lesson)
                <li class="{{ $lesson->id === $selectedLesson->id ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }} p-2 rounded-lg hover:bg-blue-400 dark:hover:bg-blue-600">
                    <a href="{{ route('show-lesson', ['course' => $course->uuid, 'lesson' => $lesson->id]) }}">
                        {{ $lesson->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Content Section -->
    <div class="col-span-9 bg-white dark:bg-gray-900 p-6 rounded-lg shadow h-full overflow-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $selectedLesson->title }}</h2>
            
            <!-- Menampilkan konten lesson -->
            <div class="mt-4">
                @if ($lessonContent === 'Materi belum ada')
                    <p class="text-red-500 font-semibold">{{ $lessonContent }}</p>
                @else
                    <div class="lesson-content">
                        {!! $lessonContent !!} <!-- Menampilkan konten HTML -->
                    </div>
                @endif
            </div>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('continue-lesson', ['course' => $course->uuid]) }}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Continue Lesson
                </button>
            </a>
        </div>
    </div>
</div>

@endsection
