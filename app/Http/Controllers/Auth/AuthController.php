<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\User;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    
    public function handleRegister(Request $request){
        $credentials = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            DB::table('role_ownerships')->insert([
                'user_id' => $user->id,
                'role_id' => 1,
            ]);


            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
