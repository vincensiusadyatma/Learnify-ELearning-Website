@extends('core.layouts.index')

@section('core-content')

    <div class="flex w-full h-[780px] gap-9">
        {{-- Photo Section --}}
        <div class="flex flex-col items-center w-[500px] h-[600px] bg-[#EAECF3]">

            {{-- Upper Container --}}
            <div class="flex flex-col items-center w-full h-[320px] gap-4">
                {{-- Photo --}}
                <div class="flex justify-center items-center w-[150px] h-[150px] border border-gray-300 mt-6">
                    <img src="https://placehold.co/100x100" alt="">
                </div>

                <p>Ferly</p>
                <p>Student</p>
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
            <div class="w-full h-full bg-[#EAECF3]">

            </div>

            {{-- About Me --}}
            <div class="w-full h-full bg-[#EAECF3]">

            </div>
        </div>
    </div>

@endsection
