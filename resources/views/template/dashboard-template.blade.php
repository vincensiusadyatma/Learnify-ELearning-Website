<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <title>Learnify</title>

    @vite('resources/css/app.css')
    @notifyCss

    <style>

    .notify {
    position: fixed !important;
    top: 20px;
    right: 20px;
    z-index: 9999;
}

    .no-transition * {
        transition: none !important;
    }

    /* Sidebar Container */
    #sidebarContainer {
        width: 240px;
        transition: width 0.3s ease-in-out;
    }

    #sidebarContainer.minimized {
        width: 75px; /* Ukuran sidebar minimized */
    }

    /* Sidebar Item */
    #sidebar-item {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease-in-out;
    }

    #sidebarContainer.minimized #sidebar-item {
        justify-content: center;
        padding: 1rem; /* Konsisten padding */
        width: 100%; /* Lebar penuh */
    }

    /* Hover Effect */
    #sidebar-item:hover {
        background-color: #3333AA; /* Warna hover */
        color: #ffffff;
    }

    #sidebarContainer.minimized #sidebar-item:hover {
        background-color: #3333AA; /* Warna hover saat minimized */
        border-radius: 0.5rem;
    }

    /* Sidebar Title */
    #sidebar-item-title {
        opacity: 1;
        white-space: nowrap;
        transition: opacity 0.3s ease-in-out;
    }

    #sidebarContainer.minimized #sidebar-item-title {
        opacity: 0;
        visibility: hidden;
    }

    /* Sidebar Logo */
    #sidebarLogo {
        opacity: 1;
        transition: opacity 0.3s ease-in-out;
    }

    #sidebarContainer.minimized #sidebarLogo {
        opacity: 0;
        visibility: hidden;
    }

    /* Sidebar Label */
    .sidebar-label {
        opacity: 1;
        transition: opacity 0.3s ease-in-out;
    }

    #sidebarContainer.minimized .sidebar-label {
        opacity: 0;
        visibility: hidden;
    }

    /* Ikon Efek Hover */
    #sidebar-item i {
        font-size: 1.25rem;
        transition: transform 0.2s ease-in-out;
    }

    #sidebar-item:hover i {
        transform: scale(1.1); /* Perbesar ikon saat hover */
    }

    /* Konten Shift */
    #dashboard {
        margin-left: 240px;
        transition: margin-left 0.3s ease-in-out;
    }

    #sidebarContainer.minimized ~ #dashboard {
        margin-left: 60px; /* Konten bergeser saat sidebar minimized */
    }


    </style>

<script>
    // Terapkan state minimized sebelum render
    const savedSidebarState = localStorage.getItem('sidebarState');
    if (savedSidebarState === 'minimized') {
        document.documentElement.classList.add('no-transition');
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('sidebarContainer').classList.add('minimized');
            document.documentElement.classList.remove('no-transition');
        });
    }
</script>

</head>
<body class="bg-[#EAECF3] dark:bg-[#121212]">

@yield('content')

<x-notify::notify/>
@notifyJs
<script>
document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;
    const sidebarContainer = document.getElementById('sidebarContainer');
    const toggleSidebarItemBtn = document.getElementById('toggleSidebarItemBtn');
    const sidebarItemTitles = document.querySelectorAll('#sidebar-item-title');
    const sidebarLabels = document.querySelectorAll('.sidebar-label');
    const sidebarLogo = document.getElementById('sidebarLogo');

    // Hapus kelas 'no-transition' setelah halaman dimuat
    setTimeout(() => {
        body.classList.remove('no-transition');
    }, 50);

    // Fungsi untuk mengatur state sidebar
    function setSidebarState(minimized) {
        if (minimized) {
            sidebarContainer.classList.add('minimized');
            sidebarItemTitles.forEach(title => title.classList.add('hidden'));
            sidebarLabels.forEach(label => label.classList.add('hidden'));
            sidebarLogo.classList.add('hidden');
            localStorage.setItem('sidebarState', 'minimized');
        } else {
            sidebarContainer.classList.remove('minimized');
            sidebarItemTitles.forEach(title => title.classList.remove('hidden'));
            sidebarLabels.forEach(label => label.classList.remove('hidden'));
            sidebarLogo.classList.remove('hidden');
            localStorage.setItem('sidebarState', 'maximized');
        }
    }

    // Event listener untuk toggle sidebar
    toggleSidebarItemBtn.addEventListener('click', () => {
        const isMinimized = sidebarContainer.classList.contains('minimized');
        setSidebarState(!isMinimized);
    });

    // Muat state sidebar dari localStorage
    const savedSidebarState = localStorage.getItem('sidebarState');
    if (savedSidebarState === 'minimized') {
        body.classList.add('no-transition'); // Tambahkan no-transition saat pertama kali load
        setSidebarState(true);
    } else {
        body.classList.add('no-transition');
        setSidebarState(false);
    }
});


</script>


<!-- Script tambahan dari stack -->
@stack('additional-scripts')

<script>
    const button = document.getElementById('user-menu-button');
    const dropdown = document.getElementById('user-dropdown');

    button.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });
    window.addEventListener('click', (event) => {
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    document.getElementById('switch-mode').addEventListener('change', function () {
    if (this.checked) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
});

</script>



</body>
</html>
