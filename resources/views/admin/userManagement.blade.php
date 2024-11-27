@extends('template.dashboard-admin-template')
@section('content')

<div class="head-title mb-10">
    <div class="left">
      <h1>Users Management</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Users Management</a>
        </li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li>
          <a class="active" href="#">Main</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach ($users as $user)
    <a href="{{ route('show-user-details', $user->id) }}" class="relative bg-white py-6 px-6 rounded-3xl shadow-xl transform transition-transform duration-300 ease-in-out hover:scale-105 ">
      <div class="text-white flex items-center absolute rounded-full shadow-xl bg-pink-500 left-4 -top-6">
        @if($user->photo_path)
        <img src="{{ asset('storage/' . auth()->user()->photo_path) }}" id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" alt="User dropdown">
        @else
            <img src="{{ asset('img/assets/profile1.png') }}" id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-14 h-14 rounded-full cursor-pointer" alt="User dropdown">
        @endif
      </div>
      <div class="mt-8">
          <p class="text-xl font-semibold my-2">{{ $user->username }}</p>
          <div class="flex space-x-2 text-gray-400 text-sm">
              <!-- svg  -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <p class="truncate w-full text-ellipsis overflow-hidden whitespace-nowrap">{{ $user->address }}</p>

          </div>
          <div class="flex space-x-2 text-gray-400 text-sm my-3">
              <!-- svg  -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <p class="truncate w-full text-ellipsis overflow-hidden whitespace-nowrap">{{ $user->email }}</p>
          </div>
          <div class="border-t-2"></div>
  
          <div class="flex justify-between">
              <div class="my-2">
                  <p class="font-semibold text-base mb-2">Progress</p>
                  <div class="text-base text-gray-400 font-semibold">
                      <p>34%</p>
                  </div>
              </div>
          </div>
      </div>
    </a>
    @endforeach
</div>

  
  

@endsection