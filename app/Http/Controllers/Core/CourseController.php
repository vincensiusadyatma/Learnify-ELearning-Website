<?php

namespace App\Http\Controllers\Core;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\course;

class CourseController extends Controller
{
    public function showCourse(){
        
        $course = course::all()->toArray();
        //dd($course);
        return view('core.course', [
            'courses' => $course
        ]);
    }
}
