@extends('core.layouts.index')

@section('core-content')
<div class="h-screen grid grid-cols-12 gap-4 p-4">
    <!-- Content Section -->
    <div class="col-span-9 bg-white dark:bg-gray-900 p-6 rounded-lg shadow h-full overflow-hidden">
        <!-- Header -->
        <div class="mb-4">
            <nav class="text-sm text-gray-500">
                <a href="#" class="hover:underline">Home</a> > 
                <a href="#" class="hover:underline">Courses</a> > 
                {{-- <a href="#" class="hover:underline">{{ $course->name }}</a> >  --}}
                <span>{{ $quiz->title }}</span>
            </nav>
        </div>

        <!-- Judul Quiz dan Course -->
        <div class="mb-6">
            {{-- <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ $quiz->title }}
            </h1> --}}
            {{-- <p class="text-lg text-gray-500 dark:text-gray-400">Course: {{ $course->name }}</p> --}}
        </div>

        <!-- Soal -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                {{ $question->title }}
            </h2>

         
            
             <!-- Pilihan -->
             <div class="grid grid-cols-1 gap-4">
                @foreach($choices as $key => $text)
                    <button
                        id="choice-{{ $key }}"
                        type="button"
                        class="w-full flex items-center gap-4 py-3 px-6 text-lg font-medium border border-gray-300 rounded-lg
                        hover:!bg-blue-100 hover:!border-blue-400 focus:ring-2 focus:!ring-blue-400
                        dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 transition-all duration-200"
                        data-question-id="{{ $question->id }}"
                        data-choice-key="{{ $key }}"
                    >
                        <!-- Kotak Huruf -->
                        <span class="w-10 h-10 flex items-center justify-center font-bold text-gray-900 bg-gray-200 border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500">
                            {{ $key }}
                        </span>
                        <!-- Teks Jawaban -->
                        <span class="text-gray-900 dark:text-gray-300">{{ $text }}</span>
                    </button>
                @endforeach
            </div>
        </div>

               <!-- Navigasi -->
               <div class="flex justify-between items-center mt-8">
                @if($previousQuestion)
                    <a href="{{ route('show-question', ['quiz' => $quiz->id, 'question' => $previousQuestion->id]) }}"
                       class="py-2 px-6 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 hover:text-white transition duration-200">
                        Previous
                    </a>
                @else
                    <div></div>
                @endif
    
                @if($nextQuestion)
                    <a href="{{ route('show-question', ['quiz' => $quiz->id, 'question' => $nextQuestion->id]) }}"
                       class="py-2 px-6 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-200">
                        Next
                    </a>
                @else
                    <!-- Tombol Finish Quiz -->
                    {{-- {{ route('finish-quiz', ['quiz' => $quiz->id]) }} --}}
                    {{-- <form action="" method="POST">
                        @csrf
                        <button type="submit"
                                class="py-2 px-6 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-200">
                            Finish Quiz
                        </button>
                    </form> --}}
                    <button onclick="submitQuiz()"
        class="py-2 px-6 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-200">
    Finish Quiz
