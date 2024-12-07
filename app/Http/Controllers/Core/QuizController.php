<?php
namespace App\Http\Controllers\Core;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class QuizController extends Controller
{

    public function showQuiz() {
        $quiz = DB::table('quizzes')->get();
        //dd($quiz->toArray());
        return view('core.quiz', ['quiz' => $quiz]);
    }

    public function showQuizDetail(Quiz $quiz) {
        $question = DB::table('questions')->where('quiz_id', $quiz->id)->orderBy('id', 'asc')->get();
        //dd($quiz->toArray(), $question->toArray());
        return view('core.quizDetails', ['questions' => $question, 'quiz' => $quiz]);
    }

    public function showQuestion(Quiz $quiz, Question $question)
    {
        // Ambil soal saat ini
        $curr = $question;
    
        // Ambil jawaban user (jika ada)
        $userAnswer = Answer::where('user_id', auth()->id())
            ->where('quiz_id', $quiz->id)
            ->where('question_id', $curr->id)
            ->first();
    
        return view('core.question', [
            'questions' => Question::where('quiz_id', $quiz->id)->get(), // Semua soal terkait kuis
            'quiz' => $quiz,
            'currentQuestion' => $curr,
            'userAnswer' => $userAnswer,
        ]);
    }
    

//     // Ambil soal saat ini
//     $currentQuestion = $id
//         ? Question::where('quiz_id', $quizId)->findOrFail($id)
//         : Question::where('quiz_id', $quizId)->orderBy('id', 'asc')->first();


    public function storeAnswer(Request $request, $quizId, $questionId)
    {
        try {
            $request->validate([
                'answer' => 'required|string|max:255'
            ]);

            Answer::updateOrCreate([
                'user_id' => auth()->id(),
                'quiz_id' => $quizId,
                'question_id' => $questionId
            ],
            [
                'answer' => json_encode($request->input('answer'))        
            ]
        );

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // public function showQuestion(Quiz $quiz, Question $question) {
    //     return view('core.question', [
    //         'quiz' => $quiz,
    //         'question' => $question
    //     ]);
    // }

    // =================================================== Admin Methods Ares
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
