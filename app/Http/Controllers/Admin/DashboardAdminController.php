<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function showDashboard(){
        $user = User::all()->count();
        $course = Course::all()->count();
        $lesson = Lesson::all()->count();
        return view('admin.dashboard',[
            'user_count' => $user,
            'course_count'=> $course,
            'lesson_count' => $lesson
        ]);
    }

    public function showUserManagement(){
        $user = User::where('id', '!=', Auth::id())->get();
        return view('admin.userManagement',[
            'users' => $user
        ]);
    }

    public function showCourseManagement(){
        $courses = Course::all();
        return view('admin.courseManagement',[
            'courses' => $courses
        ]);
    }

    public function showUserDetails(User $user){
    
        return view('admin.userDetails',[
            'user' => $user
        ]);
    }

    public function showUserSetting(User $user){
    
        return view('admin.userSetting',[
            'user' => $user
        ]);
    }

    public function showCourseDetails(Course $course){

            
        $lessons = $course->lessons;  

       
        return view('admin.courseDetails', [
            'course' => $course,
            'lessons' => $lessons
        ]);
    }

    
    public function showLessonCMS(Course $course){
        return view('admin.addLessonManagement',[
            'course' => $course
        ]);
    }


    public function updateUser(){

    }

    public function deleteUser(){
        
    }
   
}
