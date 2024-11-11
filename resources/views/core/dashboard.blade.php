@extends('template.dashboard-template')

@section('content')
    
<div class="w-full h-full">
    {{-- content container --}}
    <div id="dashboard" class="lg:ml-60 flex flex-col items-center space-y-16">
        {{-- navbar --}}
        <nav class="flex justify-between px-8 items-center top-0 h-20 z-9 w-full bg-white-theme border">

            {{-- Home Button--}}
            <div class="hidden lg:flex space-x-4 items-center">
                <img src="https://placehold.co/30x30" alt="">
                <p>Dashboard</p>
            </div>

            {{-- Toggle Sidebar--}}
            <button id="toggleSidebarBtn" class="flex lg:hidden space-x-4 items-center">
                <img src="https://placehold.co/30x30" alt="">
            </button>

            <div class="relative">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-10 h-10 rounded-full" src="./img/assets/profile1.png" alt="user photo">
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
       
    
        </nav>

        {{-- content --}}
        <div class="max-w-[1300px] w-[calc(100%-8rem)] h-[860px]">

            {{-- Jumbotron --}}
            <div class="flex justify-between w-full h-[300px] rounded-2xl bg-[#5271FF24]">
                <div class="flex flex-col justify-center gap-3 w-[500px] pl-[72px]">
                    <p class="font-bold text-3xl">
                        Hi, 
                        @if(Auth::user()->username)
                            {{ Auth::user()->username }}
                        @else
                            {{ substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@')) }}
                        @endif
                    </p>
                    <p class="font-light text-2xl">Sharpen Your Skills with Professional Online Course</p>
                </div>
                <img src="{{asset('img/assets/boy-study.png')}}" alt="" class="h-[300px]">
            </div>

            {{-- Statistics --}}
            <div class="flex gap-4 w-full h-[200px] mt-[53px]">
                <div class="w-[70%] h-full bg-white-theme/[.67] rounded-2xl">

                </div>

                <div class="flex flex-col w-[30%] h-full bg-white-theme/[.67] rounded-2xl">
                    <p class="pl-8 py-4 font-bold border-b-2">Points</p>
                    <div class="flex w-full h-full">
                        <div class="relative h-full w-full border-r-2">
                            <p class="flex items-center justify-center w-full h-full pb-3 font-bold text-4xl">
                                0</p>
                            <p class="absolute bottom-2 right-3 text-base">Earned Today</p>
                        </div>
                        <div class="relative h-full w-full border-r-2">
                            <p class="flex items-center justify-center w-full h-full pb-3 font-bold text-4xl">
                                0</p>
                            <p class="absolute bottom-2 right-3 text-base">Total</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Course Progress --}}
            <div class="w-full h-full bg-white-theme/[.67]  rounded-2xl mt-4">
                <div class="py-6 pl-4">
                    <p class="text-xl font-bold">Course On Progress</p>
                </div>
                <div class="flex gap-4 px-4 w-full h-[300px]">
                    @forelse($course as $item)
                        @include('core.layouts.mini-card', ['title' => $item])
                    @empty
                        <div class="flex justify-center items-center w-full h-full bg-gray-100 border border-gray-300 rounded-lg">
                            <p class="text-2xl text-gray-500 font-semibold">Anda belum mengambil course</p>
                        </div>
                    @endforelse
                </div>
                
            </div>
        </div>
    </div>

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


@endsection