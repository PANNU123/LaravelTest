<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('backend')}}/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                    <span class="logo-lg">
                            <img src="{{asset('backend')}}/assets/images/logo-dark.png" alt="" height="20">
                        </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>


            <div class="topbar-social-icon me-3 d-none d-md-block">
                <ul class="list-inline title-tooltip m-0">
                    <li class="list-inline-item">
                        <a href="" data-bs-toggle="tooltip" data-placement="top" title="Email">
                            <i class="mdi mdi-email-outline"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item toggle-search noti-icon waves-effect" data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset(AdminProfilePicture().AdminProfileShow()->image)}}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ AdminProfileShow()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href=""><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('admin.logout')}}"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>


        </div>
    </div>
</header>
