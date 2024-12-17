@extends('core.layouts.index')

@section('core-content')
    <div class="flex justify-between items-center p-6 bg-white text-gray-900 dark:bg-[#1f2937]">
        <!-- Search Bar and quiz Count -->
        <div class="flex items-center space-x-4">
            <div class="relative w-64">
                <input type="text" class="w-full px-4 py-2 rounded-full bg-gray-100 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search Quiz...">
                <button class="absolute right-2 top-2 text-gray-900">
                    <i class="bx bx-search"></i> 
                </button>
            </div>
        </div>
        
    </div>

    <!-- Courses List -->
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($quiz as $qz)
            @include('core.layouts.quizCard', [
                'quiz' => $qz
            ])
        @endforeach
        
    </div>
@endsection

