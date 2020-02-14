<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- App Brand -->
        <div class="app-brand">
            <a href="{{ route('home') }}">
                <img src="{{ img_asset('logo') }}" alt="..." width="40" class="brand-icon">
                <span class="brand-name">{{ config('app.name') }}</span>
            </a>
        </div>
        <!-- Sidebar scrollbar -->
        <div class="sidebar-scrollbar">
            <!-- Sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="has-sub expand {{ active_page(dashboard_pages()) }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                       aria-expanded="false" aria-controls="dashboard">
                        <span class="nav-text">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            Tableau de bord
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="collapse {{ active_page(dashboard_pages(), 'expend') }}" id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="{{ active_page(collect('dashboard')) }}">
                                <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-monitor-dashboard"></i>
                                        Général
                                    </span>
                                </a>
                            </li>
                            {{--<li>
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Activité</span>
                                </a>
                            </li>--}}
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
