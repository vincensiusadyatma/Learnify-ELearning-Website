@extends('core.layouts.index')

@section('core-content')

    {{-- Jumbutron --}}

    <div class="flex justify-between w-full h-[300px] rounded-2xl bg-[#5271FF24]">
        <div class="flex flex-col justify-center gap-3 w-[500px] pl-[72px]">
            <p class="font-bold text-3xl">
                Hi,
                @if(Auth::user()->username)
                    {{ Auth::user()->username }}
                @else
                    {{ substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@')) }}
                @endif
            </p>
            <p class="font-light text-2xl">Sharpen Your Skills with Professional Online Course</p>
        </div>
        <img src="{{asset('img/assets/boy-study.png')}}" alt="" class="h-[300px]">
    </div>

    {{-- Statistics --}}
    <div class="flex gap-4 w-full mt-[53px]">
        <!-- Last Accessed Course Section -->
        <div class="flex flex-col flex-1 bg-white-theme/[0.67] rounded-2xl p-6 shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Last Accessed Course</h2>
            @if($lastAccessedCourse)
                <div class="flex items-center justify-between">
                    <div class="relative w-32 h-32">
                        <svg class="rotate-[135deg] w-full h-full" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-gray-200 dark:text-neutral-700" stroke-width="1.5" stroke-dasharray="100 100" stroke-linecap="round"></circle>
                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-blue-600 dark:text-blue-500" stroke-width="1.5" stroke-dasharray="{{ round($lastAccessedCourse->progress_percentage) }} 100" stroke-linecap="round"></circle>
                        </svg>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                            <span class="text-4xl font-bold text-blue-600 dark:text-blue-500">{{ round($lastAccessedCourse->progress_percentage) }}</span>
                            <span class="text-blue-600 dark:text-blue-500 block">%</span>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center flex-1 pl-6 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 flex items-center justify-center bg-blue-50 text-blue-500 rounded-lg">
                                <i class="bx bx-book text-xl"></i>
                            </div>
                            <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300">
                                <span class="text-gray-900 dark:text-white">{{ $lastAccessedCourse->course->title }}</span>
                            </h4>
                        </div>
                        <a href="{{ route('take-course', $lastAccessedCourse->course->uuid) }}" class="flex items-center justify-center gap-2 px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 hover:shadow-lg transition duration-300 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                            <i class="bx bx-right-arrow-circle text-2xl"></i>
                            Access Course
                        </a>
                    </div>
                </div>
            @else
                <p class="text-gray-500 text-center mt-6">You have not accessed any course recently.</p>
            @endif
        </div>
        

        <!-- Points Section -->
        <div class="flex flex-col w-[30%] bg-white-theme/[0.67] rounded-2xl p-6 shadow-md">
            <!-- Header -->
            <p class="text-xl font-bold text-gray-800 dark:text-white border-b pb-4 mb-4">Points</p>
            <!-- Points Content -->
            <div class="flex h-full">
                <div class="flex-1 flex flex-col items-center justify-center border-r dark:border-neutral-700">
                    <p class="text-4xl font-bold text-gray-800 dark:text-white">0</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Earned Today</p>
                </div>
                <div class="flex-1 flex flex-col items-center justify-center">
                    <p class="text-4xl font-bold text-gray-800 dark:text-white">{{ Auth::user()->points }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Total</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Course Progress --}}
    <div class="w-full h-full bg-white-theme/[.67] rounded-2xl mt-4">
        <div class="py-6 pl-4">
            <p class="text-xl font-bold">Course On Progress</p>
        </div>
        <div class="flex gap-4 px-4 w-full min-h-[300px] ">
            @forelse($course as $progress)
                @include('core.layouts.mini-card', ['data' => $progress->course, 'progress' => $progress->progress_percentage])
            @empty
                <div class="flex justify-center items-center w-full h-full bg-gray-100 border border-gray-300 rounded-lg">
                    <p class="text-2xl text-gray-500 font-semibold">Anda belum mengambil course</p>
                </div>
            @endforelse
        </div>
    </div>
    
    </div>
@endsection
