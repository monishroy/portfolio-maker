<div class="container-fluid">
    <div id="two-column-menu"></div>
    <ul class="navbar-nav" id="navbar-nav">
        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
        @can('view dashboard')
        <li class="nav-item">
            <a class="nav-link menu-link {{ Request::routeIs('backend.dashboard') ? 'active':''}}" href="{{ route('backend.dashboard') }}">
                <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
            </a>
        </li> <!-- end Dashboard Menu -->
        @endcan
        @can('view user')
        <li class="nav-item">
            <a class="nav-link menu-link {{ Request::routeIs('users.index') ? 'active':''}}" href="{{ route('users.index') }}">
                <i class="las la-user-circle"></i> <span data-key="t-widgets">Users</span>
            </a>
        </li>
        @endcan
        @canany(['view role'])
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
        @endcanany
        @canany(['view template','add template'])
        <li class="nav-item">
            <a class="nav-link menu-link" href="#template" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="template">
                <i class="ri-dashboard-line"></i> <span data-key="t-layouts">Template</span>
            </a>
            <div class="collapse menu-dropdown {{ Request::is(['admin/templates*']) ? 'show':''}}" id="template">
                <ul class="nav nav-sm flex-column">
                    @can('add template')
                    <li class="nav-item">
                        <a href="{{ route('templates.create') }}"class="nav-link {{ Request::routeIs(['templates.create']) ? 'active':''}}" data-key="t-two-column">Create Template</a>
                    </li>
                    @endcan
                    @can('view template')
                    <li class="nav-item">
                        <a href="{{ route('templates.index') }}"class="nav-link {{ Request::routeIs(['templates.index']) ? 'active':''}}" data-key="t-two-column">Templates</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        @endcanany
    </ul>
</div>