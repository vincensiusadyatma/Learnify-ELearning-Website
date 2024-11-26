<?php

namespace App\Http\Controllers\Core;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function showCourse(){
        
        $course = Course::all()->toArray();
        //dd($course);
        return view('core.course', [
            'courses' => $course
        ]);
    }
    public function takeCourse(Course $course){
    
         $existingRecord = DB::table('user_take_courses')
            ->where('user_id', Auth::user()->id)
            ->where('course_id', $course->id)
            ->first();

      
        if ($existingRecord) {
            notify()->error('Login failed. Please check your credentials and try again.');

        return redirect()->route('show-dashboard')->with('info', 'You have already taken this course.');
        }

      
        DB::table('user_take_courses')->insert([
        'user_id' => Auth::user()->id,
        'course_id' => $course->id,
        'created_at' => now(),
        ]);

     
        emotify('success', 'Your course was successfully added');
        return redirect()->route('show-dashboard')->with('success', 'Course added successfully!');
        
    }
}
