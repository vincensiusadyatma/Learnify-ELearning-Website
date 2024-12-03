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
        <h1>Edit Quiz</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Quiz Management</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Edit Quiz</a>
            </li>
        </ul>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
    <h2 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Edit Quiz</h2>

    <form action="{{ route('handle-quiz-update', ['quiz' => $quiz->id]) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Quiz Title -->
        <div>
            <label for="quiz_title" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Quiz Title</label>
            <input type="text" id="quiz_title" name="quiz_title" value="{{ old('quiz_title', $quiz->title) }}" placeholder="Enter Quiz title"
                class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
        </div>

        <div id="questions-container">
            @foreach($questions as $question)
            <!-- Hidden Input for Question ID -->
            <input type="hidden" name="questions[{{ $question->id }}][id]" value="{{ $question->id }}">
            <div class="question-section" id="question-{{ $question->id }}">
                <div>
                    <label for="question_{{ $question->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Question {{ $loop->iteration }}</label>
                    <input type="text" id="question_{{ $question->id }}" name="questions[{{ $question->id }}][title]" value="{{ old('questions.' . $question->id . '.title', $question->title) }}"
                        placeholder="Enter Question"
                        class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                </div>

                <div id="answers-container-{{ $question->id }}">
                    @foreach(json_decode($question->choices, true) as $key => $choice)
                    <div class="answer-input">
                        <label for="answer_{{ $question->id }}{{ $key }}" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-400">{{ $key }}</label>
                        <input type="text" id="answer_{{ $question->id }}{{ $key }}" name="questions[{{ $question->id }}][choices][{{ $key }}]" value="{{ old('questions.' . $question->id . '.choices.' . $key, $choice) }}"
                            placeholder="Enter Answer {{ $key }}"
                            class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                    </div>
                    @endforeach
                </div>

                <div class="mt-2">
                    <label for="correct_answer_{{ $question->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Correct Answer</label>
                    <select id="correct_answer_{{ $question->id }}" name="questions[{{ $question->id }}][correct_answer]" 
                        class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
                        @foreach(json_decode($question->choices, true) as $key => $choice)
                            <option value="{{ $key }}" {{ old('questions.' . $question->id . '.correct_answer', $question->correct_answer) == $key ? 'selected' : '' }}>
                                {{ $key }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="button" class="mt-2 text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 rounded-lg px-4 py-2"
                        id="add-answer-{{ $question->id }}" data-question-id="{{ $question->id }}">Add Answer</button>
            </div>
            @endforeach
        </div>

        <div class="flex justify-end gap-4 mt-4">
            <button type="button" class="text-blue-700 border border-blue-700 px-5 py-2 rounded-lg"
                    id="add-question">Add Question</button>
            <a href="" class="px-6 py-3 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Update Quiz</button>
        </div>
    </form>
</div>

<script>
    let questionCount = {{ $questions->count() }};
    let answerCount = {};
    const maxAnswers = 4; // Maksimal pilihan sampai D

    @foreach($questions as $question)
        answerCount[{{ $question->id }}] = {{ count(json_decode($question->choices, true)) }};
    @endforeach

    // Handle add new question
    document.getElementById('add-question').addEventListener('click', function () {
        questionCount++;
        answerCount[questionCount] = 2; // Default 2 pilihan

        const questionSection = `
            <div class="question-section" id="question-${questionCount}">
                <input type="hidden" name="questions[${questionCount}][id]" value="null">
                <div>
                    <label for="question_${questionCount}" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Question ${questionCount}</label>
                    <input type="text" id="question_${questionCount}" name="questions[${questionCount}][title]" placeholder="Enter Question"
                        class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                </div>

                <div id="answers-container-${questionCount}">
                    <div class="answer-input">
                        <label for="answer_${questionCount}A" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-400">A</label>
                        <input type="text" id="answer_${questionCount}A" name="questions[${questionCount}][choices][A]" placeholder="Enter Answer A"
                            class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                    </div>
                    <div class="answer-input">
                        <label for="answer_${questionCount}B" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-400">B</label>
                        <input type="text" id="answer_${questionCount}B" name="questions[${questionCount}][choices][B]" placeholder="Enter Answer B"
                            class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                    </div>
                </div>

                <div class="mt-2">
                    <label for="correct_answer_${questionCount}" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Correct Answer</label>
                    <select id="correct_answer_${questionCount}" name="questions[${questionCount}][correct_answer]" 
                        class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm">
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>
                <button type="button" class="mt-2 text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 rounded-lg px-4 py-2"
                        id="add-answer-${questionCount}" data-question-id="${questionCount}">Add Answer</button>
            </div>
        `;
        document.getElementById('questions-container').insertAdjacentHTML('beforeend', questionSection);
    });

    document.addEventListener('click', function (e) {
    // Periksa apakah tombol yang diklik adalah tombol "Add Answer"
    if (e.target && e.target.matches('[id^="add-answer-"]')) {
        const questionId = e.target.getAttribute('data-question-id');
        if (!answerCount[questionId]) {
            answerCount[questionId] = 2; // Default jumlah jawaban untuk pertanyaan baru
        }

        if (answerCount[questionId] < maxAnswers) {
            answerCount[questionId]++;
            const answerKey = String.fromCharCode(64 + answerCount[questionId]); // A, B, C, D...

            const answerSection = `
                <div class="answer-input">
                    <label for="answer_${questionId}${answerKey}" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-400">${answerKey}</label>
                    <input type="text" id="answer_${questionId}${answerKey}" name="questions[${questionId}][choices][${answerKey}]"
                        placeholder="Enter Answer ${answerKey}" class="block w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white text-sm" required>
                </div>
            `;
            document.getElementById(`answers-container-${questionId}`).insertAdjacentHTML('beforeend', answerSection);
        } else {
            alert(`Maximum ${maxAnswers} answers allowed.`);
        }
    }
});

</script>
@endsection
