        <!-- Sidebar -->
        {{-- @php
            if
        @endphp --}}


        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{ asset('image/logo.png') }}" width="50px" height="auto" />
                </div>
                <div class="sidebar-brand-text mx-3">Disperin <sup>Majalengka</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            {{-- <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (auth()->user()->role == 'admin')
                <!-- Heading -->
                <div class="sidebar-heading">
                    Admin
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item {{ strstr($title, 'Halaman') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
                        aria-expanded="true" aria-controls="collapseMaster">
                        <i class="fas fa-database"></i>
                        <span>Halaman</span>
                    </a>
                    <div id="collapseMaster" class="collapse {{ strstr($title, 'Halaman') ? 'show' : '' }}"
                        aria-labelledby="headingTwo" data-parent="#collapseMaster">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data Master</h6>
                            <a class="collapse-item {{ strstr($title, 'Halaman Jenis') ? 'active' : '' }}"
                                href="{{ route('types.index') }}">Jenis Kriteria</a>
                            <a class="collapse-item {{ strstr($title, 'Halaman Kriteria') ? 'active' : '' }}"
                                href="{{ route('criterias.index') }}">Kriteria</a>
                            <a class="collapse-item {{ strstr($title, 'Halaman Sub-Kriteria') ? 'active' : '' }}"
                                href="{{ route('subcriterias.index') }}">Sub-Kriteria</a>
                            <a class="collapse-item {{ strstr($title, 'Halaman Alternatif') ? 'active' : '' }}"
                                href="{{ route('alternatives.index') }}">Alternatif</a>
                            @if ($check2)
                                <a class="collapse-item {{ strstr($title, 'Halaman Data Sample') ? 'active' : '' }}"
                                    href="{{ route('samples.index') }}">Data Sample</a>
                            @endif
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider">
            @endif

            <!-- Nav Item - Tables -->
            @if (!$check1)
                <li class="nav-item {{ strstr($title, 'Perhitungan Mabac') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('mabacs') }}">
                        <i class="fas fa-calculator"></i>
                        <span>Perhitungan Mabac</span></a>
                </li>
            @endif
            @if (!$check1)
                <li class="nav-item {{ strstr($title, 'Perhitungan Weight Product') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('wps') }}">
                        <i class="fas fa-calculator"></i>
                        <span>Perhitungan Wp</span></a>
                </li>
            @endif

            @if (auth()->user()->role == 'admin')
                <hr class="sidebar-divider">

                <li class="nav-item {{ strstr($title, 'Kelola Akun') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Kelola Akun</span></a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Log Out
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            {{-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> --}}

        </ul>
        <!-- End of Sidebar -->
