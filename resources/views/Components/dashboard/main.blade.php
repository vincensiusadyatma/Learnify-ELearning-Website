<div class="w-full h-full">
    {{-- sidebar --}}
    @php
        $isClicked = false; // Initial state for demonstration
    @endphp

    <div id="sidebar" class="hidden fixed left-0 w-60 h-svh flex flex-col bg-blue-dark-theme">
        <header class="flex h-20 border-b-2 items-center justify-between px-4">
            <p class="text-2xl text-white">Learnify</p>
            <button id="sidebarButton">
                <img src="https://placehold.co/30x30" alt="">
            </button>
        </header>

        <main class="h-80 mx-8 mt-8">
            {{-- Dashboard items --}}
            <div>
                <p class="text-white">Dashboard</p>
                <ul>
                    <x-sidebar.list-item title="Dashboard"></x-sidebar.list-item>
                </ul>
            </div>
            <div class="border-y-2 py-4 my-4">
                <p class="text-white">Course</p>
                <ul>
                    <x-sidebar.list-item title="Course A"></x-sidebar.list-item>
                    <x-sidebar.list-item title="Course B"></x-sidebar.list-item>
                    <x-sidebar.list-item title="Course C"></x-sidebar.list-item>
                </ul>
            </div>
            <div>
                <p class="text-white">Learning Path</p>
                <ul>
                    <x-sidebar.list-item title="Learning Path"></x-sidebar.list-item>
                </ul>
            </div>
        </main>
    </div>

    {{-- content container --}}
    <div class="ml-60 flex flex-col items-center space-y-[68px]">
        {{-- navbar --}}
        <nav class="flex justify-between px-8 items-center top-0 h-20 z-9 w-full bg-white border">
            <div class="flex space-x-4 items-center">
                <img src="https://placehold.co/30x30" alt="">
                <p>Dashboard</p>
            </div>
            <div>
                <img src="https://placehold.co/40x40" alt="">
            </div>
        </nav>

        {{-- content --}}
        <div class="max-w-[1300px] w-[calc(100%-8rem)] h-[860px] bg-white">
        </div>
    </div>

</div>
