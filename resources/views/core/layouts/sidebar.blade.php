<div id="sidebarContainer"
     class="fixed left-0 w-60 h-svh flex flex-col bg-blue-dark-theme transition duration-300 -translate-x-60 lg:translate-x-0">
    <header id="sidebarHeader" class="flex h-20 border-b-2 mb-4 items-center justify-between px-5">
        <p class="text-2xl text-white">Learnify</p>
        <button id="toggleSidebarItemBtn"
                class="hidden lg:flex items-center justify-center p-2 rounded-md text-white hover:bg-blue-700">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
            </svg>
        </button>
    </header>

    <main class="h-80 ">
        <div class="sidebar-content-container mx-8">
            <p class="text-white">Profile</p>
            <ul>
                @include('core.layouts.sidebar-item', ['title' => 'Profile', 'link' => route('show-dashboard')])
            </ul>
        </div>

        <div class="border border-gray-500 my-4"></div>

        <div class="sidebar-content-container mx-8">
            <p class="text-white">Course</p>
            <ul>
                @include('core.layouts.sidebar-item', ['title' => 'Course', 'link' => route('show-course')])

            </ul>
        </div>

        <div class="border border-gray-500 my-4"></div>

        <div class="sidebar-content-container mx-8 ">
            <p class="text-white">Learning Path</p>
            <ul>
                @include('core.layouts.sidebar-item', ['title' => 'Learning Path A', 'link' => '#'])
            </ul>
        </div>
    </main>
</div>
