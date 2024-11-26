<?php

namespace App\Http\Controllers\Core;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
}
