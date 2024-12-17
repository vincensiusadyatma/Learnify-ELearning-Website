@extends('core.layouts.index')

@section('core-content')
<div class="flex flex-wrap gap-6 w-full h-auto p-6">
    {{-- Photo Section --}}
    <div class="flex flex-col items-center w-full lg:w-1/3 bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        {{-- Upper Container --}}
        <div class="w-full h-[200px] bg-blue-600 flex justify-center items-center">
            <img id="photo-preview" 
                src="{{ $user->photo_path ? asset('storage/users/photo-profile/' . $user->photo_path) : asset('img/assets/profile1.png') }}" 
                alt="User Photo" 
                class="w-[120px] h-[120px] rounded-full border-4 border-white shadow-md object-cover">
        </div>

        {{-- User Info --}}
        <div class="flex flex-col items-center p-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white">{{ $user->username }}</h2>
            <p class="text-sm text-gray-500 dark:text-gray-300">{{ $user->email }}</p>
        </div>

        {{-- Edit Photo Form --}}
        <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data" class="w-full px-6 py-4">
            @csrf
            <label for="photo" class="w-full flex justify-center items-center cursor-pointer bg-blue-600 text-white py-2 font-medium rounded-lg hover:bg-blue-700 transition-all">
                <i class="bx bx-edit text-lg mr-2"></i> Change Photo
                <input type="file" id="photo" name="photo" accept="image/*" class="hidden" onchange="previewPhoto(event)">
            </label>

            {{-- Save Button --}}
            <button type="submit" class="w-full mt-4 py-2 !bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-all">
                Save Photo
            </button>
        </form>
    </div>

    {{-- Info Section --}}
    <div class="flex flex-col w-full lg:w-2/3 gap-6">
        {{-- Personal Info --}}
        <form method="POST" action="{{ route('update-profile') }}" class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            @csrf
            <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-4">Personal Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="username" class="text-sm text-gray-600 dark:text-gray-400">Username</label>
                    <input id="username" name="username" value="{{ old('username', $user->username) }}" class="w-full mt-1 border rounded-lg p-2 focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
                </div>
                <div>
                    <label for="email" class="text-sm text-gray-600 dark:text-gray-400">Email</label>
                    <input id="email" name="email" value="{{ old('email', $user->email) }}" type="email" class="w-full mt-1 border rounded-lg p-2 focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
                </div>
                <div>
                    <label for="address" class="text-sm text-gray-600 dark:text-gray-400">Address</label>
                    <input id="address" name="address" value="{{ old('address', $user->address) }}" class="w-full mt-1 border rounded-lg p-2 focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </div>
                <div>
                    <label for="phone_number" class="text-sm text-gray-600 dark:text-gray-400">Phone Number</label>
                    <input id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" class="w-full mt-1 border rounded-lg p-2 focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </div>
            </div>

            {{-- Save Changes Button --}}
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-6 py-2 !bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-all">
                    Save Changes
                </button>
            </div>
        </form>

        {{-- Courses Section --}}
        <div class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-4">My Courses</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($courseProgress as $progress)
                    <div class="flex flex-col items-center bg-gray-100 dark:bg-gray-700 rounded-lg shadow p-4">
                        {{-- Icon/Image --}}
                        <div class="w-full text-center py-3 flex justify-center">
                            @php
                                $defaultPath = "img/assets/course/{$progress->course_icon}";
                                $storagePath = "storage/{$progress->course_icon}";
                                $imagePath = file_exists(public_path($defaultPath)) ? asset($defaultPath) : (file_exists(public_path($storagePath)) ? asset($storagePath) : asset('img/default-course.png'));
                            @endphp
                            <img class="rounded-t-lg w-12 h-12" src="{{ $imagePath }}" alt="Course Icon" />
                        </div>
                        
                        <h4 class="text-md font-semibold text-gray-800 dark:text-white mt-2">{{ $progress->course_title }}</h4>
                        {{-- Progress Bar --}}
                        <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full mt-4">
                            <div class="bg-blue-600 h-3 rounded-full" style="width: {{ $progress->progress_percentage }}%;"></div>
                        </div>
                        <p class="text-sm mt-2 text-gray-600 dark:text-gray-300">{{ $progress->progress_percentage }}% completed</p>
                        @if($progress->is_completed)
                            <p class="text-xs mt-1 text-green-500 font-medium">Completed!</p>
                        @endif
                        <p class="text-xs mt-1 text-gray-500">Last accessed: {{ \Carbon\Carbon::parse($progress->last_accessed_at)->format('d M Y') }}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-600 dark:text-gray-300 col-span-2">No courses enrolled yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- SweetAlert2 --}}
@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
            });
        });
    </script>
@endif

<script>
    // Preview Photo Before Upload
    function previewPhoto(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('photo-preview');
            preview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
