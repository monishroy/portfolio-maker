<div class="container-fluid">
    <div id="two-column-menu"></div>
    <ul class="navbar-nav" id="navbar-nav">
        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
        <li class="nav-item">
            <a class="nav-link menu-link {{ Request::routeIs('backend.dashboard') ? 'active':''}}" href="{{ route('backend.dashboard') }}">
                <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
            </a>
        </li> <!-- end Dashboard Menu -->
        @can('view user')
        <li class="nav-item">
            <a class="nav-link menu-link {{ Request::routeIs('users.index') ? 'active':''}}" href="{{ route('users.index') }}">
                <i class="las la-user-circle"></i> <span data-key="t-widgets">Users</span>
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-layouts">Setup</span>
            </a>
            <div class="collapse menu-dropdown {{ Request::is(['admin/setup*']) ? 'show':''}}" id="sidebarLayouts">
                <ul class="nav nav-sm flex-column">
                    @can('view role')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"class="nav-link {{ Request::routeIs(['roles.index','roles.create']) ? 'active':''}}" data-key="t-two-column">Role</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li> 
    </ul>
</div>