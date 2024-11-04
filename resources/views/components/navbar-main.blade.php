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
        <a id="openModalButton" href="#" class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200">Sign In</a>
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
                <li><a href="{{ route('show-dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a></li>
                <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a></li>
                <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a></li>
                <li><a href="{{ route('handle-logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a></li>
            </ul>
        </div>
    </div>
    @endguest
</nav>


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
