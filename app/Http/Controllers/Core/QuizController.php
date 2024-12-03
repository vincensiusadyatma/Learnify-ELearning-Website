<?php
namespace App\Http\Controllers\Core;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class QuizController extends Controller
{
    public function store(Request $request, Course $course)
    {     
        // dd($request->all());
        try {
            // Validasi input
            $request->validate([
                'quiz_title' => 'required|string|max:255',
                'questions' => 'required|array',
                'questions.*.question' => 'required|string|max:255',
                'questions.*.answers' => 'required|array',
                'questions.*.answers.*' => 'required|string|max:255',
                // 'questions.*.correct_answer' => 'required|string|in:A,B,C,D', // Validasi jawaban yang benar
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
                    'isActive' => true, // Menganggap pertanyaan selalu aktif saat dibuat
                    'choices' => json_encode($questionData['answers']), // Menyimpan pilihan jawaban dalam format JSON
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
}
