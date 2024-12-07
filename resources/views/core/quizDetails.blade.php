@extends('core.layouts.index')

@section('core-content')
<div class="h-screen grid grid-cols-12 gap-4 p-4">
    <button>
        <a href="{{ route('show-question', ['quiz' => $quiz->id, 'question' => $questions->first()->id]) }}">
            Kerjakan
        </a>
    </button>
</div>
@endsection
