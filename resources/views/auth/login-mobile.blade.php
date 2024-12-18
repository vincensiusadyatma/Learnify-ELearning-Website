<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learnify - Login</title>
    @vite('resources/css/app.css')
    @notifyCss
</head>
<body class="bg-indigo-50">

<!-- Container -->
<div class="flex flex-col justify-center items-center min-h-screen px-4">
    <!-- Logo -->
    <div class="mb-6 flex items-center">
        <img src="{{ asset('img/logo/learnify-logo.png') }}" alt="Learnify Logo" class="w-12 h-12">
        <h1 class="text-2xl text-indigo-700 font-semibold ml-2">Learnify</h1>
    </div>

    <!-- Login Card -->
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
        <h2 class="text-center text-2xl font-bold text-indigo-800 mb-6">Login</h2>
        <form method="POST" action="{{ route('handle-login') }}">
            @csrf

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="text" 
                    id="email" 
                    name="email" 
                    placeholder="email@example.com" 
                    required 
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:outline-none"
                >
            </div>

            <!-- Password Field -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password" 
                    required 
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:outline-none"
                >
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full !bg-indigo-500 text-white py-2 rounded-md font-semibold hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                Login
            </button>
        </form>

        <!-- Register Link -->
        <p class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun? 
            <a href="{{ route('show-register') }}" class="text-indigo-500 hover:underline">Daftar di sini</a>
        </p>
    </div>
</div>

<!-- NotifyJS -->
<x-notify::notify />
@notifyJs

</body>
</html>
