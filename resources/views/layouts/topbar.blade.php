    <!-- Topbar -->
    <nav
        class="ml-2 mr-2 mt-4 navbar sticky-top navbar-expand navbar-light bg-white topbar mb-4 static-top shadow top-bar">

        {{-- <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button> --}}

        {{-- <!-- Sidebar Toggler (Sidebar) -->
        <div class="ml-2 d-none d-md-inline">
            <button type="button" class="border-0 btn" id="sidebarToggle"><i class="fas fa-bars fa-lg"></i></button>
        </div> --}}
        <a class="d-flex align-items-center justify-content-center" href="{{ url('/home') }}"
            style="text-decoration:none;">
            <div class="rotate-n-15">
                <img src="{{ asset('image/logo.png') }}" width="50px" height="auto" />
            </div>
            <div class="mx-3 text-black">Disperin <sup>Majalengka</sup></div>
        </a>


        <!-- Topbar Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @include('layouts.navbar')
                {{-- <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li> --}}

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                        @if (auth()->user()->picture)
                            <img class="img-profile rounded-circle"
                                src="{{ asset('storage/' . auth()->user()->picture) }}">
                        @else
                            <img class="img-profile rounded-circle"
                                src="{{ asset('storage/avatar/undraw_profile.svg') }}">
                        @endif
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End of Topbar -->
