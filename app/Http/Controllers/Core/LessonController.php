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
        $lesson = lesson::where('course_id', $course)->get()->toArray();
        //dd($lesson);
        return view('core.lesson',[
            'lesson' => $lesson
        ]);
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
