<?php

namespace App\Http\Controllers\Core;

use App\Models\Course;

use App\Models\Lesson;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{   
    public function listLesson($course)
    {
       
        //dd($lesson);
        return view('core.lesson',[
            'lesson' => 1
        ]);
    }

    public function showLesson(Course $course, Lesson $lesson){
        // Cek apakah file konten lesson ada di storage
        $filePath = $lesson->content; // Path file dari database atau model lesson
    
        if (Storage::disk('local')->exists($filePath)) {
            // Jika file ada, ambil kontennya
            $content = Storage::disk('local')->get($filePath);
            
            // Gunakan regex untuk mengekstrak bagian Content
            preg_match('/Content:\s*(.*)/s', $content, $matches);
            
            // Jika ditemukan, ambil bagian content
            $lessonContent = isset($matches[1]) ? $matches[1] : 'Materi belum ada';
        } else {
            // Jika file tidak ada, tampilkan pesan materi belum ada :V
            $lessonContent = 'Materi belum ada';
        }
    
        return view('core.lesson', [
            'lessons' => $course->lessons,
            'course' => $course,
            'selectedLesson' => $lesson,
            'lessonContent' => $lessonContent, 
        ]);
    }
    


   // Melanjutkan ke lesson terakhir dikunjungi :)
   public function continueLesson(Course $course){
       // Ambil lesson pertama dari course berdasarkan urutan ID
       $firstLesson = $course->lessons()->orderBy('id', 'asc')->first();
   
  
       // Jika ada lesson pertama, arahkan ke halaman lesson tersebut
       if ($firstLesson) {
           return redirect()->route('show-lesson', ['course' => $course->uuid, 'lesson' => $firstLesson->id]);
       }
   
       // Jika tidak ada lesson yang ditemukan, beri notifikasi ke pengguna
       return redirect()->back()->with('error', 'No lessons available for this course.');
   }
   

   public function showMaterial($filename){
        // Cek apakah file HTML ada
        if (Storage::disk('local')->exists($filename)) {
            // Ambil konten file .txt
            $content = Storage::disk('local')->get($filename);

            // Menampilkan konten file dalam bentuk HTML
            return response()->make($content, 200, [
                'Content-Type' => 'text/html',
            ]);
        }

        // Jika file tidak ditemukan
        return redirect()->back()->with('error', 'File not found.');
    }


    public function store(Request $request, Course $course){
    // Validasi data yang dikirim
    $request->validate([
        'lesson_title' => 'required|string|max:255',
        'lesson_description' => 'required|string|max:255',
        'lesson_content' => 'required|string',
    ]);

    // Format data pelajaran
    $lessonData = [
        'Title' => $request->lesson_title,
        'Course ID' => $course->id,
    ];

    // Format data konten
    $lessonContent = $request->lesson_content;

    // Format ke string yang rapi sesuai dengan format yang diinginkan
    $formattedData = "Lesson Details:\n";
    $formattedData .= "--------------------\n";
    foreach ($lessonData as $key => $value) {
        $formattedData .= "{$key}: {$value}\n";
    }
    $formattedData .= "--------------------\n";
    $formattedData .= "Content: {$lessonContent}\n"; // Content di bagian bawah

    // Tentukan path file di dalam public
    $filePath = "course/materials/lessons/lesson_" . uniqid() . ".txt";

    // Simpan ke disk 'public'
    Storage::disk('public')->put($filePath, $formattedData);

    // Simpan path file ke database
    $lesson = Lesson::create([
        'title' => $request->lesson_title,
        'description' => $request->lesson_description,
        'content' => 'public/' . $filePath, 
        'course_id' => $course->id,
    ]);

    // Berikan respons sukses
    return redirect()->route('show-course-management')->with('success', 'Lesson created successfully. File path saved in the database.');
    }

    public function delete(Request $request, Course $course, Lesson $lesson){
      
        if (Storage::disk('local')->exists($lesson->content)) {
         
            Storage::disk('local')->delete($lesson->content);
        }

        
        $lesson->delete();

   
        return redirect()->route('show-course-management')->with('success', 'Lesson and associated file deleted successfully.');
    }

     
     

    public function uploadImage(Request $request)
    {
    
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload gambar ke folder public/images
        if ($request->file('file')) {
            $image = $request->file('file');
            $imagePath = $image->store('course/materials/img', 'public');

            // Kembalikan URL gambar yang disimpan
            return response()->json(['filepath' => Storage::url($imagePath)]);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }



    // ================================= Admin Methods Area ===========================
    public function showLessonCMS(Course $course){
        return view('admin.addLessonManagement',[
            'course' => $course
        ]);
    }

   
}
