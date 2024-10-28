<nav id="navbar" class="px-4 py-4 flex justify-between items-center bg-transparent top-0 left-0 fixed w-full z-30">
    <div class="flex items-center space-x-4">
        <a class="text-3xl font-bold leading-none" href="#">
            {{-- <img src="{{ asset('') }}" alt="" class="w-[30px] lg:mr-4"> --}}
        </a>
        <h1 class="text-xl font-bold text-white">Learnify</h1>
    </div>
    <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-white shadow-2xl p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto  lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#">Home</a></li>
        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
        </li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#tentang">Tentang
                Kami</a></li>
        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
        </li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl"
               href="#manfaat">Manfaat</a></li>
        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
        </li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#fitur">Alur
                Belajar</a></li>
        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
        </li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#faq">FAQ</a>
        </li>
    </ul>
    @guest
        <div class="absolute">
            @include('auth.login')
        </div>
        <a href=""
           class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200">Sign
            In</a>
        <a href=""
           class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200">Sign
            Up</a>
    @else
        <img src="img/assets/profile.png" id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
             data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" alt="User dropdown">

        <!-- Dropdown menu -->
        <div id="userDropdown"
             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <div>{{ auth()->user()->username ?? 'User' }}</div>
                <div class="font-medium truncate">{{ auth()->user()->email ?? 'User' }}</div>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                <li>
                    <a href="{{ route('show-dashboard') }}"
                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    <a href="/admin/dashboard"
                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Admin
                        Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                </li>
            </ul>
            <div class="py-1">
                <a href="{{ route('handle_logout') }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                    out</a>
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
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                       href="#">Home</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                       href="#tentang">Tentang Kami</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                       href="#manfaat">Manfaat</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                       href="#fitur">Fitur</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                       href="#faq">FAQ</a>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <div class="pt-6">
                @guest
                    <a href=""
                       class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold bg-gray-50 hover:bg-gray-100 rounded-xl shadow-sm">Sign
                        in</a>
                    <a href=""
                       class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-xl shadow-sm">Sign
                        Up</a>
                @else
                    {{-- <a href="{{ route('show-dashboard')}}" class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-xl shadow-sm">Dashboard</a> --}}
                @endguest
            </div>
            <p class="my-4 text-xs text-center text-gray-400">
                <span class="text-sm text-gray-500 sm:text-center">© 2024 <a href="#"
                                                                             class="hover:underline">Learnify</a>. All Rights Reserved.</span>
            </p>
        </div>
    </nav>
</div>
</nav>
