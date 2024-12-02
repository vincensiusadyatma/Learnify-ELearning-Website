<?php

namespace App\Http\Controllers\Core;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function showCourse(Request $request){
        
        $user = User::where('id', Auth::user()->id)->first();
        // Default: Ambil semua kursus
        $coursesQuery = Course::query();
    
        // Cek apakah tombol filter diklik atau tidak ada filter
        $filter = $request->get('filter', 'all');  // Default filter 'all'
    
        if ($filter == 'taken') {
            // Menampilkan kursus yang diambil (berdasarkan pivot table user_take_courses)
            $coursesQuery = $user->courses(); 
        } elseif ($filter == 'not_taken') {
            // Menampilkan kursus yang belum diambil sama user
            $coursesQuery = $coursesQuery->whereNotIn('courses.id', function($query) use ($user) {
                $query->select('course_id')
                      ->from('user_take_courses')
                      ->where('user_id', $user->id);
            });
        }
    
        // Ambil kursus sesuai filter 
        $courses = $coursesQuery->get();
    
        // Menghitung jumlah kursus yang udah diambil user
        $courseCount = DB::table('user_take_courses')
            ->where('user_id', $user->id)
            ->count();
    
        return view('core.course', [
            'courses' => $courses,
            'courses_count' => $courseCount,
            'filter' => $filter, // Kirimkan filter yang aktif ke tampilan
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

    public function showCourseDetail(Course $course){
        $lesson = Lesson::where('course_id', $course['id'])->get();

        return view('core.course-detail', [
            'course' => $course,
            'lesson' => $lesson
           
        ]);
    }


    public function update(Request $request, $id){
   
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

  
    $course = Course::findOrFail($id);

    
    $course->title = $request->input('title');
    $course->description = $request->input('description');


    $course->save();

   
    return redirect()->route('show-course-management')->with('success', 'Course updated successfully.');
    }

}
