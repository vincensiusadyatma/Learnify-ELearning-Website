@extends('core.layouts.index')

@section('core-content')

    {{-- Jumbutron --}}

    <div class="flex justify-between w-full h-[300px] rounded-2xl bg-[#5271FF24] dark:bg-[#1f2937]">
        <div class="flex flex-col justify-center gap-3 w-[500px] pl-[72px]">
            <p class="font-bold text-3xl dark:text-white">
                Hi,
                @if(Auth::user()->username)
                    {{ Auth::user()->username }}
                @else
                    {{ substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@')) }}
                @endif
            </p>
            <p class="font-light text-2xl dark:text-white">Sharpen Your Skills with Professional Online Course</p>
        </div>
        <img src="{{asset('img/assets/boy-study.png')}}" alt="" class="h-[300px]">
    </div>

    {{-- Statistics --}}
    <div class="flex gap-4 w-full mt-[53px]">
        <!-- Last Accessed Course Section -->
        <div class="flex flex-col flex-1 bg-white-theme/[0.67] rounded-2xl p-6 shadow-md dark:bg-[#1f2937]">
            <!-- Header -->
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Last Accessed Course</h2>
            
            <!-- Content Section -->
            <div class="flex items-center justify-between">
                <!-- Gauge Component -->
                <div class="relative w-32 h-32">
                    <svg class="rotate-[135deg] w-full h-full" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                        <!-- Background Circle (Gauge) -->
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-gray-200 dark:text-neutral-700" stroke-width="1.5" stroke-dasharray="75 100" stroke-linecap="round"></circle>
                        <!-- Gauge Progress -->
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-blue-600 dark:text-blue-500" stroke-width="1.5" stroke-dasharray="37.5 100" stroke-linecap="round"></circle>
                    </svg>
                    <!-- Value Text -->
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                        <span class="text-4xl font-bold text-blue-600 dark:text-blue-500">50</span>
                        <span class="text-blue-600 dark:text-blue-500 block">Score</span>
                    </div>
                </div>
                <!-- Right Section: Course Info -->
                <div class="flex flex-col justify-center flex-1 pl-6 space-y-4">
                    <!-- Lesson Info -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center bg-blue-50 text-blue-500 rounded-lg">
                            <i class="bx bx-book text-xl"></i> <!-- Ukuran ikon sama dengan ikon Course -->
                        </div>
                        <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300">
                          <span class="text-gray-900 dark:text-white">Javascript course</span>
                        </h4>
                    </div>
                    
                    
                    <!-- Lesson Info -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center bg-blue-50 text-blue-500 rounded-lg">
                            <i class="bx bx-bookmark text-xl"></i> <!-- Ukuran ikon sama dengan ikon Course -->
                        </div>
                        <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300">
                         <span class="text-gray-900 dark:text-white">Asynchronous function</span>
                        </h4>
                    </div>
                    
                    <!-- Access Course Button -->
                    <button class="flex items-center justify-center gap-2 px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 hover:shadow-lg transition duration-300 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                        <i class="bx bx-right-arrow-circle text-2xl"></i>
                        Access Course
                    </button>
                </div>
                
                
            </div>
        </div>

        <!-- Points Section -->
        <div class="flex flex-col w-[30%] bg-white-theme/[0.67] rounded-2xl p-6 shadow-md dark:bg-[#1f2937]">
            <!-- Header -->
            <p class="text-xl font-bold text-gray-800 dark:text-white border-b pb-4 mb-4">Points</p>
            <!-- Points Content -->
            <div class="flex h-full">
                <div class="flex-1 flex flex-col items-center justify-center border-r dark:border-neutral-700">
                    <p class="text-4xl font-bold text-gray-800 dark:text-white">0</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Earned Today</p>
                </div>
                <div class="flex-1 flex flex-col items-center justify-center">
                    <p class="text-4xl font-bold text-gray-800 dark:text-white">0</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Total</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Course Progress --}}
    <div class="w-full h-full bg-white-theme/[.67]  rounded-2xl mt-4 dark:bg-[#1f2937]">
        <div class="py-6 pl-4 ">
            <p class="text-xl font-bold dark:text-white">Course On Progress</p>
        </div>
        <div class="flex gap-4 px-4 w-full min-h[300px] ">
            @forelse($course as $item)
                @include('core.layouts.mini-card', ['data' => $item])
            @empty
                <div
                        class="flex justify-center items-center w-full h-full bg-gray-100 border border-gray-300 rounded-lg dark:bg-[#343039]">
                    <p class="text-2xl text-gray-500 font-semibold dark:text-white">Anda belum mengambil course</p>
                </div>
            @endforelse
        </div>

    </div>
    </div>
@endsection
