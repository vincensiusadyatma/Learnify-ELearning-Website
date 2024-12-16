@extends('template.dashboard-admin-template')

@section('content')
<div class="head-title mb-10">
    <div class="left">
      <h1>Course Management</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Course Management</a>
        </li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li>
          <a class="active" href="#">Main</a>
        </li>
      </ul>
    </div>
    <a href="{{ route('create-course') }}" class="btn-download">
      <i class='bx bxs-add-to-queue'></i>
      <span class="text">Add Course</span>
    </a>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach ($courses as $course)
      <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <div class="w-full text-center py-3 flex justify-center">
              @php
                  $defaultPath = "img/assets/course/{$course->img}";
                  $storagePath = "storage/{$course->img}";
                  $imagePath = file_exists(public_path($defaultPath)) ? asset($defaultPath) : (file_exists(public_path($storagePath)) ? asset($storagePath) : asset('img/default-course.png'));
              @endphp
              <img class="rounded-t-lg w-12 h-12" src="{{ $imagePath }}" alt="Course Icon" />
          </div>
          
          <div class="p-3">
              <a href="#">
                  <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                      {{ $course->title }}
                  </h5>
              </a>
              <p class="mb-2 text-sm font-normal text-gray-700 dark:text-gray-400">
                  {{ Str::limit($course->description, 50, '...') }}
              </p>
              <a href="{{ route('show-course-admin-detail', $course->id) }}" class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Read more
                  <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                  </svg>
              </a>
          </div>
      </div>
    @endforeach
  </div>
@endsection
