@props(['role'])

<div class="sidebar-menu">
    <ul class="nav flex-column">
        @if(Auth::guard('web')->check())
            <!-- Admin Menu -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.index') ? 'active bg-gradient-dark text-dark' : 'text-dark' }}" href="{{route('admin.index')}}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ request()->routeIs('admin.users_list') || request()->routeIs('admin.doctors_list') ? 'active bg-gradient-dark text-dark' : 'text-dark' }}"
                   data-bs-toggle="collapse"
                   href="#tablesCollapse"
                   role="button"
                   aria-expanded="{{ request()->routeIs('admin.users_list') || request()->routeIs('admin.doctors_list') ? 'true' : 'false' }}"
                   aria-controls="tablesCollapse"
                   style="border-radius: 20px; padding: 10px 20px; transition: background-color 0.2s;">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Tables</span>
                    <i class="material-symbols-rounded opacity-5 ms-auto"
                       style="transition: transform 0.3s; {{ request()->routeIs('admin.users_list') || request()->routeIs('admin.doctors_list') ? 'transform: rotate(180deg);' : '' }}">
                        expand_more
                    </i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.users_list') || request()->routeIs('admin.doctors_list') ? 'show' : '' }}"
                     id="tablesCollapse">
                    <ul class="nav flex-column ms-4 ps-3">
                        <li class="nav-item">
                            <a class="nav-link btn {{ request()->routeIs('admin.users_list') ? 'btn-dark text-dark' : 'btn-dark text-dark' }}"
                               href="{{ route('admin.users_list') }}"
                               style="border-radius: 20px; padding: 10px 20px; transition: background-color 0.2s;">
                                <div class="d-flex align-items-center">
                                    <i class="material-symbols-rounded opacity-5 me-2">people</i>
                                    <span class="sidenav-normal">User List</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn {{ request()->routeIs('admin.doctors_list') ? 'btn-dark text-dark' : 'btn-dark text-dark' }}"
                               href="{{ route('admin.doctors_list') }}"
                               style="border-radius: 20px; padding: 10px 20px; transition: background-color 0.2s;">
                                <div class="d-flex align-items-center">
                                    <i class="material-symbols-rounded opacity-5 me-2">medical_services</i>
                                    <span class="sidenav-normal">Doctor List</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->routeIs('admin.appointment') ? 'active bg-gradient-dark text-dark' : 'text-dark' }}" href="{{route('admin.appointment')}}">
                    <i class="material-symbols-rounded opacity-5">view_in_ar</i>
                    <span class="nav-link-text ms-1">Appointments</span>
                </a>
            </li>
        @elseif(Auth::guard('doctor')->check())
            <!-- Doctor Menu -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('doctor.dashboard') ? 'active bg-gradient-dark text-dark' : 'text-dark' }}" href="{{route('doctor.dashboard')}}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->routeIs('doctor.appointments') ? 'active bg-gradient-dark text-dark' : 'text-dark' }}" href="{{route('doctor.appointments')}}">
                    <i class="material-symbols-rounded opacity-5">calendar_today</i>
                    <span class="nav-link-text ms-1">My Appointments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->routeIs('doctor.patients') ? 'active bg-gradient-dark text-dark' : 'text-dark' }}" href="{{route('doctor.patients')}}">
                    <i class="material-symbols-rounded opacity-5">people</i>
                    <span class="nav-link-text ms-1">My Patients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->routeIs('doctor.profile') ? 'active bg-gradient-dark text-dark' : 'text-dark' }}" href="{{route('doctor.profile')}}">
                    <i class="material-symbols-rounded opacity-5">person</i>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        @endif
    </ul>
</div> 