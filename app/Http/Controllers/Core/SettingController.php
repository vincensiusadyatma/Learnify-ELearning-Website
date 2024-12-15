<?php

namespace App\Http\Controllers\Core;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function showSetting(){
        return view('core.setting');
    }

    public function showProfile(){

    $user = Auth::user();

    // Query untuk mengambil progress 
    $courseProgress = DB::table('course_progress')
        ->join('courses', 'course_progress.course_id', '=', 'courses.id')
        ->where('course_progress.user_id', $user->id)
        ->select(
            'courses.title as course_title',
            'courses.description as course_description',
            'courses.img as course_icon',
            'course_progress.progress_percentage',
            'course_progress.is_completed',
            'course_progress.last_accessed_at'
        )
        ->get();

        return view('core.profile', compact('user', 'courseProgress'));
    }


    public function updateProfile(Request $request){
        // Ambil user yang sedang login
    
        $user = User::where('id', Auth::id())->first();
        // Validasi data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
        ]);

        // Update data user
        $user->update([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
        ]);

        // Redirect ke halaman profile dengan pesan sukses
        return redirect()->route('show-profile')->with('success', 'Profile updated successfully!');
    }

}
