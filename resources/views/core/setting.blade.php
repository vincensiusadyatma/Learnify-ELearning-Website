@extends('core.layouts.index')

@section('core-content')
    <div class="flex flex-col w-full h-[900px] bg-white-theme/[0.67]">
        {{-- title --}}
        <div class="flex justify-start  items-center pl-4 w-full py-4">
            <p>Settings</p>
        </div>

        {{-- Navigation --}}
        <div class="flex w-full gap-52 py-6 items-center justify-center">
            <button id="account-btn" class="">
                Account
            </button>
            <button id="pw-btn" class="">
                Password
            </button>
        </div>

        {{-- Account Form --}}
        <div id="account-form" class="flex flex-col w-full px-24">
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
                    <p id="account-save" class="text-white font-bold">Save</p>
                </button>
            </div>
        </div>

        {{-- Password Form--}}
        <div id="pw-form" class="hidden flex-col w-full px-24">
            <div class="flex flex-col h-[150px] gap-7">
                <label for="pw-now-setting" class="text-xl font-bold">Current Password</label>
                <input class="h-10 bg-transparent border border-gray-300" id="pw-now-setting"/>
            </div>
            <div class="flex flex-col h-[150px] gap-7">
                <label for="pw-now-setting" class="text-xl font-bold">New Password</label>
                <input class="h-10 bg-transparent border border-gray-300" id="pw-new-setting"/>
            </div>
            <div class="flex flex-col h-[150px] gap-7">
                <label for="pw-conf-setting" class="text-2xl font-bold">Confirm New Password</label>
                <input class="h-10 bg-transparent border border-gray-300" id="pw-conf-setting"/>
            </div>
            <div class="flex items-center justify-center">
                <button class="flex items-center justify-center w-[250px] h-10 bg-[#5271FF] rounded-md">
                    <p id="account-save" class="text-white font-bold">Save</p>
                </button>
            </div>
        </div>


    </div>

@endsection

@push('additional-scripts')
    <script>
        const accountForm = document.querySelector('#account-form')
        const pwForm = document.querySelector('#pw-form')
        const accountBtn = document.querySelector('#account-btn')
        const pwBtn = document.querySelector('#pw-btn')

        accountBtn.addEventListener('click', () => {
            accountForm.classList.add('flex')
            pwForm.classList.add('hidden')

            accountForm.classList.remove('hidden')
            pwForm.classList.remove('flex')
        })

        pwBtn.addEventListener('click', () => {
            accountForm.classList.add('hidden')
            pwForm.classList.add('flex')

            accountForm.classList.remove('flex')
            pwForm.classList.remove('hidden')
        })
    </script>
@endpush
