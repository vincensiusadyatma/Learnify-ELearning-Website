@props(['quiz'])

<div class="mx-5 my-5 pt-10 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="p-5">
        <a href="{{ route('show-first-question',  $quiz->id) }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$quiz->title}}</h5>
        </a>
    </div>
</div>

