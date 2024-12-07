@extends('core.layouts.index')

@section('core-content')
<div class="h-screen grid grid-cols-12 gap-4 p-4">
    <!-- Sidebar -->
    <div class="col-span-3 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow h-full">
        <ul class="space-y-2">
            @foreach ($questions as $question)
            <li 
                class="p-2 rounded-lg cursor-pointer 
                    {{ $question->id === $question->id ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }} 
                    hover:bg-blue-400 dark:hover:bg-blue-600 transition-colors"
                onclick="window.location.href='#'">
                
                <a href="#" class="block w-full">

                {{ $question->id }}
                </a>
            </li>
            @endforeach
        </ul>
</div>

    <!-- Content Section -->
    <div class="col-span-9 bg-white dark:bg-gray-900 p-6 rounded-lg shadow h-full overflow-auto">
        <div class="mb-6">
            
        <div class="mt-4">
    <p>{{$currentQuestion->title}}</p>
    
    @php
        // Mendecode JSON choices menjadi array
        $choices = json_decode($currentQuestion->choices);
    @endphp

    <form action="{{route('store-answer', [$quiz->id, $currentQuestion->id])}}" method="POST">
        @csrf
        @php
        $choices = json_decode($currentQuestion->choices);
        @endphp

        @foreach($choices as $index => $choice)
            <div class="flex items-center mb-4 mt-5">
            <input 
                id="radio-{{$index}}" 
                type="radio" 
                value="{{$choice}}" 
                name="answer" 
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                {{ $userAnswer && $userAnswer->answer === $choice ? 'checked' : '' }} <!-- Menandai jawaban yang dipilih -->
                <label for="radio-{{$index}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$choice}}</label>

            </div>
        @endforeach

        <div class="mt-6 flex justify-end space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Simpan jawaban</button>
        </div>
    </form>

</div>
        </div>
    </div>
</div>
@endsection

