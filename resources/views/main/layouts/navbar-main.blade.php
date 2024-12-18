<nav id="navbar" class="px-4 py-4 flex justify-between items-center bg-transparent top-0 left-0 fixed w-full z-30">
    <div class="flex items-center space-x-4">
        <a class="text-3xl font-bold leading-none" href="#">
            <img src="{{ asset('img/logo/learnify-logo.png') }}" alt="Learnify Logo" class="w-[30px] lg:mr-4">
        </a>
        <h1 class="text-xl font-bold text-white">Learnify</h1>
    </div>
    <div class="lg:hidden">
        <button id="navbarToggle" aria-expanded="false" class="navbar-burger flex items-center text-white shadow-2xl p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#">Home</a></li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#tentang">Tentang Kami</a></li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#manfaat">Manfaat</a></li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#fitur">Alur Belajar</a></li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#faq">FAQ</a></li>
    </ul>
    @guest
    <button id="openModalButton" class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200">
        Sign In
    </button>
    
        <a href="{{ route('show-register') }}" class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200">Sign Up</a>
    @else
    <div class="relative">
        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="./img/assets/profile1.png" alt="user photo">
        </button>
        
        <!-- Dropdown menu -->
        <div id="user-dropdown" class="absolute right-0 z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->username ?? 'User' }}</span>
                <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email ?? 'User' }}</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
                @if(auth()->user()->roles->contains('name', 'user'))
                <!-- Tautan ke Dashboard Admin -->
                <li><a href="{{ route('show-dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a></li>
                @endif
                @if(auth()->user()->roles->contains('name', 'admin'))
                    <!-- Tautan ke Dashboard User -->
                    <li><a href="{{ route('show-dashboard-admin') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard Admin</a></li>
                @endif
                <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a></li>
                <li><a href="{{ route('handle-logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a></li>
            </ul>
        </div>
    </div>
    @endguest
</nav>

<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-l overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-4" href="#">
                <img src="{{ asset('img/logo/learnify-logo.png') }}" alt="Learnify Logo" class="w-[30px] lg:mr-4">
            </a>
            <h1 class="text-xl font-bold text-black">Learnify</h1>
            <button class="navbar-close ml-auto">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Home</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#tentang">Tentang Kami</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#manfaat">Manfaat</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#fitur">Fitur</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#faq">FAQ</a>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <div class="pt-6">
                @guest
                <a  href="{{ route('show-login-mobile') }}" class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold bg-gray-50 hover:bg-gray-100 rounded-xl shadow-sm">Sign in</a>
                <a href="{{ route('show-register') }}" class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-xl shadow-sm">Sign Up</a>
                @else
                {{-- <a href="{{ route('show-dashboard')}}" class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-xl shadow-sm">Dashboard</a> --}}
                @endguest
            </div>
            <p class="my-4 text-xs text-center text-gray-400">
                <span class="text-sm text-gray-500 sm:text-center">© 2024 <a href="#" class="hover:underline">Learnify</a>. All Rights Reserved.</span>
            </p>
        </div>
    </nav>
</div>



@push('additional-scripts')
    <script>
        const button = document.getElementById('user-menu-button');
        const dropdown = document.getElementById('user-dropdown');

        button.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
        });
        window.addEventListener('click', (event) => {
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
@endpush
