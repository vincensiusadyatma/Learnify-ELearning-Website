@extends('template.dashboard-admin-template')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<style>
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

    .question-section {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .answer-input {
        margin-bottom: 10px;
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
    
    <form action="{{ route('handle-store-quiz', ['course' => $course->id]) }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="quiz_title" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Quiz Title</label>
            <input type="text" id="quiz_title" name="quiz_title" placeholder="Enter Quiz title"
                class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
        </div>

        <div id="questions-container">
            <div class="question-section" id="question-1">
                <div>
                    <label for="question_1" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Question 1</label>
                    <input type="text" id="question_1" name="questions[1][question]" placeholder="Enter Question"
                        class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                </div>

                <div id="answers-container-1">
                    <div class="answer-input">
                        <label for="answer_1a" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-400">A</label>
                        <input type="text" id="answer_1a" name="questions[1][answers][A]" placeholder="Enter Answer A"
                            class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                    </div>
                    <div class="answer-input">
                        <label for="answer_1b" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-400">B</label>
                        <input type="text" id="answer_1b" name="questions[1][answers][B]" placeholder="Enter Answer B"
                            class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="correct_answer_1" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Correct Answer</label>
                    <select id="correct_answer_1" name="questions[1][correct_answer]"
                        class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
                        <option value="" disabled selected>Select Correct Answer</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>

                <button type="button" class="mt-2 text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 rounded-lg px-4 py-2"
                        id="add-answer-1" data-question-id="1">Add Answer</button>
            </div>
        </div>

        <div class="flex justify-end gap-4 mt-4">
            <button type="button" class="text-blue-700 border border-blue-700 px-5 py-2 rounded-lg"
                    id="add-question">Add Question</button>
            <a href="#" class="px-6 py-3 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Save Quiz</button>
        </div>
    </form>
</div>

<script>
    let questionCount = 1;
    let answerCount = { 1: 2 };

    document.getElementById('add-question').addEventListener('click', function() {
        questionCount++;
        answerCount[questionCount] = 2;

        const questionSection = `
            <div class="question-section" id="question-${questionCount}">
                <div>
                    <label for="question_${questionCount}" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Question ${questionCount}</label>
                    <input type="text" id="question_${questionCount}" name="questions[${questionCount}][question]" placeholder="Enter Question"
                        class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                </div>

                <div id="answers-container-${questionCount}">
                    <div class="answer-input">
                        <label for="answer_${questionCount}a" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-400">A</label>
                        <input type="text" id="answer_${questionCount}a" name="questions[${questionCount}][answers][A]" placeholder="Enter Answer A"
                            class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                    </div>
                    <div class="answer-input">
                        <label for="answer_${questionCount}b" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-400">B</label>
                        <input type="text" id="answer_${questionCount}b" name="questions[${questionCount}][answers][B]" placeholder="Enter Answer B"
                            class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="correct_answer_${questionCount}" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Correct Answer</label>
                    <select id="correct_answer_${questionCount}" name="questions[${questionCount}][correct_answer]"
                        class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
                        <option value="" disabled selected>Select Correct Answer</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>

                <button type="button" class="mt-2 text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 rounded-lg px-4 py-2"
                        id="add-answer-${questionCount}" data-question-id="${questionCount}">Add Answer</button>
            </div>
        `;
        document.getElementById('questions-container').insertAdjacentHTML('beforeend', questionSection);
        document.getElementById(`add-answer-${questionCount}`).addEventListener('click', function() {
            addAnswer(questionCount);
        });
    });

    function addAnswer(questionId) {
        if (answerCount[questionId] < 4) {
            answerCount[questionId]++;
            const newAnswerLabel = String.fromCharCode(64 + answerCount[questionId]); 
            const newAnswerSection = `
                <div class="answer-input">
                    <label for="answer_${questionId}${newAnswerLabel}" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-400">${newAnswerLabel}</label>
                    <input type="text" id="answer_${questionId}${newAnswerLabel}" name="questions[${questionId}][answers][${newAnswerLabel}]" placeholder="Enter Answer ${newAnswerLabel}"
                        class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                </div>
            `;
            document.getElementById(`answers-container-${questionId}`).insertAdjacentHTML('beforeend', newAnswerSection);
            document.getElementById(`correct_answer_${questionId}`).insertAdjacentHTML('beforeend', `<option value="${newAnswerLabel}">${newAnswerLabel}</option>`);
        }
    }

    document.getElementById('add-answer-1').addEventListener('click', function() {
        addAnswer(1);
    });
</script>
@endsection
