@extends('core.layouts.index')

@section('core-content')

<div class="grid grid-cols-3 justify-center space-x-5">
    @foreach ($lesson as $dt)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{route('show-materials', ['filename' => $dt['content']])}}">
                <h3 class="text-black">
                    {{$dt['title']}}
                </h3>
                </a>
            </div>
    @endforeach  
</div>

@endsection