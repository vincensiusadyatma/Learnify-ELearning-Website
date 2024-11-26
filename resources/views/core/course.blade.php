@extends('core.layouts.index')

@section('core-content')
    <div class="flex justify-between items-center p-6 bg-white text-gray-900">
        <!-- Search Bar and Course Count -->
        <div class="flex items-center space-x-4">
            <div class="relative w-64">
                <input type="text" class="w-full px-4 py-2 rounded-full bg-gray-100 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search courses...">
                <button class="absolute right-2 top-2 text-gray-900">
                    <i class="bx bx-search"></i> <!-- Assuming you are using Boxicons for icons -->
                </button>
            </div>
            <div class="text-lg">
                <span class="font-semibold">Courses Taken:</span> 
                <span class="bg-blue-600 px-3 py-1 rounded-full text-white">5</span> <!-- Static number for now -->
            </div>
        </div>

        <!-- Sorting Buttons -->
        <div class="flex items-center space-x-4">
            <button class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-200 hover:bg-gray-300 rounded-full">
                All
            </button>
            <button class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-200 hover:bg-gray-300 rounded-full">
                Taken
            </button>
            <button class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-200 hover:bg-gray-300 rounded-full">
                Not Taken
            </button>
        </div>
    </div>

    <!-- Courses List -->
    <div class="flex flex-wrap">
        @foreach ($courses as $dt)
            @include('core.layouts.card', [
                'uuid' => $dt['uuid'],
                'title' => $dt['title'], 
                'description' => $dt['description'], 
                'link' => route('list-lesson', ['id' => $dt['id']]),
                'icons' => $dt['img']
            ])
        @endforeach
        
    </div>
@endsection
