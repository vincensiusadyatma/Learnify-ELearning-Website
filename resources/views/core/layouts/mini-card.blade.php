@props(['data'])

<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <!-- Gambar Course -->
    <img class="m-auto rounded-lg mb-4" src="{{ asset('./img/assets/course/' . $data->img) }}" alt="Course Image">

    <!-- Judul Course -->
    <a href="#">
        <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $data->title }}</h5>
    </a>

    <!-- Deskripsi -->
    <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
        Go to this step-by-step guideline process on how to certify for your weekly benefits.
    </p>

    <!-- Progress Bar -->
    <div class="mt-4">
        <div class="flex items-center justify-between mb-2">
            <span class="text-xs font-semibold text-teal-600 bg-teal-100 py-1 px-2 rounded-full">
                In Progress
            </span>
            <span class="text-xs font-semibold text-teal-600">70%</span>
        </div>
        <div class="w-full h-2 rounded-full bg-gray-200">
            <div class="h-2 rounded-full bg-teal-500" style="width: 70%;"></div>
        </div>
        
    </div>

    <!-- Link -->
    <a href="#" class="inline-flex items-center mt-6 font-medium text-blue-600 hover:no-underline">
        <button class="flex items-center justify-center gap-2 px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 hover:shadow-lg transition duration-300 focus:ring-4 focus:ring-blue-300 focus:outline-none">
            <i class="bx bx-right-arrow-circle text-2xl"></i>
            Access Course
        </button>
    </a>
</div>
