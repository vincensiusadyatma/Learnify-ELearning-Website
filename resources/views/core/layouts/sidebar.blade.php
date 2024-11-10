<div id="sidebarContainer"
     class="fixed left-0 w-60 h-svh flex flex-col bg-blue-dark-theme -translate-x-60 lg:translate-x-0">
    <header id="sidebarHeader" class="flex h-20 border-b-2 mb-4 items-center justify-between px-4">
        <p class="text-2xl text-white">Learnify</p>
        <button id="toggleSidebarItemBtn" class="mr-2.5">
            <img src="https://placehold.co/30x30" alt="">
        </button>
    </header>

    <main class="h-80">
        <div class="sidebar-content-container mx-8">
            <p class="text-white">Dashboard</p>
            <ul>
                @include('core.layouts.sidebar-item', ['title' => 'Dashboard'])
            </ul>
        </div>

        <div class="border border-gray-500 my-4"></div>

        <div class="sidebar-content-container mx-8">
            <p class="text-white">Course</p>
            <ul>
                @include('core.layouts.sidebar-item', ['title' => 'Course A'])
                @include('core.layouts.sidebar-item', ['title' => 'Course B'])
                @include('core.layouts.sidebar-item', ['title' => 'Course C'])
            </ul>
        </div>

        <div class="border border-gray-500 my-4"></div>

        <div class="sidebar-content-container mx-8 ">
            <p class="text-white">Learning Path</p>
            <ul>
                @include('core.layouts.sidebar-item', ['title' => 'Learning Path A'])
            </ul>
        </div>
    </main>
</div>