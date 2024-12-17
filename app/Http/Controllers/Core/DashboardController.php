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
    public function showDashboard(){
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
    
    

    public function showAdminDashboard()
    {
        // Hitung jumlah user, course, dan lesson
        $user_count = User::all()->count();
        $course_count = Course::all()->count();
        $lesson_count = Lesson::all()->count();
    
        // Ambil data jumlah pengguna per bulan
        $users_by_month = User::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count')
            ->groupByRaw('EXTRACT(MONTH FROM created_at)')
            ->get()
            ->pluck('count', 'month')
            ->toArray();
    
        // Hitung jumlah pengguna aktif dan tidak aktif
        $active_users = User::where('status', 'active')->count();
        $inactive_users = User::where('status', 'inactive')->count();
    
        // dd($active_users);
        // Kirim data ke view
        return view('admin.dashboard', [
            'user_count' => $user_count,
            'course_count' => $course_count,
            'lesson_count' => $lesson_count,
            'users_by_month' => $users_by_month,
            'active_users' => $active_users,
            'inactive_users' => $inactive_users,
            'users' => User::all()  // Pastikan kamu mengirimkan data pengguna ke tabel
        ]);
    }
    
    
    

}
