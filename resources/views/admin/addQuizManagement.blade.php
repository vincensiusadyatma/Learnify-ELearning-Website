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
        <h1>Add Quiz Management</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Quiz Management</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Add Quiz</a>
            </li>
        </ul>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
    <h2 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Create New Quiz</h2>
    
    {{-- {{ route('handle-add-lesson',$course->id) }} --}}
    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label for="quiz_title" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Quiz Title</label>
            <input type="text" id="lesson_title" name="lesson_title" placeholder="Enter Quiz title"
                class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
        </div>

        <div class="bg-blue-500 dark:bg-gray-800 px-5 py-3 rounded-lg shadow-lg">
        <div>
            <label for="quiz_questions" class="block text-sm font-medium text-white dark:text-gray-400">Question 1</label>
            <input type="text" id="lesson_description" name="lesson_description" placeholder="Enter Questions"
                class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
        </div>
        
        <div class="py-4">
            <label for="quiz_answers" class="block text-sm font-medium text-white dark:text-gray-400">Answers</label>
            <div class="mt-2">
                <div class="mb-2">
                    <label for="answer_a" class="inline-flex items-center text-sm text-white dark:text-gray-400">A</label>
                    <input type="text" id="answer_a" name="answer_a" placeholde="Enter Answer A" class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
                </div>
                <div class="mb-2">
                    <label for="answer_b" class="inline-flex items-center text-sm text-white dark:text-gray-400">B</label>
                    <input type="text" id="answer_b" name="answer_b" placeholde="Enter Answer B" class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
                </div>
                <div class="mb-2">
                    <label for="answer_c" class="inline-flex items-center text-sm text-white dark:text-gray-400">C</label>
                    <input type="text" id="answer_c" name="answer_c" placeholde="Enter Answer C" class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
                </div>
                <div class="mb-2">
                    <label for="answer_d" class="inline-flex items-center text-sm text-white dark:text-gray-400">D</label>
                    <input type="text" id="answer_d" name="answer_d" placeholde="Enter Answer D" class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
                </div>
            </div>
            
            <div class="py-2">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">True Answer<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">A</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">B</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">C</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">D</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>

        </div>
        <div class="flex justify-end gap-4">
        <!-- <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Add question</button> -->
        <button class="px-6 py-2 text-blue-500 hover:text-white bg-white rounded-lg hover:bg-blue-500 border">Add question</button>
            <a href="#" class="px-6 py-3 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Save Quiz</button>
        </div>
    </form>
</div>
@endsection