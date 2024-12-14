<?php

namespace App\Http\Controllers\Core;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\CourseProgress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();
    
        // Ambil kursus terakhir yang diakses
        $lastAccessedCourse = CourseProgress::where('user_id', $user->id)
            ->with('course')
            ->orderByDesc('last_accessed_at')
            ->first();
    
        // Ambil kursus yang sedang dalam progress, kecuali kursus terakhir yang diakses
        $course = CourseProgress::where('user_id', $user->id)
            ->where('progress_percentage', '>=', 0) // Termasuk kursus dengan progress 0%
            ->when($lastAccessedCourse, function ($query) use ($lastAccessedCourse) {
                $query->where('course_id', '!=', $lastAccessedCourse->course_id);
            })
            ->with('course')
            ->orderByDesc('last_accessed_at') 
            ->take(3)
            ->get()
            ->map(function ($progress) {
                $progress->progress_percentage = intval($progress->progress_percentage); 
                return $progress;
            });
    
        return view('core.dashboard', [
            'user' => $user,
            'course' => $course,
            'lastAccessedCourse' => $lastAccessedCourse,
        ]);
    }
    
    


    public function showAdminDashboard(){
        $user = User::all()->count();
        $course = Course::all()->count();
        $lesson = Lesson::all()->count();
        return view('admin.dashboard',[
            'user_count' => $user,
            'course_count'=> $course,
            'lesson_count' => $lesson
        ]);
    }

}
