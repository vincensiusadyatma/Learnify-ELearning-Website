@extends('template.dashboard-admin-template')

<!-- Menambahkan CSS untuk Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<style>
    /* Optional: Customizing Summernote's appearance */
    .note-editor {
        border: 1px solid #ccc !important;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1) !important;
    }

    .note-editable {
        padding: 10px !important;
        min-height: 150px !important;
    }

    .note-toolbar {
        background-color: #f5f5f5 !important;
    }
</style>

@section('content')
<div class="head-title mb-10">
    <div class="left">
        <h1>Edit Lesson Management</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Course Management</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Edit Lesson</a>
            </li>
        </ul>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
    <h2 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Edit Lesson</h2>
    <form action="{{ route('handle-update-lesson', ['course' => $course->id, 'lesson' => $lesson->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label for="lesson_title" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Lesson Title</label>
            <input type="text" id="lesson_title" name="lesson_title" value="{{ $lesson->title }}" readonly
                class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm bg-gray-200">
        </div>

        <div>
            <label for="lesson_description" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Description</label>
            <input type="text" id="lesson_description" name="lesson_description" placeholder="Enter lesson description" value="{{$lesson->description}}"
                class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
        </div>

        <div>
            <label for="lesson_content" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Lesson Content</label>
            <textarea id="lesson_content" name="lesson_content">{{ $content }}</textarea>
        </div>

        <div class="flex justify-end gap-4">
            <a href="#" class="px-6 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Save changes</button>
        </div>
    </form>
</div>

<!-- Menambahkan jQuery dan Summernote JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#lesson_content').summernote({
            height: 300,  // Menentukan tinggi editor
            placeholder: 'Enter lesson content here...',  // Placeholder untuk editor
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],  // nambah style
                ['font', ['strikethrough', 'superscript', 'subscript']],  // Menambahkan tombol font
                ['para', ['ul', 'ol', 'paragraph']],  // Menambahkan tombol paragraf
                ['insert', ['link', 'picture']]  // Menambahkan tombol untuk link dan gambar
            ],
            callbacks: {
                onImageUpload: function(files) {
                    var data = new FormData();
                    data.append('file', files[0]);

                    // Mengirimkan gambar ke server pakek AJAX
                    $.ajax({
                        url: '/upload-image', // URL untuk handle upload gambar 
                        method: 'POST',
                        data: data,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Menambahkan CSRF token ke headerv untuk uplaod gambar
                        },
                        success: function(response) {
                            // Menyisipkan gambar ke dalam editor
                            $('#lesson_content').summernote('insertImage', response.filepath);
                        },
                        error: function(xhr, status, error) {
                            console.log('Image upload failed:', error);
                        }
                    });

                }
            }
        });
    });
</script>


@endsection
