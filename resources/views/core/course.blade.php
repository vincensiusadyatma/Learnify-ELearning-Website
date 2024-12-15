@extends('core.layouts.index')

@section('core-content')
    <div class="flex justify-between items-center p-6 bg-white text-gray-900 dark:bg-[#1f2937]">
        <!-- Search Bar and Course Count -->
        <div class="flex items-center space-x-4">
            <div class="relative w-64">
                <input type="text" class="w-full px-4 py-2 rounded-full bg-gray-100 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-white" placeholder="Search courses...">
                <button class="absolute right-2 top-2 text-gray-900">
                    <i class="bx bx-search"></i> 
                </button>
            </div>
            <div class="text-lg">
                <span class="font-semibold dark:text-white">Courses Taken:</span> 
                <span class="bg-blue-600 px-3 py-1 rounded-full text-white">{{ $courses_count}}</span> <!-- Static number for now -->
            </div>
        </div>

        <!-- Sorting Buttons -->
        <div class="flex items-center space-x-4">
            <!-- All Courses -->
            <a href="{{ route('show-course') }}" class="px-4 py-2 text-sm font-semibold text-gray-900 
                {{ $filter == 'all' ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }} rounded-full">
                All
            </a>
        
            <!-- Taken Courses -->
            <a href="{{ route('show-course', ['filter' => 'taken']) }}" class="px-4 py-2 text-sm font-semibold text-gray-900 
                {{ $filter == 'taken' ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }} rounded-full">
                Taken
            </a>
        
            <!-- Not Taken Courses -->
            <a href="{{ route('show-course', ['filter' => 'not_taken']) }}" class="px-4 py-2 text-sm font-semibold text-gray-900 
                {{ $filter == 'not_taken' ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }} rounded-full">
                Not Taken
            </a>
        </div>
        
    </div>

    <!-- Courses List -->
    <div class="flex flex-wrap">
      

        @foreach ($courses as $dt)
            @php
            // Cek apakah kursus sudah diambil oleh pengguna
            $isTaken = DB::table('user_take_courses')
                        ->where('user_id', Auth::user()->id)
                        ->where('course_id', $dt->id)
                        ->exists();
            @endphp
            @include('core.layouts.card', [
                'uuid' => $dt['uuid'],
                'title' => $dt['title'], 
                'description' => $dt['description'], 
                // 'link' => route('list-lesson', ['id' => $dt['id']]),
                'icons' => $dt['img'],
                'isTaken' => $isTaken
                
            ])
        @endforeach
        
    </div>
@endsection

