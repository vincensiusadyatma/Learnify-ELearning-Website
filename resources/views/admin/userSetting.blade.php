@extends('template.dashboard-admin-template')

@section('content')
<div class="w-full flex flex-col gap-5 md:flex-row text-[#161931] rounded overflow-hidden">
    <aside class="hidden py-4 md:w-1/3 lg:w-1/4 md:block">
        <div class="sticky top-12 flex flex-col gap-2 p-4 text-sm border-r border-indigo-100 rounded-lg"> 
            <h2 class="pl-3 mb-4 text-2xl font-semibold">Settings</h2>
            
            <a href="{{ route('show-user-details', $user->id) }}" 
                class="flex items-center px-3 py-2.5 font-bold border rounded-full
                {{ Route::currentRouteName() === 'show-user-details' ? 'bg-indigo-200 text-indigo-900' : 'bg-white text-indigo-900 hover:bg-indigo-50' }}">
                Profile
            </a>
            
            <a href="{{ route('show-user-setting', $user->id) }}" 
                class="flex items-center px-3 py-2.5 font-semibold border rounded-full
                {{ Route::currentRouteName() === 'show-user-setting' ? 'bg-indigo-200 text-indigo-900' : 'hover:bg-indigo-50 hover:text-indigo-900' }}">
                Account Settings
            </a>
        </div>
    </aside>
    

    <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/4 rounded-lg overflow-hidden"> 
        <div class="p-2 md:p-4">
            <div class="w-full max-w-3xl mx-auto px-6 pb-8 mt-8 sm:rounded-lg overflow-hidden">
                <h2 class="text-2xl font-bold sm:text-xl mb-6">User Settings</h2>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2"> 
                    <div class="flex flex-col space-y-4">
                        <label for="role" class="block text-sm font-medium text-indigo-900">Select User Role</label>
                        <select id="role" name="role" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="moderator" {{ $user->role == 'moderator' ? 'selected' : '' }}>Moderator</option>
                        </select>
                    </div>

                    <div class="flex flex-col space-y-4">
                        <label for="status" class="block text-sm font-medium text-indigo-900">User Status</label>
                        <select id="status" name="status" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="mb-6 mt-8">
                    <label for="email" class="block mb-2 text-sm font-medium text-indigo-900">Email Address</label>
                    <input type="email" id="email" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" value="{{ $user->email }}" disabled>
                </div>

                <div class="flex justify-end space-x-4 mt-6">
                    <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Save Changes
                    </button>

                  
                    <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                            Delete User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
