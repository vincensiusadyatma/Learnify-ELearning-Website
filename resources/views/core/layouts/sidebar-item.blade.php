@props(['title', 'link', 'active', 'icon'])

<li>
    <a href="{{ $link }}" class="flex items-center gap-3 py-2 px-3 rounded-md text-white hover:bg-[#3333AA] {{ $active ? 'bg-[#3333AA]' : '' }}">
        <i class="{{ $icon }} text-lg"></i>
        <span id="sidebar-item-title">{{ $title }}</span>
    </a>
</li>
