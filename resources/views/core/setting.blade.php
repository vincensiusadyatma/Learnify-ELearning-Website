@extends('core.layouts.index')

@section('core-content')
    <div class="flex flex-col w-full h-[900px]">
        {{-- title --}}
        <div class="flex justify-start bg-[#EAECF3] items-center pl-4 w-full py-4">
            <p>Settings</p>
        </div>

        {{-- Navigation --}}
        <div class="flex w-full gap-52 py-6 items-center justify-center border border-blue-500">
            <a class="">
                Account
            </a>
            <a class="">
                Password
            </a>
        </div>

        {{-- Account Form --}}
        <div>
            <div>
                <label for="username-setting">Username</label>
                <form action="" id="username-setting"></form>
            </div>
            <div>
                <label for="username-setting">Username</label>
                <form action="" id="username-setting"></form>
            </div>
            <div>
                <label for="username-setting">Username</label>
                <form action="" id="username-setting"></form>
            </div>
            <div>
                <label for="username-setting">Username</label>
                <form action="" id="username-setting"></form>
            </div>
            <div class="w-full h-full flex items-center justify-center">
                <button class="flex items-center justify-center w-[250px] h-10 bg-green-500">
                    <p>Save</p>
                </button>
            </div>
        </div>
    </div>
@endsection
