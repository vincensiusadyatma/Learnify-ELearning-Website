<?php
namespace App\Http\Controllers\Core;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showUserManagement(){
        $user = User::where('id', '!=', Auth::id())->get();
        return view('admin.userManagement',[
            'users' => $user
        ]);
    }

    public function showUserDetails(User $user){
    
        return view('admin.userDetails',[
            'user' => $user
        ]);
    }

    
    public function showUserSetting(User $user){
        $roles = $user->roles()->pluck('name');  
    
        return view('admin.userSetting', [
            'user' => $user,
            'roles' => $roles  
        ]);
    }



    public function updateUserSetting(Request $request, User $user){

        $request->validate([
            'role' => 'required|in:user,admin,teacher',  
            'status' => 'required|in:active,inactive',
        ]);
    
       
        $user->status = $request->input('status');

        // save data ke database 
        $user->save();
    
        $roleName = $request->input('role');
        $role = DB::table('roles')->where('name', $roleName)->first();
    
       
        if ($role) {
            $user->roles()->sync([$role->id]); 
        }
    
        // Redirect kembali dengan pesan sukses
        return redirect()->route('show-user-setting', $user->id)->with('success', 'User details updated successfully!');
    }




    public function updateUser(Request $request, $id){
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
        ]);
    
        $user = User::findOrFail($id);
    
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->phone_number = $validatedData['phone_number'];
        $user->address = $validatedData['address'];
     
        if ($request->hasFile('photo')) {
           
            if ($user->photo_path && Storage::exists('public/users/photo-profile/' . $user->photo_path)) {
                Storage::delete('public/users/photo-profile/' . $user->photo_path);
            }
    
          
            $photo = $request->file('photo');
            $photoPath = $photo->store('users/photo-profile', 'public');
            $user->photo_path = basename($photoPath); 
        }
    
       
        $user->save();
    
        return redirect()->route('show-user-details', $user->id)->with('success', 'Profile updated successfully.');
    }




    public function deleteUser(User $user){
        try {
        
            $user->delete();
            return redirect()->route('show-users-management', $user->id)
                        ->with('success', 'User has been deleted successfully.');
        
        } catch (\Exception $e) {
        
            return redirect()->back()->with('error', 'Failed to delete user.');
        }
    }


    
}
