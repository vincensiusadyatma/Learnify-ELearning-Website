<?php

namespace App\Http\Controllers\Core;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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


  public function updateProfile(Request $request)
{
    // dd($request->all());
    // Ambil user yang sedang login
    $user = User::where('id', Auth::id())->first();

    // Validasi data
    $validatedData = $request->validate([
        'username' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'address' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:15',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi foto
    ]);

    // Update data user
    $user->username = $validatedData['username'] ?? $user->username;
    $user->email = $validatedData['email'] ?? $user->email;
    $user->address = $validatedData['address'] ?? $user->address;
    $user->phone_number = $validatedData['phone_number'] ?? $user->phone_number;


    try {
        // Update foto jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo_path && Storage::exists('public/users/photo-profile/' . $user->photo_path)) {
                Storage::delete('public/users/photo-profile/' . $user->photo_path);
            }

            // Simpan foto baru
            $photo = $request->file('photo');
            $photoPath = $photo->store('users/photo-profile', 'public'); // Simpan ke storage/public/users/photo-profile
            $user->photo_path = basename($photoPath); // Simpan nama file ke database
        }

        // Simpan perubahan user
        $user->save();

        // Redirect dengan notifikasi sukses
        return redirect()->route('show-profile')->with('success', 'Profile updated successfully!');
    } catch (\Exception $e) {
        // Tangkap error dan kirimkan pesan gagal
        return redirect()->route('show-profile')->with('error', 'Failed to save the profile picture: ' . $e->getMessage());
    }
}

}
