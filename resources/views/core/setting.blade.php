@extends('core.layouts.index')

@section('core-content')
    <div class="flex flex-col w-full h-[900px] bg-white-theme/[0.67]">
        {{-- title --}}
        <div class="flex justify-start  items-center pl-4 w-full py-4">
            <p>Settings</p>
        </div>

        {{-- Navigation --}}
        <div class="flex w-full gap-52 py-6 items-center justify-center">
            <a class="">
                Account
            </a>
            <a class="">
                Password
            </a>
        </div>

        {{-- Account Form --}}
        <div class="flex flex-col h-full w-full px-24">
            <div class="flex flex-col h-[150px] gap-7">
                <label for="username-setting" class="text-xl font-bold">Username</label>
                <input class="h-10 bg-transparent border border-gray-300" id="username-setting"/>
            </div>
            <div class="flex flex-col h-[150px] gap-7">
                <label for="email-setting" class="text-xl font-bold">Email</label>
                <input class="h-10 bg-transparent border border-gray-300" id="email-setting"/>
            </div>
            <div class="flex flex-col h-[150px] gap-7">
                <label for="fullname-setting" class="text-2xl font-bold">Nama Lengkap</label>
                <input class="h-10 bg-transparent border border-gray-300" id="fullname-setting"/>
            </div>
            <div class="flex flex-col h-[150px] gap-7">
                <label for="phone-setting" class="text-2xl font-bold">No HP</label>
                <input class="h-10 bg-transparent border border-gray-300" id="phone-setting"/>
            </div>
            <div class="flex items-center justify-center">
                <button class="flex items-center justify-center w-[250px] h-10 bg-[#5271FF] rounded-md">
                    <p class="text-white font-bold">Save</p>
                </button>
            </div>
        </div>
    </div>
@endsection
