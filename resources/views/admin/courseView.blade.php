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
