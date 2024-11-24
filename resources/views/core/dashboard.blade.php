@extends('core.layouts.index')

@section('core-content')

    {{-- Jumbutron --}}

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
                <div class="relative z-0 h-full w-full border-r-2">
                    <p class="flex items-center justify-center w-full h-full pb-3 font-bold text-4xl">
                        0</p>
                    <p class="absolute bottom-2 right-3 text-base">Earned Today</p>
                </div>
                <div class="relative z-0 h-full w-full border-r-2">
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
                <div
                        class="flex justify-center items-center w-full h-full bg-gray-100 border border-gray-300 rounded-lg">
                    <p class="text-2xl text-gray-500 font-semibold">Anda belum mengambil course</p>
                </div>
            @endforelse
        </div>

    </div>
    </div>
@endsection
