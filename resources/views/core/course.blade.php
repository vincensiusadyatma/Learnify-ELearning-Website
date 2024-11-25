@extends('core.layouts.index')

@section('core-content')
                <div class="">
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