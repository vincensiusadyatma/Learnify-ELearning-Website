@extends('template.dashboard-template')

@section('content')
    <div class="w-full h-full">
        @include('core.layouts.sidebar')
        {{-- content container --}}
        <div id="dashboard" class="lg:ml-60 flex flex-col items-center space-y-16">
            @include('core.layouts.navbar')
            <div class="max-w-[1300px] w-full lg:w-[calc(100%-6rem)] h-auto lg:h-[860px] px-4 lg:px-0">
                @yield('core-content')
            </div>
        </div>
    </div>
@endsection
