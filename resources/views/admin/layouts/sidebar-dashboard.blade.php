<section id="sidebar">
  <a href="#" class="brand">
    <img src="{{ asset('img/logo/learnify-logo.png') }}" alt="" class="w-[20px] mr-5 ml-5">
    <span class="text">Learnify</span>
  </a>
  <ul class="side-menu top">
    <li class="{{ request()->routeIs('show-dashboard-admin') ? 'active' : '' }}">
      <a href="{{ route('show-dashboard-admin') }}">
        <i class='bx bxs-dashboard' ></i>
        <span class="text">Dashboard</span>
      </a>
    </li>
    <li class="{{ request()->routeIs('show-users-management','show-myrooms','show-joinedrooms') ? 'active' : '' }}">
      <a href="{{ route('show-users-management') }}">
        <i class='bx bxs-user' ></i>
        <span class="text">Users Management</span>
      </a>
    </li>
    <li class="{{ request()->routeIs('show-course-management') ? 'active' : '' }}">
      <a href="{{ route('show-course-management') }}">
        <i class='bx bxs-doughnut-chart' ></i>
        <span class="text">Courses Management</span>
      </a>
    </li>
    <li class="{{ request()->routeIs('show-quiz-management') ? 'active' : '' }}">
      <a href="{{ route('show-quiz-management') }}">
        <i class='bx bxs-message-dots' ></i>
        <span class="text">Quiz Management</span>
      </a>
    </li>
    <li>
      <a href="{{ route('healthcheck') }}">
        <i class='bx bxs-chart' ></i>
        <span class="text">HealthCheck Monitoring</span>
      </a>
    </li>
   
  </ul>
  <ul class="side-menu">
    {{-- <li>
      <a href="#">
        <i class='bx bxs-cog' ></i>
        <span class="text">Settings</span>
      </a>
    </li> --}}
    <li>
      <a href="{{ route('handle-logout') }}" class="logout">
        <i class='bx bxs-log-out-circle' ></i>
        <span class="text">Logout</span>
      </a>
    </li>
  </ul>
</section>