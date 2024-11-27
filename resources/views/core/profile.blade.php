@extends('core.layouts.index')

@section('core-content')

    <div class="flex w-full h-[780px] gap-9">
        {{-- Photo Section --}}
        <div class="flex flex-col items-center w-[500px] h-[600px] bg-[#EAECF3]">

            {{-- Upper Container --}}
            <div class="flex flex-col items-center w-full h-[320px] gap-2">
                {{-- Photo --}}
                <div class="flex justify-center items-center w-[150px] h-[150px] mt-6">
                    <img src="https://placehold.co/100x100" alt="">
                </div>

                <p class="font-bold">Ferly</p>
                <p class="font-light">Student</p>
            </div>
            <div class="border border-y-gray-300 w-full h-[180px]">

            </div>
            <div class="flex justify-center items-center w-full h-[100px]">
                <button class="flex justify-center items-center gap-2 w-[270px] h-[40px] bg-[#2868E6] rounded-2xl">
                    <img src="https://placehold.co/20x20" alt="">
                    <p class="text-white">Edit</p>
                </button>
            </div>
        </div>

        <div class="flex flex-col w-full h-full gap-4">
            {{-- Personal Info --}}
            <div class="w-full h-full bg-[#EAECF3] font-bold">
                <div class="flex items-center h-[47px] w-full border border-b-gray-300 pl-6">
                    <p>Personal Information</p>
                </div>

                {{-- Personal Info Body --}}
                <div class="w-full h-[calc(100%-47px)] flex mt-4">
                    {{-- Left Div --}}
                    <div class="w-full h-ful p-4 flex flex-col gap-4">
                        {{-- Username --}}
                        <div class="flex flex-col gap-6">
                            <label for="username">Username</label>
                            <input id="username" class="border border-gray-300 w-full h-9 bg-transparent"/>
                        </div>
                        {{-- Password --}}
                        <div class="flex flex-col gap-6">
                            <label for="password">Password</label>
                            <input id="password" class="border border-gray-300 w-full h-9 bg-transparent"/>
                        </div>
                    </div>

                    {{-- Right Div --}}
                    <div class="w-full h-full p-4 flex flex-col gap-4">
                        {{-- Full Name --}}
                        <div class="flex flex-col gap-6">
                            <label for="fullname">Nama Lengkap</label>
                            <input id="fullname" class="border border-gray-300 w-full h-9 bg-transparent"/>
                        </div>
                        {{-- Phone Number --}}
                        <div class="flex flex-col gap-6">
                            <label for="phone">No HP</label>
                            <input id="phone" class="border border-gray-300 w-full h-9 bg-transparent"/>
                        </div>
                    </div>
                </div>
            </div>

            {{-- About Me --}}
            <div class="w-full h-full bg-[#EAECF3] font-bold">
                <div class="flex items-center justify-between h-[47px] w-full border border-b-gray-300 pl-6">
                    <p>About Me</p>

                    {{-- Add Bio--}}
                    <div class="flex items-center mr-3 gap-2">
                        <button class="w-[55px] h-[25px] bg-gray-300 rounded-md">
                            <p class="text-center font font-light text-xs">+Add</p>
                        </button>
                        <img src="https://placehold.co/30x30" alt="">
                    </div>
                </div>

                {{-- Bio body --}}
                <div class="flex w-full h-[calc(100%-47px)] justify-center items-center">
                    <p class="font-normal">No bio yet...</p>
                </div>
            </div>
        </div>
    </div>

@endsection
