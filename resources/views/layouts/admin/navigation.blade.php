<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin/img/admin-logo.png') }}" alt="Admin" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ __('general.site_name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/img/avatars/avatar5.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item active">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('general.dashboard') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Administration
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-sign-out"></i>
                        <p>Logout</p>
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
        <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
        <a href="{{ url('/logout') }}" class="btn btn-secondary hide-on-collapse pos-right"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    </div>
    <!-- /.sidebar-custom -->
</aside>

{{-- Logout Form --}}
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
