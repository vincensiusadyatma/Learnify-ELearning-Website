@extends('template.dashboard-template')

@section('content')
    
<div class="w-full h-full">

    @include('core.layouts.sidebar')

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

            {{-- User Profile --}}
            <button id="profile-btn">
                <img src="https://placehold.co/40x40" alt="">
            </button>

            <div id="profile-container"
            class="hidden fixed top-24 right-6 w-[400px] h-[300px] bg-white-theme rounded-xl shadow-2xl">
           <div class="flex pl-4 h-[80px] border-b-2">
               <button>
                   <img src="https://placehold.co/50x50" alt="">
               </button>
           </div>
           <div class="flex flex-col gap-4 mt-4">
               <div class="flex pl-4 items-center gap-4">
                   <button>
                       <img src="https://placehold.co/50x50" alt="">
                   </button>
                   <p>Profile</p>
               </div>
               <div class="flex pl-4 items-center gap-4">
                   <button>
                       <img src="https://placehold.co/50x50" alt="">
                   </button>
                   <p>Settings</p>
               </div>
           </div>
       </div>
       
       <script>
           const userProfileBtn = document.querySelector('#profile-btn')
           const profileContaienr = document.querySelector('#profile-container')
       
           userProfileBtn
               .addEventListener('click', () => {
                   profileContaienr.classList.toggle('hidden')
               })
       </script>
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
                    <div class="h-[300px] w-full bg-white"></div>
                    <div class="h-[300px] w-full bg-white"></div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('additional-scripts')
    <script>
        const toggleSidebar = document.getElementById('toggleSidebarBtn')
        const toggleSidebarItem = document.getElementById('toggleSidebarItemBtn')
        const sidebarContainer = document.getElementById('sidebarContainer')
        const contentContainer = document.getElementById('dashboard')
        const sidebarItem = document.querySelectorAll('#sidebar-item')
        const sidebarItemTitles = document.querySelectorAll('#sidebar-item-title')
        const sidebarContentContainer = document.querySelectorAll('.sidebar-content-container p')
        const sidebarHeader = document.querySelector('#sidebarHeader')

        toggleSidebarItem
            .addEventListener('click', () => {
                sidebarItemTitles.forEach(title => {
                    title.classList.toggle('hidden')
                })

                sidebarItem.forEach(icon => {
                    icon.classList.toggle('justify-end');
                    icon.classList.toggle('px-1.5');
                })

                sidebarContentContainer.forEach(p => {
                    p.classList.toggle('hidden')
                })
            })

        toggleSidebarItem
            .addEventListener('click', () => {
                if (sidebarContainer.hasAttribute('active')) {
                    sidebarContainer.classList.remove('lg:-translate-x-40', 'translate-x-0')
                    sidebarContainer.classList.add('lg:translate-x-0', '-translate-x-60')
                    contentContainer.classList.add('lg:ml-60')
                    contentContainer.classList.remove('lg:ml-20')
                    sidebarContainer.removeAttribute('active')
                } else {
                    sidebarContainer.setAttribute('active', 'true')
                    sidebarContainer.classList.remove('lg:translate-x-0')
                    sidebarContainer.classList.add('lg:-translate-x-40')
                    contentContainer.classList.remove('lg:ml-60')
                    contentContainer.classList.add('lg:ml-20')
                }
            })

        toggleSidebar.addEventListener('click', () => {
            if (!sidebarContainer.hasAttribute('active')) {
                sidebarContainer.setAttribute('active', 'true')
                sidebarContainer.classList.remove('-translate-x-60')
                sidebarContainer.classList.add('translate-x-0')
            }
        })
    </script>
@endpush

@endsection