<?php

namespace App\Http\Controllers\Core;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard(){
       
        $user = User::where('id', Auth::user()->id)->first();
       
        $course = $user->courses()->orderBy('created_at', 'asc')->take(3)->get();

        return view('core.dashboard',[
            'user' => $user,
            'course' => $course
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
