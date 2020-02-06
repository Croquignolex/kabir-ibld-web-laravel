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
                <li class="has-sub active expand" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="fa fa-chart-pie"></i>
                        <span class="nav-text">Tableau de bord</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse show"  id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="active">
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Tableau de bord 1</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Tableau de bord 1</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
