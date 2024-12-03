

<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
<div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative bg-white sm:px-8 w-[320px] h-[430px] rounded-[10px] shadow-lg">

            {{-- Close Button --}}
            <button id="closeModalButton" class="absolute right-5 top-4 text-gray-600 hover:text-gray-800 text-xl">&times;</button>

            <div class="flex justify-between items-center mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="text-xl uppercase font-bold leading-9 h-[30px] tracking-tight text-gray-900">Login</h2>

                {{-- TODO: Route to Register page--}}
                <a href="{{ route('show-register') }}" class="text-sm text-purple-dark-theme hover:text-indigo-500">Daftar</a>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-4" action="{{ route('handle-login') }}" method="POST">
                    @csrf

                    {{-- Email Input --}}
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900 text-start">Username atau email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="text" required
                                class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 shadow-sm ring-2 ring-inset ring-purple-dark-theme focus:ring-2 focus:ring-inset focus:ring-purple-dark-theme sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    {{-- Password Input --}}
                    <div>
                        <label for="password" class="block text-sm text-start font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-1 relative">
                            <input id="password" name="password" type="password" required
                                   class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 shadow-sm ring-2 ring-inset ring-purple-dark-theme focus:ring-2 focus:ring-inset focus:ring-purple-dark-theme sm:text-sm sm:leading-6">
                            <!-- Eye Icon -->
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 transition duration-200 ease-in-out">
                                <!-- Eye Icon (default) -->
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <!-- Eye Slash Icon (hidden by default) -->
                                <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                        <div class="text-sm text-end mt-4">
                            <a href="#" class="font-normal text-purple-dark-theme hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    
                    {{-- Sign in Button --}}
                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md bg-purple-dark-theme px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Sign in
                        </button>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-gray-300 mt-4"></div>

                    {{-- Google Sign In --}}
                    <div class="text-center mt-4">
                        <a href="{{ route('google-redirect') }}" class="flex items-center justify-center w-full mb-4 hover:scale-110 transform transition duration-200 ease-in-out">
                            <img src="img/assets/icons/google.png" alt="Google" class="w-8 h-8 mr-2">
                            <span class="text-sm font-medium text-gray-900">Login with Google</span>
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Toggle Password Visibility -->
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    const eyeSlashIcon = document.getElementById('eyeSlashIcon');

    togglePassword.addEventListener('click', function (e) {
        // Toggle password visibility
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        // Toggle visibility of the eye and eye-slash icons
        eyeIcon.classList.toggle('hidden');
        eyeSlashIcon.classList.toggle('hidden');
    });
</script>
