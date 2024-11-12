@props(['title', 'description', 'link'])

<div class=" my-5 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#"></a>
                <div class="p-4">
                    <div class="justify-center">
                    <div class="p-2">
                        <a class="text-black text-4xl">
                            <h2>{{$title}}</h2>
                        </a>
                    </div>
                    </div>
                    <p class="p-2 mb-3 font-normal text-gray-700 dark:text-gray-400">{{$description}}</p>
                    
                    <div>
                        <a href="{{ $link }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            read more
                        </a>
                    </div>
                </div>
        </div>