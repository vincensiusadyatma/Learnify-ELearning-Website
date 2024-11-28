@extends('template.dashboard-admin-template')

@section('content')
<div class="head-title mb-10">
    <div class="left">
        <h1>{{ $course->title }} Course Management</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Course Management</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="" href="#">Main</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Details</a>
            </li>
        </ul>
    </div>

    <div class="flex space-x-4"> <!-- flex to align the buttons and space-x-4 to add spacing between buttons -->
        <a href="#" id="editCourseBtn" class="btn-download flex items-center space-x-2">
            <i class='bx bx-edit text-lg'></i>
            <span class="text">Edit Course</span>
        </a>
        <a href="{{ route('show-add-lesson-cms', $course->id) }}" class="btn-download flex items-center space-x-2">
            <i class='bx bxs-add-to-queue'></i>
            <span class="text">Add Lesson</span>
        </a>
    </div>
</div>

<div class="flex flex-col gap-4">
    @if($lessons->isEmpty())
        <p class="text-gray-500">No lessons found for this course.</p>
    @else
        @foreach($lessons as $lesson)
        <!-- Card 1 -->
        <div class="py-5  px-5 flex items-center w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <img class="w-32 h-32 rounded-l-lg object-cover" src="/img/assets/course/{{ $course->img }}" alt="Lesson Image">
            <div class="p-4 flex-1">
                <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $lesson->title }}</h5>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ Str::limit($lesson->description, 100) }}</p> <!-- Shorten content for preview -->
            </div>
            <div class="flex space-x-2 p-4">
                <!-- Lihat Button -->
                <a href="" class="bg-blue-500 text-white rounded-md px-3 py-2 hover:bg-blue-600 flex items-center space-x-1">
                   
                    
                    <span>View</span>
                </a>

                <!-- Edit Button -->
                <a href="" class="bg-yellow-500 text-white rounded-md px-3 py-2 hover:bg-yellow-600 flex items-center space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l7 7-7 7M5 13V5h8" />
                    </svg>
                    <span>Edit</span>
                </a>

                <!-- Delete Button -->
                <form action="{{ route('handle-delete-lesson',['course' => $course->id, 'lesson' => $lesson->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this lesson?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white rounded-md px-3 py-2 hover:bg-red-600 flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>Delete</span>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    @endif
</div>


   


<!-- Pop-Up Form -->
<div id="editCourseModal" class="hidden absolute inset-0 !z-50 flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg max-w-2xl w-full">
      <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Edit Course</h3>
      <form action="{{ route('handle-update-course',$course->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-6">
              <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Course Title</label>
              <input type="text" id="title" name="title" value="{{ $course->title }}" class="block w-full px-4 py-3 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-base">
          </div>
          <div class="mb-6">
              <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Description</label>
              <textarea id="description" name="description" rows="6" class="block w-full px-4 py-3 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-base resize-none">{{ $course->description }}</textarea>
          </div>
          <div class="flex justify-end gap-4">
              <button type="button" id="closeModalBtn" class="px-6 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
              <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Save</button>
          </div>
      </form>
  </div>



<script>
    document.getElementById('editCourseBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('editCourseModal').classList.remove('hidden');
    });

    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('editCourseModal').classList.add('hidden');
    });
</script>
@endsection
