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
                <h2 class="text-2xl font-bold sm:text-xl">Public Profile</h2>

                <form action="{{ route('handle-update-user', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid max-w-2xl mx-auto mt-8">
                        <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">
                            @if($user->photo_path)
                                <img src="{{ asset('storage/users/photo-profile/' . $user->photo_path) }}" id="profileImage" class="object-cover w-36 h-36 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500r" alt="User dropdown">
                            @else
                                <img src="{{ asset('img/assets/profile1.png') }}" id="profileImage" class="object-cover w-36 h-36 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500r" alt="User dropdown">
                            @endif
                        
                            <div class="flex flex-col space-y-5 sm:ml-8">
                                <!-- Tombol Change Picture -->
                                <button type="button" id="changePictureButton" class="py-3.5 px-7 text-base font-medium text-indigo-100 focus:outline-none bg-[#202142] rounded-lg border border-indigo-200 hover:bg-indigo-900 focus:z-10 focus:ring-4 focus:ring-indigo-200">
                                    Change picture
                                </button>
                        
                                <!-- Input File (Hidden) -->
                                <input type="file" name="photo" id="fileInput" class="hidden" accept="image/*">
                        
                                <!-- Tombol Delete Picture -->
                                <button type="button" class="py-3.5 px-7 text-base font-medium text-indigo-900 focus:outline-none bg-white rounded-lg border border-indigo-200 hover:bg-indigo-100 hover:text-[#202142] focus:z-10 focus:ring-4 focus:ring-indigo-200">
                                    Delete picture
                                </button>
                            </div>
                        </div>

                        <div class="items-center mt-8 sm:mt-14 text-[#202142]">
                            <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                <div class="w-full">
                                    <label for="username" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your first name</label>
                                    <input type="text" name="username" id="username" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Your first name" value="{{ old('username', $user->username) }}" required>
                                </div>

                                <div class="w-full">
                                    <label for="phone_number" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Your phone number" value="{{ old('phone_number', $user->phone_number) }}" required>
                                </div>
                            </div>

                            <div class="mb-2 sm:mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your email</label>
                                <input type="email" name="email" id="email" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="your.email@mail.com" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="mb-6">
                                <label for="address" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Address</label>
                                <textarea name="address" id="address" rows="4" class="block p-2.5 w-full text-sm text-indigo-900 bg-indigo-50 rounded-lg border border-indigo-300 focus:ring-indigo-500 focus:border-indigo-500" placeholder="">{{ old('address', $user->address) }}</textarea>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<script>
    // Ketika tombol Change Picture diklik, maka akan buka dialog pemilihan file
    document.getElementById('changePictureButton').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });

    // Ketika file dipilih, maka nampilin gambar baru di elemen <img> :v
    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Ganti gambar profil dengan gambar yang dipilih
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
