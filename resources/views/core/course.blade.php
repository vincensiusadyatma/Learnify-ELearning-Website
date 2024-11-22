@extends('core.layouts.index')

@section('core-content')
                <div class="grid grid-cols-3 justify-center space-x-5 space-y-2">
                @foreach ($courses as $dt)
                    @include('core.layouts.card', [
                        'title' => $dt['title'], 
                        'description' => $dt['description'], 
                        'link' => route('list-lesson', ['id' => $dt['id']]),
                        'icons' => $dt['img']
                        ])
                @endforeach
            </div>
@endsection