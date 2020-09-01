<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
        <a class="navbar-brand" href="/home">
            <!-- Logo icon -->
            <b>
               
                <img src="/dashboard/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <img src="/dashboard/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
            </b>
           
            <span>
             <!-- dark Logo text -->
             <img src="/dashboard/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
             <!-- Light Logo text -->
             <img src="/dashboard/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto mt-md-0">
            <!-- This is  -->
            {{-- <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li> --}}
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            {{-- <li class="nav-item hidden-sm-down search-box">
                <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                <form class="app-search">
                    <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
            </li> --}}
            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->
                      <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->


        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/dashboard/assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                <div class="dropdown-menu dropdown-menu-right scale-up">
                    <ul class="dropdown-user">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-img"><img src="/dashboard/assets/images/users/1.jpg" alt="user">
                                </div>
                                <div class="u-text">
                                
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                    <a class="btn btn-sm btn-rounded btn-danger " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
              </li>
        </ul>
    </div>
</nav>
