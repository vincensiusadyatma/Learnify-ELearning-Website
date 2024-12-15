<div id="sidebarContainer" class="fixed z-20 left-0 h-screen flex flex-col bg-blue-dark-theme">
    <!-- Sidebar Header -->
    <header class="flex h-20 items-center justify-between px-5 border-b border-gray-600">
        <p id="sidebarLogo" class="text-2xl text-white font-bold">Learnify</p>
        <button id="toggleSidebarItemBtn" class="p-2 text-white hover:bg-[#3333AA] rounded-md">
            <i class="bx bx-menu text-xl"></i>
        </button>
    </header>

    <!-- Sidebar Content -->
    <main class="flex-1 overflow-auto">
        <!-- Dashboard Section -->
        <div class="mx-4 my-4">
            <p class="text-white text-sm uppercase font-semibold sidebar-label">Dashboard</p>
            <ul>
                @include('core.layouts.sidebar-item', [
                    'title' => 'Dashboard', 'icon' => 'bx bx-home-alt', 
                    'link' => route('show-dashboard'), 'active' => request()->routeIs('show-dashboard')
                ])
            </ul>
        </div>

        <!-- Course Section -->
        <div class="mx-4 my-4">
            <p class="text-white text-sm uppercase font-semibold sidebar-label">Course</p>
            <ul>
                @include('core.layouts.sidebar-item', [
                    'title' => 'Course', 'icon' => 'bx bx-book-open', 
                    'link' => route('show-course'), 'active' => request()->routeIs('show-course')
                ])
            </ul>
        </div>

        <!-- Quiz Section -->
        <div class="mx-4 my-4">
            <p class="text-white text-sm uppercase font-semibold sidebar-label">Quiz</p>
            <ul>
                @include('core.layouts.sidebar-item', [
                    'title' => 'Quiz', 'icon' => 'bx bx-help-circle', 
                    'link' => route('show-quiz'), 'active' => request()->routeIs('show-quiz')
                ])
            </ul>
        </div>
    </main>
</div>
