<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function showDashboard(){
        $user = User::all();
        return view('admin.dashboard',[
            'user' => $user
        ]);
    }

    public function showUserManagement(){
        $user = User::where('id', '!=', Auth::id())->get();
        return view('admin.userManagement',[
            'users' => $user
        ]);
    }

    public function showCourseManagement(){
        return view('admin.courseManagement');
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
}
