@extends('template.dashboard-admin-template')

@section('content')
<div class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="bg-white p-10 rounded-lg shadow-md w-full mx-4 lg:mx-20">
        <!-- Judul Form -->
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-4">Add New Course</h2>
        <p class="text-sm text-gray-500 text-center mb-8">
            Please fill in the details below to create a new course.
        </p>

        <!-- Formulir -->
        <form action="{{ route('handle-add-course') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Input: Course Title -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Course Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter the course title"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                </div>
                <!-- Input: Course Image -->
                <div>
                    <label for="img" class="block text-sm font-medium text-gray-700 mb-1">Course Image</label>
                    <input type="file" name="img" id="img" 
                           class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 cursor-pointer" required>
                </div>
            </div>

            <!-- Input: Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Course Description</label>
                <textarea name="description" id="description" rows="5" placeholder="Write a short description"
                          class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-6">
                <button type="submit" 
                        class="w-full lg:w-1/3 px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Submit Course
                </button>
            </div>
        </form>

        <!-- Footer Text -->
        
    </div>
</div>
@endsection
