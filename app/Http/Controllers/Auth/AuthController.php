<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    
    public function showLoginMobile()
    {
        return view('auth.login-mobile');
    }


    public function handleRegister(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.confirmed' => 'Password konfirmasi tidak sesuai.',
        ]);
    
        DB::beginTransaction();
    
        try {
            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => 'active'
            ]);
    
            // Assign default role
            DB::table('role_ownerships')->insert([
                'user_id' => $user->id,
                'role_id' => 2,
            ]);
    
            DB::commit();
            notify()->success('You have successfully registered', 'Success');
            return redirect()->route('main')->with('success', 'Registration successful. You can now log in.');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('Registration Error: ' . $th->getMessage());
            return redirect()->route('show-register')->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }
    
    public function handleLogin(Request $request)
    {
        try {
            $input = $request->input('email'); 
            $password = $request->input('password');
    
            // Tentukan apakah input adalah email atau username
            $fieldType = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
            // Validasi input
            $validated = $request->validate([
                'email' => 'required|string', // Bisa username atau email
                'password' => 'required|string|min:8',
            ]);
    
            // Cek apakah autentikasi berhasil
            if (Auth::attempt([$fieldType => $input, 'password' => $password])) {
                $request->session()->regenerate();
    
                $user = Auth::user();
                $role = $user->roles->pluck('name')->first(); // Ambil role user
    
                notify()->success('You have successfully logged in', 'Success');
    
                // Redirect berdasarkan role
                if ($role === 'admin') {
                    return redirect()->route('show-dashboard-admin');
                } elseif ($role === 'user') {
                    return redirect()->route('show-dashboard');
                }
    
                // Logout jika role tidak valid
                Auth::logout();
                notify()->error('Your account does not have the required access.', 'Access Denied');
                return redirect()->route('main')->with('error', 'Your account does not have the required access.');
            }
    
            // Jika login gagal
            notify()->error('Invalid credentials. Please check your email/username and password.', 'Login Failed');
            return redirect()->route('main')->with('error', 'Login failed. Please try again.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, tangkap error validasi
            notify()->error('Validation error: ' . $e->getMessage(), 'Validation Failed');
            return redirect()->back()->withErrors($e->errors());
        } catch (\Exception $e) {
            // Tangani error tak terduga lainnya
            notify()->error('Something went wrong. Please try again later.', 'Error');
            return redirect()->route('main')->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    
    

    

    public function handleLogOut(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
       
        notify()->success('You have successfully logged out.');
        return redirect()->route('main')->with('success', 'Anda telah berhasil logout.');
    }


    public function googleRedirect(){
        return Socialite::driver('google')->redirect();
    }


    public function googleCallback(){
        // Mendapatkan data pengguna dari Google melalui Socialite
        $googleUser = Socialite::driver('google')->user();

        
        $user = User::updateOrCreate(
            [
                'google_id' => $googleUser->getId()
            ],
            [
                'username' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]
        );

       
        $roleExists = DB::table('role_ownerships')
            ->where('user_id', $user->id)
            ->where('role_id', 2) 
            ->exists();

    
        if (!$roleExists) {
            DB::table('role_ownerships')->insert([
                'user_id' => $user->id,
                'role_id' => 2,
            ]);
        }

       
        Auth::login($user);

        // Redirect ke halaman dashboard dengan notifikasi sukses
        notify()->success('You have successfully logged in');
        return redirect('/dashboard');
    }


}
