        <!-- Sidebar -->
        {{-- @php
            if
        @endphp --}}

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{ asset('image/logo.png') }}" width="50px" height="auto" />
                </div>
                <div class="sidebar-brand-text mx-3">Disperin <sup>Majalengka</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (auth()->user()->role == 'admin')
                <!-- Heading -->
                <div class="sidebar-heading">
                    Admin
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item {{ strstr($title, 'Master') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
                        aria-expanded="true" aria-controls="collapseMaster">
                        <i class="fas fa-database"></i>
                        <span>Master</span>
                    </a>
                    <div id="collapseMaster" class="collapse {{ strstr($title, 'Master') ? 'show' : '' }}"
                        aria-labelledby="headingTwo" data-parent="#collapseMaster">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data Master</h6>
                            <a class="collapse-item {{ strstr($title, 'Master Jenis') ? 'active' : '' }}"
                                href="{{ route('types.index') }}">Jenis</a>
                            <a class="collapse-item {{ strstr($title, 'Master Sample') ? 'active' : '' }}"
                                href="{{ route('samples.index') }}">Sample</a>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider">

                <!-- Nav Item - Tables -->
                <li class="nav-item {{ strstr($title, 'Kelola Akun') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Kelola Akun</span></a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
