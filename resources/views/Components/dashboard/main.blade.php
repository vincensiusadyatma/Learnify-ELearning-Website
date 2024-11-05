<div class="w-full h-full">

    {{-- sidebar --}}
    <div id="sidebarContainer"
         class="fixed left-0 w-60 h-svh flex flex-col bg-blue-dark-theme -translate-x-60 lg:translate-x-0">
        <header id="sidebarHeader" class="flex h-20 border-b-2 mb-4 items-center justify-between px-4">
            <p class="text-2xl text-white">Learnify</p>
            <button id="toggleSidebarItemBtn" class="mr-2.5">
                <img src="https://placehold.co/30x30" alt="">
            </button>
        </header>

        <main class="h-80">
            {{-- Dashboard items --}}
            <div class="sidebar-content-container mx-8">
                <p class="text-white">Dashboard</p>
                <ul>
                    <x-sidebar.list-item title="Dashboard"></x-sidebar.list-item>
                </ul>
            </div>

            {{-- divider --}}
            <div class="border border-gray-500 my-4"></div>

            <div class="sidebar-content-container mx-8">
                <p class="text-white">Course</p>
                <ul>
                    <x-sidebar.list-item title="Course A"></x-sidebar.list-item>
                    <x-sidebar.list-item title="Course B"></x-sidebar.list-item>
                    <x-sidebar.list-item title="Course C"></x-sidebar.list-item>
                </ul>
            </div>

            {{-- divider --}}
            <div class="border border-gray-500 my-4"></div>

            <div class="sidebar-content-container mx-8 ">
                <p class="text-white">Learning Path</p>
                <ul>
                    <x-sidebar.list-item title="Learning Path"></x-sidebar.list-item>
                </ul>
            </div>
        </main>
    </div>

    {{-- content container --}}
    <div id="dashboard" class="lg:ml-60 flex flex-col items-center space-y-16">
        {{-- navbar --}}
        <nav class="flex justify-between px-8 items-center top-0 h-20 z-9 w-full bg-white-theme border">

            {{-- Home Button--}}
            <div class="hidden lg:flex space-x-4 items-center">
                <img src="https://placehold.co/30x30" alt="">
                <p>Dashboard</p>
            </div>

            {{-- Toggle Sidebar--}}
            <button id="toggleSidebarBtn" class="flex lg:hidden space-x-4 items-center">
                <img src="https://placehold.co/30x30" alt="">
            </button>

            {{-- User Profile --}}
            <div>
                <img src="https://placehold.co/40x40" alt="">
            </div>
        </nav>

        {{-- content --}}
        <div class="max-w-[1300px] w-[calc(100%-8rem)] h-[860px] bg-white">

        </div>
    </div>

</div>

<script>
    const toggleSidebar = document.getElementById('toggleSidebarBtn')
    const toggleSidebarItem = document.getElementById('toggleSidebarItemBtn')
    const sidebarContainer = document.getElementById('sidebarContainer')
    const contentContainer = document.getElementById('dashboard')
    const sidebarItem = document.querySelectorAll('#sidebar-item')
    const sidebarItemTitles = document.querySelectorAll('#sidebar-item-title')
    const sidebarContentContainer = document.querySelectorAll('.sidebar-content-container p')
    const sidebarHeader = document.querySelector('#sidebarHeader')

    toggleSidebarItem
        .addEventListener('click', () => {
            sidebarItemTitles.forEach(title => {
                title.classList.toggle('hidden')
            })

            sidebarItem.forEach(icon => {
                icon.classList.toggle('justify-end');
                icon.classList.toggle('px-0');
            })

            sidebarContentContainer.forEach(p => {
                p.classList.toggle('hidden')
            })
        })

    toggleSidebarItem
        .addEventListener('click', () => {
            if (sidebarContainer.hasAttribute('active')) {
                sidebarContainer.classList.remove('lg:-translate-x-40', 'translate-x-0')
                sidebarContainer.classList.add('lg:translate-x-0', '-translate-x-60')
                contentContainer.classList.add('lg:ml-60')
                contentContainer.classList.remove('lg:ml-20')
                sidebarContainer.removeAttribute('active')
            } else {
                sidebarContainer.setAttribute('active', 'true')
                sidebarContainer.classList.remove('lg:translate-x-0')
                sidebarContainer.classList.add('lg:-translate-x-40')
                contentContainer.classList.remove('lg:ml-60')
                contentContainer.classList.add('lg:ml-20')
            }
        })

    toggleSidebar.addEventListener('click', () => {
        if (!sidebarContainer.hasAttribute('active')) {
            sidebarContainer.setAttribute('active', 'true')
            sidebarContainer.classList.remove('-translate-x-60')
            sidebarContainer.classList.add('translate-x-0')
        }
    })
</script>
