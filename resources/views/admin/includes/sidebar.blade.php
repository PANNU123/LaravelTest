<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="{{asset(AdminProfilePicture().AdminProfileShow()->image)}}" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">{{ AdminProfileShow()->name }}</h5>
                    <span class="font-size-13 text-white-50">{{ AdminProfileShow()->email }}</span>
                </div>
            </div>
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Dashboard Menu</li>
                <li>
                    <a href="{{route('admin.dashboard')}}" class="waves-effect {{Route::is('admin.dashboard')|| Route::is('admin.dashboard*') ? 'active' : ''  }}">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.product')}}" class="waves-effect {{Route::is('admin.product')|| Route::is('admin.product*') ? 'active' : ''  }}">
                        <i class="dripicons-home"></i>
                        <span>Product</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
