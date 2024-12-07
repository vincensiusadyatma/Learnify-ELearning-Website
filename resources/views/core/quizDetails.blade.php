@extends('core.layouts.index')

@section('core-content')
<div class="h-screen grid grid-cols-12 gap-4 p-4">
    <button> <a href="{{route('show-question', ['quiz' => $quiz, 'question' => $questions])}}">Kerjakan</a></button>
</div>
@endsection