</button>

                @endif
            </div>
    
    </div>

    <!-- Sidebar -->
    <div class="col-span-3 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow h-full">
        <div class="mb-6 text-center">
            <!-- Timer -->
            <div class="text-xl font-bold !text-blue-500 dark:!text-blue-400">
                <span id="timer">02:00</span>
            </div>
            <p class="text-sm text-gray-500">Timer Remaining</p>
        </div>
        
        <!-- Quiz Questions List -->
        <ul class="space-y-2">
            @foreach ($questions as $q)
                <li 
                    class="p-3 text-center text-sm rounded-lg cursor-pointer 
                    {{ $q->id === $currentQuestionId ? '!bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }} 
                    hover:!bg-blue-400 hover:!text-white transition-all"
                    onclick="window.location.href='{{ route('show-question', ['quiz' => $quiz->id, 'question' => $q->id]) }}'">
                    <a href="{{ route('show-question', ['quiz' => $quiz->id, 'question' => $q->id]) }}" class="block w-full">
                        Quiz question {{ $loop->index + 1 }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Countdown Timer
    let timer = document.getElementById('timer');
    let timeRemaining = 120; // 2 minutes

    function updateTimer() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        timer.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        if (timeRemaining > 0) {
            timeRemaining--;
        } else {
            clearInterval(timerInterval);

            // Tampilkan SweetAlert ketika waktu habis
            Swal.fire({
                icon: 'warning',
                title: 'Time is up!',
                text: 'Your quiz has ended.',
                confirmButtonText: 'Go to Dashboard',
                allowOutsideClick: false,
                customClass: {
                    confirmButton: '!bg-blue-500 !text-white !rounded-lg !py-2 !px-6 hover:!bg-blue-600 focus:!ring focus:!ring-blue-400'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hapus jawaban dari localStorage
                    clearLocalStorage();

                    // Arahkan ke dashboard quiz
                    window.location.href = '/dashboard/quiz';
                }
            });
        }
    }

    const timerInterval = setInterval(updateTimer, 1000);

    // Hapus semua data jawaban dari localStorage
    function clearLocalStorage() {
        const questionIds = {{ json_encode($questions->pluck('id')) }};
        questionIds.forEach(id => {
            localStorage.removeItem('selected_choice_' + id);
        });
    }

    // Save and load selected choice
    document.querySelectorAll('button[id^="choice-"]').forEach(button => {
        button.addEventListener('click', function () {
            const questionId = this.getAttribute('data-question-id');
            const choiceKey = this.getAttribute('data-choice-key');
            
            // Simpan ke localStorage
            localStorage.setItem('selected_choice_' + questionId, choiceKey);

            // Update button styles
            document.querySelectorAll('button[id^="choice-"]').forEach(btn => {
                btn.classList.remove('!bg-blue-500', 'text-white');
                btn.classList.add('text-gray-900', 'bg-white');
            });

            this.classList.add('!bg-blue-500', 'text-white');
            this.classList.remove('text-gray-900', 'bg-white');
        });
    });

    window.addEventListener('load', function () {
        const questionId = {{ $question->id }};
        const selectedChoiceKey = localStorage.getItem('selected_choice_' + questionId);

        if (selectedChoiceKey !== null) {
            const button = document.querySelector(`#choice-${selectedChoiceKey}`);
            if (button) {
                button.classList.add('!bg-blue-500', 'text-white');
                button.classList.remove('text-gray-900', 'bg-white');
            }
        }
    });
</script>

<script>
    function submitQuiz() {
        const answers = {}; // Objek untuk menyimpan jawaban siswa
        const questionIds = {{ json_encode($questions->pluck('id')) }}; // Daftar ID pertanyaan

        // Ambil jawaban dari localStorage
        questionIds.forEach(questionId => {
            const selectedChoice = localStorage.getItem('selected_choice_' + questionId);
            if (selectedChoice) {
                answers[questionId] = selectedChoice;
            }
        });

        // Cek jika tidak ada jawaban sama sekali
        if (Object.keys(answers).length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'No Answers Selected',
                text: 'Please select at least one answer before submitting the quiz.',
                confirmButtonText: 'Close'
            });
            return;
        }

        // Ambil CSRF token dari meta tag
        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

        if (!csrfToken) {
            Swal.fire({
                icon: 'error',
                title: 'CSRF Token Missing',
                text: 'Please reload the page and try again.',
                confirmButtonText: 'Close'
            });
            return;
        }

        // Kirim jawaban ke server menggunakan fetch
        fetch(`{{ route('quiz.submit', $quiz->id) }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken // Kirim CSRF token
            },
            body: JSON.stringify({ answers }) // Kirim jawaban siswa
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Tampilkan skor menggunakan SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Quiz Submitted!',
                text: `Your score is ${data.score}.`,
                customClass: {
                    confirmButton: '!bg-blue-500 !text-white !rounded-lg !py-2 !px-6 hover:!bg-blue-600 focus:!ring focus:!ring-blue-400'
                },
                allowOutsideClick: false
            }).then(() => {
                // Hapus jawaban dari localStorage
                clearLocalStorage();

                // Redirect ke dashboard quiz
                window.location.href = '/dashboard/quiz';
            });
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to submit the quiz. Please try again.',
                confirmButtonText: 'Close'
            });
        });
    }

    function clearLocalStorage() {
        const questionIds = {{ json_encode($questions->pluck('id')) }};
        questionIds.forEach(id => {
            localStorage.removeItem('selected_choice_' + id);
        });
    }
</script>




@endsection
