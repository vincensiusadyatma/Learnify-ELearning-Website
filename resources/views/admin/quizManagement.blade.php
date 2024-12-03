@extends('template.dashboard-admin-template')

@section('content')
<div class="head-title mb-10">
    <div class="left">
        <h1>Quiz Management</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Quiz Management</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Main</a>
            </li>
        </ul>
    </div>
</div>

<!-- Search Bar -->
<div class="mb-5">
    <form action="{{ route('show-quiz-management') }}" method="GET" class="flex space-x-2">
        <input 
            type="text" 
            id="search-course" 
            name="search"
            value="{{ request()->get('search') }}"
            class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300" 
            placeholder="Cari course..." 
        />
        <button 
            type="submit" 
            class="px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">
            Search
        </button>
    </form>
</div>

<div id="courses-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($courses as $course)
    <div 
        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg hover:scale-105 transition-all dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full text-center py-3 flex justify-center">
            <img 
                class="rounded-t-lg w-12 h-12" 
                src="{{ file_exists(public_path('/img/assets/course/'.$course->img)) ? '/img/assets/course/'.$course->img : '/img/default-course.png' }}" 
                alt="Course Icon" 
            />
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
            <a 
                href="{{ route('show-quiz-admin-detail', $course->id) }}" 
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg 
                    class="rtl:rotate-180 w-4 h-4 ml-2" 
                    aria-hidden="true" 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 14 10">
                    <path 
                        stroke="currentColor" 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
    @endforeach
</div>

<!-- Pagination Links -->
<div class="flex justify-center mt-10">
    <div class="flex items-center space-x-1">
        @for ($page = 1; $page <= $courses->lastPage(); $page++)
            @if ($page == $courses->currentPage())
                <span class="z-10 bg-indigo-50 dark:bg-indigo-700 border-indigo-500 dark:border-indigo-600 text-indigo-600 dark:text-indigo-300 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $courses->url($page) }}" class="bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    {{ $page }}
                </a>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($courses->hasMorePages())
            <a href="{{ $courses->nextPageUrl() }}" class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                Next
            </a>
        @else
            <span class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 cursor-not-allowed">
                Next
            </span>
        @endif
    </div>
</div>
@endsection
