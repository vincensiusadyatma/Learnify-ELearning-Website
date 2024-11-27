{{-- @extends('core.layouts.index')

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

@endsection --}}

{{-- @extends('core.layouts.index')

@section('core-content')

<div class="grid grid-cols-12 gap-4 p-4">
    <!-- Sidebar -->
    <div class="col-span-3 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-4 text-gray-700 dark:text-white">Java Course</h2>
        <ul class="space-y-2">
            @foreach ($lessons as $index => $lesson)
                <li class="{{ $index === 0 ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }} dark:text-gray-300 p-2 rounded-lg hover:bg-blue-400 dark:hover:bg-blue-600">
                    <a href="{{ route('lesson', $lesson['id']) }}">{{ $lesson['title'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Content Section -->
    <div class="col-span-9 bg-white dark:bg-gray-900 p-6 rounded-lg shadow">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Introduction to Java</h2>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
                Ever wondered why Java's logo is a steaming cup of coffee? The creators of Java, while brainstorming a name for their new language, chose ‘Java’, a slang term for ‘coffee’. Just as coffee fuels our day, Java powers the tech world with its robust and versatile features. In this topic, we will explore why Java has been a popular choice among developers for over two decades and how it has brewed success in various domains. We will also introduce you to your very first Java program. So, grab your cup of coffee and join us on this exciting journey into the world of Java!
            </p>
        </div>
        <div class="flex justify-between">
            <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200">
                << Back
            </button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Next >>
            </button>
        </div>
    </div>
</div>

@endsection --}}

{{-- @extends('core.layouts.index')

@section('core-content')

<div class="h-screen grid grid-cols-12  p-4">
    <!-- Sidebar -->
    <div class="col-span-3 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow h-full">
        <h2 class="text-lg font-semibold mb-4 text-gray-700 dark:text-white">Java Course</h2>
        <ul class="space-y-2">
            <li class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-400 dark:hover:bg-blue-600">
                <a href="#">Introduction to Java</a>
            </li>
            <li class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                <a href="#">Lesson 2</a>
            </li>
            <li class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                <a href="#">Lesson 3</a>
            </li>
            <li class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                <a href="#">Quiz</a>
            </li>
        </ul>
    </div>

    <!-- Content Section -->
    <div class="col-span-9 bg-white dark:bg-gray-900 p-6 rounded-lg shadow h-full overflow-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Introduction to Java</h2>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
                Ever wondered why Java's logo is a steaming cup of coffee? The creators of Java, while brainstorming a name for their new language, chose ‘Java’, a slang term for ‘coffee’. Just as coffee fuels our day, Java powers the tech world with its robust and versatile features. In this topic, we will explore why Java has been a popular choice among developers for over two decades and how it has brewed success in various domains. We will also introduce you to your very first Java program. So, grab your cup of coffee and join us on this exciting journey into the world of Java!
            </p>
        </div>
        <div class="flex justify-between">
            <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200">
                << Back
            </button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Next >>
            </button>
        </div>
    </div>
</div>

@endsection --}}

@extends('core.layouts.index')

@section('core-content')

<div class="h-screen grid grid-cols-12 gap-4 p-4">
    <!-- Sidebar -->
    <div class="col-span-3 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow h-full">
        <h2 class="text-lg font-semibold mb-4 text-gray-700 dark:text-white">{{ $course->title }}</h2>
        <ul class="space-y-2">
            {{-- @foreach ($lessons as $lesson)
                <li class="{{ $loop->first ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }} p-2 rounded-lg hover:bg-blue-400 dark:hover:bg-blue-600">
                    <a href="{{ route('show-materials', ['filename' => $lesson->content]) }}">
                        {{ $lesson->title }}
                    </a>
                </li>
            @endforeach --}}
        </ul>
    </div>

    <!-- Content Section -->
    <div class="col-span-9 bg-white dark:bg-gray-900 p-6 rounded-lg shadow h-full overflow-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Introduction to {{ $course->title }}</h2>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
                {{ $course->description }}
            </p>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('continue-lesson', ['course' => $course->uuid]) }}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Continue Lesson
                </button>
            </a>
        </div>
    </div>
</div>

@endsection

