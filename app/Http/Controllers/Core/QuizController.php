<?php
namespace App\Http\Controllers\Core;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuizSubmission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class QuizController extends Controller
{

    public function showQuiz() {
        $quiz = DB::table('quizzes')->get();
        //dd($quiz->toArray());
        return view('core.quiz', ['quiz' => $quiz]);
    }


    public function showQuizDetail(Quiz $quizId) {
        $questions = DB::table(('questions'))->where('quiz_id', $quizId->id)->get();
       
        //dd($questions->toArray());
        return view('core.quizDetails', ['questions' => $questions]);
    }


    // Menampilkan kuis dengan pertanyaan pertama
    public function showFirstQuestion(Quiz $quiz) {
        // Mengambil pertanyaan pertama
        $firstQuestion = $quiz->question()->first();
        $questions = DB::table('questions')->where('quiz_id', $quiz->id)->get();

        
        if ($firstQuestion) {
            // Jika ada pertanyaan pertama, arahkan ke route 'show-question' dengan quiz ID dan firstQuestion ID
            return redirect()->route('show-question', [
                'quiz' => $quiz->id,
                'question' => $firstQuestion->id
            ]);
        } else {
            // Jika tidak ada pertanyaan, kembali ke halaman kuis dengan pesan error
            return redirect()->route('show-quiz')->with('error', 'No questions available for this quiz.');
        }
    }
    

    public function showQuestion(Quiz $quiz, Question $question){
        // Mengambil kuis berdasarkan ID
        $quiz = Quiz::findOrFail($quiz->id);

        // Mengambil semua pertanyaan terkait kuis dan mengurutkan berdasarkan ID
        $questions = Question::where('quiz_id', $quiz->id)->orderBy('id')->get();

        // Cari indeks pertanyaan saat ini dalam daftar pertanyaan
        $currentIndex = $questions->search(function ($q) use ($question) {
            return $q->id == $question->id;
        });

        // Tentukan pertanyaan sebelumnya dan berikutnya
        $previousQuestion = $currentIndex > 0 ? $questions[$currentIndex - 1] : null;
        $nextQuestion = $currentIndex < $questions->count() - 1 ? $questions[$currentIndex + 1] : null;

        // Decode JSON untuk pilihan jawaban pada pertanyaan saat ini
        $choices = json_decode($question->choices, true);

        // Kirimkan data ke tampilan
        return view('core.quizDetails', [
            'quiz' => $quiz,
            'question' => $question,
            'choices' => $choices, 
            'questions' => $questions, 
            'previousQuestion' => $previousQuestion,
            'nextQuestion' => $nextQuestion, 
            'currentQuestionId' => $question->id 
        ]);
    }


    public function submitQuiz(Request $request, $quizId){
        $validated = $request->validate([
            'answers' => 'required|array', // Format: ['question_id' => 'selected_choice']
        ]);

        $user = Auth::user(); 
        $answers = $validated['answers'];

        // Ambil semua pertanyaan terkait quiz
        $questions = Question::where('quiz_id', $quizId)->get();
        $totalQuestions = $questions->count();

        if ($totalQuestions === 0) {
            return response()->json([
                'message' => 'No questions found for this quiz.',
                'score' => 0,
                'correctAnswers' => [],
                'submission' => null,
            ], 400);
        }

        // Hitung skor
        $correctCount = 0;
        $correctAnswers = [];
        foreach ($questions as $question) {
            if (isset($answers[$question->id]) && $answers[$question->id] === $question->correct_answer) {
                $correctCount++;
                $correctAnswers[$question->id] = true;
            } else {
                $correctAnswers[$question->id] = false;
            }
        }

        // Hitung skor dalam rentang 0-100
        $score = round(($correctCount / $totalQuestions) * 100, 2); // 2 desimal untuk presisi

        // Simpan hasil quiz ke tabel `quiz_submissions`
        $submission = QuizSubmission::updateOrCreate(
            ['user_id' => $user->id, 'quiz_id' => $quizId],
            ['answers' => $answers, 'score' => $score]
        );

        return response()->json([
            'message' => 'Quiz submitted successfully!',
            'score' => $score,
            'correctAnswers' => $correctAnswers,
            'submission' => $submission,
        ]);
    }





