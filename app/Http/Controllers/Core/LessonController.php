<?php

namespace App\Http\Controllers\Core;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\course;
use App\Models\lesson;

class LessonController extends Controller
{   
    public function listLesson($course)
    {
       
        //dd($lesson);
        return view('core.lesson',[
            'lesson' => 1
        ]);
    }

   // Menampilkan pelajaran tertentu berdasarkan ID
   public function showLesson(Course $course, Lesson $lesson)
   {

       // Validasi agar lesson sesuai dengan course yang dimaksud
    //    if ($lesson->course_id !== $course->id) {
    //        abort(404); // Jika lesson tidak sesuai dengan course, munculkan 404
    //    }

       return view('core.lesson', [
        //    'lesson' => $lesson,
           'course' => $course,
       ]);
   }

   // Melanjutkan ke lesson pertama
   public function continueLesson(Course $course)
   {
       // Ambil lesson pertama dari course berdasarkan urutan ID
       $firstLesson = $course->lessons()->orderBy('id', 'asc')->first();
   
       // Jika ada lesson pertama, arahkan ke halaman lesson tersebut
       if ($firstLesson) {
           return redirect()->route('show-lesson', ['course' => $course->uuid, 'id' => $firstLesson->id]);
       }
   
       // Jika tidak ada lesson yang ditemukan, beri notifikasi ke pengguna
       return redirect()->back()->with('error', 'No lessons available for this course.');
   }

    public function showMaterial($filename)
    {   
        $file = storage_path("app\public\materials\\".$filename);
        //dd($file);
        if (file_exists($file)) {
            $content = file_get_contents($file);
            return view('core.materials', ['content' => $content]);
        } else {
            abort(404, 'Material not found.');
        }
     }
}
