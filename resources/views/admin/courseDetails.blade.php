@extends('template.dashboard-admin-template')

@section('content')
<div class="head-title mb-10">
    <div class="left">
        <h1>{{ $course->title }} Course Management</h1>
        <ul class="breadcrumb">
            <li><a href="#">Course Management</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="" href="#">Main</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="active" href="#">Details</a></li>
        </ul>
    </div>

    <div class="flex space-x-4">
        <a href="#" id="editCourseBtn" class="btn-download flex items-center space-x-2">
            <i class='bx bx-edit text-lg'></i>
            <span class="text">Edit Course</span>
        </a>
        <a href="{{ route('show-add-lesson-cms', $course->id) }}" class="btn-download flex items-center space-x-2">
            <i class='bx bxs-add-to-queue'></i>
            <span class="text">Add Lesson</span>
        </a>
        <!-- Tombol Delete Course -->
        <button id="deleteCourseBtn" 
                data-url="{{ route('handle-delete-course', $course->id) }}" 
                class="btn-download flex items-center space-x-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
            <i class='bx bx-trash text-lg'></i>
            <span class="text">Delete Course</span>
        </button>
    </div>
</div>

<!-- List Lessons -->
<div class="flex flex-col gap-4">
    @if($lessons->isEmpty())
        <p class="text-gray-500">No lessons found for this course.</p>
    @else
        @foreach($lessons as $lesson)
        <div class="py-5 px-5 flex items-center w-full bg-white border border-gray-200 rounded-lg shadow">
            <img class="w-32 h-32 rounded-l-lg object-cover" src="/img/assets/course/{{ $course->img }}" alt="Lesson Image">
            <div class="p-4 flex-1">
                <h5 class="text-lg font-semibold tracking-tight text-gray-900">{{ $lesson->title }}</h5>
                <p class="mt-2 text-sm text-gray-600">{{ Str::limit($lesson->description, 100) }}</p>
            </div>
            <div class="flex space-x-2 p-4">
                <!-- View Button -->
                <a href="" class="bg-blue-500 text-white rounded-md px-3 py-2 hover:bg-blue-600 flex items-center space-x-1">
                    <span>View</span>
                </a>
                <!-- Edit Button -->
                <a href="" class="bg-yellow-500 text-white rounded-md px-3 py-2 hover:bg-yellow-600 flex items-center space-x-1">
                    <span>Edit</span>
                </a>
                <!-- Delete Button -->
                <button class="bg-red-500 text-white rounded-md px-3 py-2 hover:bg-red-600 flex items-center space-x-1 deleteLessonBtn" 
                        data-url="{{ route('handle-delete-lesson', ['course' => $course->id, 'lesson' => $lesson->id]) }}">
                    <span>Delete</span>
                </button>
            </div>
        </div>
        @endforeach
    @endif
</div>

<!-- Pop-Up Form: Edit Course -->
<div id="editCourseModal" class="hidden absolute inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full">
        <h3 class="text-lg font-bold mb-6">Edit Course</h3>
        <form action="{{ route('handle-update-course', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                <input type="text" id="title" name="title" value="{{ $course->title }}" 
                       class="block w-full px-4 py-3 border rounded-lg">
            </div>
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="6" 
                          class="block w-full px-4 py-3 border rounded-lg">{{ $course->description }}</textarea>
            </div>
            <div class="flex justify-end gap-4">
                <button type="button" id="closeModalBtn" class="px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Edit Course Modal
        document.getElementById('editCourseBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('editCourseModal').classList.remove('hidden');
        });

        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('editCourseModal').classList.add('hidden');
        });

        // SweetAlert2 for Delete Course
        document.getElementById('deleteCourseBtn').addEventListener('click', function() {
            const deleteUrl = this.dataset.url;

            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the course and its data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = deleteUrl;

                    const csrfField = document.createElement('input');
                    csrfField.type = 'hidden';
                    csrfField.name = '_token';
                    csrfField.value = '{{ csrf_token() }}';

                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';

                    form.appendChild(csrfField);
                    form.appendChild(methodField);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });

        // SweetAlert2 for Delete Lesson
        document.querySelectorAll('.deleteLessonBtn').forEach(button => {
            button.addEventListener('click', function() {
                const deleteUrl = this.dataset.url;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will delete the lesson!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = deleteUrl;

                        const csrfField = document.createElement('input');
                        csrfField.type = 'hidden';
                        csrfField.name = '_token';
                        csrfField.value = '{{ csrf_token() }}';

                        const methodField = document.createElement('input');
                        methodField.type = 'hidden';
                        methodField.name = '_method';
                        methodField.value = 'DELETE';

                        form.appendChild(csrfField);
                        form.appendChild(methodField);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection
