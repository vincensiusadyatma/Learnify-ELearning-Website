@extends('template.dashboard-template')

@section('content')
<div class="w-full h-full">
        {{-- content container --}}
        <div id="dashboard" class="lg:ml-60 flex flex-col items-center space-y-16">
            {{-- navbar --}}
            <nav class="flex justify-between px-8 items-center top-0 h-20 z-9 w-full bg-white-theme border">

                {{-- Home Button--}}
                <div class="hidden lg:flex space-x-4 items-center">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                         stroke="#4a4a4a">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M9 16.9999H15M3 14.5999V12.1301C3 10.9814 3 10.407 3.14805 9.87807C3.2792 9.40953 3.49473 8.96886 3.78405 8.57768C4.11067 8.13608 4.56404 7.78346 5.47078 7.07822L8.07078 5.056C9.47608 3.96298 10.1787 3.41648 10.9546 3.2064C11.6392 3.02104 12.3608 3.02104 13.0454 3.2064C13.8213 3.41648 14.5239 3.96299 15.9292 5.056L18.5292 7.07822C19.436 7.78346 19.8893 8.13608 20.2159 8.57768C20.5053 8.96886 20.7208 9.40953 20.8519 9.87807C21 10.407 21 10.9814 21 12.1301V14.5999C21 16.8401 21 17.9603 20.564 18.8159C20.1805 19.5685 19.5686 20.1805 18.816 20.564C17.9603 20.9999 16.8402 20.9999 14.6 20.9999H9.4C7.15979 20.9999 6.03969 20.9999 5.18404 20.564C4.43139 20.1805 3.81947 19.5685 3.43597 18.8159C3 17.9603 3 16.8401 3 14.5999Z"
                                stroke="#222265" stroke-width="1.44" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <p>Course</p>
                </div>

                {{-- Toggle Sidebar--}}
                <button id="toggleSidebarBtn" class="flex lg:hidden space-x-4 items-center">
                    <img src="https://placehold.co/30x30" alt="">
                </button>

                <div class="relative">
                    <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button" aria-expanded="false">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 h-10 rounded-full" src="./img/assets/profile1.png" alt="user photo">
                    </button>

                    <!-- Dropdown menu -->
                    <div id="user-dropdown"
                         class="absolute right-0 z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3">
                            <span
                                class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->username ?? 'User' }}</span>
                            <span
                                class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email ?? 'User' }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li><a href="{{ route('show-dashboard') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li><a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>
                            <li><a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                            </li>
                            <li><a href="{{ route('handle-logout') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- content --}}
            <div class="max-w-[1300px] w-[calc(100%-8rem)] h-[860px]">                
                <div class="grid grid-cols-3 justify-center space-x-5 space-y-2">
                @foreach ($courses as $dt)
                    @include('core.layouts.card', [
                        'title' => $dt['title'], 
                        'description' => $dt['description'], 
                        'link' => route('list-lesson', ['id' => $dt['id']]),
                        'icons' => $dt['img']
                        ])
                @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection