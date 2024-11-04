<?php

namespace App\Http\Controllers\Core;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard(){
        // untuk mengambil model user yang sedang login 
        $user = Auth::user();
        // untuk megambil data course yang user ambil saja
        $course = $user->courses->pluck('title')->toArray();

        return view('dashboard.main',[
            'user' => $user,
            'course' => $course
        ]);
    }
}
