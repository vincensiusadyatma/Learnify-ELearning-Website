<?php

namespace App\Http\Controllers\Core;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard(){
        $user = Auth::user();
        dd($user);
        
        return view('dashboard.main',[
            'user' => $user
        ]);
    }
}
