@extends('core.layouts.index')

@section('core-content')

<div class="h-screen grid grid-cols-12 gap-4 p-4">
    <!-- Sidebar -->
    <div class="col-span-3 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow h-full">
        <h2 class="text-lg font-semibold mb-4 text-gray-700 dark:text-white">{{ $course->title }}</h2>
        <ul id="lesson-sidebar" class="space-y-2">
            @foreach ($lessons as $lesson)
                <li id="lesson-{{ $lesson->id }}" 
                    class="flex items-center justify-between p-2 rounded-lg hover:bg-blue-400 dark:hover:bg-blue-600 
                    {{ $lesson->id === $selectedLesson->id ? 'bg-blue-500 text-white' : ($lesson->is_completed ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700') }}">
                    <a href="{{ route('show-lesson', ['course' => $course->uuid, 'lesson' => $lesson->id]) }}" class="flex items-center gap-3 w-full">
                        <span class="truncate flex-1">{{ $lesson->title }}</span>
                        @if ($lesson->is_completed)
                            <svg class="lesson-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path fill="#c8e6c9" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                                <path fill="#4caf50" d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
                            </svg>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Content Section -->
    <div class="col-span-9 bg-white dark:bg-gray-900 p-6 rounded-lg shadow h-full overflow-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $selectedLesson->title }}</h2>
            
            <!-- Progress bar -->
            <div class="mb-4">
                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div id="progress-bar" class="bg-blue-500 text-xs font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: {{ $progressPercentage }}%;">
                        {{ $progressPercentage }}%
                    </div>
                </div>
            </div>

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

        <!-- Tombol untuk menandai selesai -->
        <div class="flex justify-between">
            <button id="mark-complete-button" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                Mark as Complete
            </button>
            <a href="{{ route('continue-lesson', ['course' => $course->uuid]) }}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Continue Lesson
                </button>
            </a>
        </div>
    </div>
</div>

<style>
    .lesson-icon {
        width: 24px; 
        height: 24px; 
        flex-shrink: 0; 
    }

    #lesson-sidebar .flex {
        align-items: center;
    }
</style>

<script>
    document.getElementById('mark-complete-button').addEventListener('click', function () {
        const lessonId = {{ $selectedLesson->id }};
        const courseId = {{ $course->id }};
        const lessonUrl = `{{ route('complete-lesson', ['lesson' => $selectedLesson->id]) }}`;
        const progressUrl = `{{ route('course.updateProgress', ['course' => $course->id]) }}`;

        // Tandai pelajaran sebagai selesai
        fetch(lessonUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({})
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to mark lesson as complete.');
            }
            return response.json();
        })
        .then(data => {
            // Perbarui sidebar
            const lessonItem = document.getElementById(`lesson-${lessonId}`);
            lessonItem.classList.remove('bg-gray-200', 'text-gray-700');
            lessonItem.classList.add('bg-green-500', 'text-white');

            if (!lessonItem.querySelector('svg')) {
                lessonItem.querySelector('a').innerHTML += `
                    <svg class="lesson-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                        <path fill="#c8e6c9" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                        <path fill="#4caf50" d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
                    </svg>
                `;
            }

            // Update progress bar di database dan UI
            return fetch(progressUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            });
        })
        .then(response => response.json())
        .then(data => {
            const progressBar = document.getElementById('progress-bar');
            progressBar.style.width = `${data.progressPercentage}%`;
            progressBar.textContent = `${data.progressPercentage}%`;
        })
        .catch(error => {
            console.error(error);
            alert('Failed to update progress.');
        });
    });
</script>

@endsection
