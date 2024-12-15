@props(['quiz'])

<div class="mx-5 my-5 pt-10 max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 text-center">
    <div class="p-5">
        <!-- Icon Quiz -->
        <div class="flex justify-center items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg>
        </div>

        <!-- Title -->
        <a href="{{ route('show-first-question', $quiz->id) }}">
            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">{{$quiz->title}}</h5>
        </a>

        <!-- Subtitle -->
        <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">
            Share your quiz or save it for later to take it anytime.
        </p>

        <!-- Button -->
        <a href="{{ route('show-first-question', $quiz->id) }}"
           class="inline-block px-5 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            Take the Quiz
        </a>
    </div>
</div>