    // =================================================== Admin Methods Ares==============================
    public function store(Request $request, Course $course){     
        // dd($request->all());
        try {
            // Validasi input
            $request->validate([
                'quiz_title' => 'required|string|max:255',
                'questions' => 'required|array',
                'questions.*.question' => 'required|string|max:255',
                'questions.*.answers' => 'required|array',
                'questions.*.answers.*' => 'required|string|max:255',
                'questions.*.correct_answer' => 'required|string|in:A,B,C,D', // Validasi jawaban yang benar
            ]);

            // Membuat Quiz
            $quizId = DB::table('quizzes')->insertGetId([
                'title' => $request->quiz_title,
                'course_id' => $course->id, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Menyimpan Pertanyaan dan Pilihan Jawaban
            foreach ($request->questions as $questionData) {
                DB::table('questions')->insert([
                    'quiz_id' => $quizId,
                    'title' => $questionData['question'],
                    'isActive' => true, 
                    'choices' => json_encode($questionData['answers']), 
                    'correct_answer' => isset($questionData['correct_answer']) ? $questionData['correct_answer'] : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Mengembalikan response setelah data berhasil disimpan
            return redirect()->route('show-quiz-management')->with('success', 'Quiz created successfully!');
        
        } 
        catch (QueryException $e) {
            // Tangkap kesalahan database 
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        }
        catch (\Exception $e) {
            // Log error dan kirim pesan error
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function showquizDetailsForUpdate(Quiz $quiz){

        $questions = $quiz->question()->get();

        return view('admin.quizUpdateDetails',[
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }



    public function update(Request $request, Quiz $quiz)
    {
        try {
            // Validasi input
            $request->validate([
                'quiz_title' => 'required|string|max:255',
                'questions' => 'required|array',
                // 'questions.*.id' => 'nullable|exists:questions,id', 
                'questions.*.title' => 'required|string|max:255',
                'questions.*.choices' => 'required|array',
                'questions.*.correct_answer' => 'string|in:A,B,C,D',
            ]);
    
         
            DB::beginTransaction();
    
            // Update judul kuis
            $quiz->update([
                'title' => $request->input('quiz_title'),
            ]);
    
            // Update pertanyaan dan pilihannya
            foreach ($request->questions as $questionData) {
                if ($questionData['id'] === 'null') {
                    // Buat pertanyaan baru
                    $question = new Question();
                    $question->quiz_id = $quiz->id; 
                    $question->title = $questionData['title'];
                    $question->choices = json_encode($questionData['choices']);
                    $question->correct_answer = $questionData['correct_answer'] ?? null;
                    $question->isActive = true; // Set default value true
                    $question->save();
                } else {
                    // Perbarui pertanyaan yang sudah ada
                    $question = Question::findOrFail($questionData['id']);
                    $question->update([
                        'title' => $questionData['title'],
                        'choices' => json_encode($questionData['choices']),
                        'correct_answer' => $questionData['correct_answer'],
                        'isActive' => $question->isActive ?? true, // Set default isActive jika tidak ada
                    ]);
                }
            }
    
           
            DB::commit();
    
            return redirect()->route('show-quiz-management')->with('success', 'Quiz updated successfully.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();
        
            // Redirect kembali dengan pesan error
            return redirect()->route('show-quiz-management')->with('error', 'Failed to update quiz. Please try again.');
        }
    }



    public function delete(Quiz $quiz)
    {
        try {
            $quiz->question()->delete(); 
            $quiz->delete();
    
            return redirect()->route('show-quiz-management')->with('success', 'Quiz deleted successfully!');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    

    public function showQuizManagement(Request $request)
    {
       
        $search = $request->get('search');
    
     
        $courses = Course::when($search, function ($query, $search) {
            return $query->whereRaw('LOWER(title) LIKE ?', [strtolower($search) . '%']);
        })->paginate(8); 
   
        return view('admin.quizManagement', [
            'courses' => $courses,
            'search' => $search
        ]);
    }


    public function showQuizDetails(Course $course) {
        $lessons = DB::table('lessons')->where('course_id', $course->id)->pluck('id');
        $quiz = DB::table('quizzes')->whereIn('course_id', $lessons)->get();
        //dd($quiz);
        return view('admin.quizDetails', [
            'quiz' => $quiz,
            'course' => $course,
            'lessons_id' => $lessons
        ]);
    }

    public function showquizCMS(Course $course)  
    {
        return view('admin.addQuizManagement',[
            'course' =>  $course
        ]);
    }
}
