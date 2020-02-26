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
                <li class="has-sub expand {{ active_page(admin_dashboard_pages()) }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                       aria-expanded="false" aria-controls="dashboard">
                        <span class="nav-text">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            Tableau de bord
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="collapse {{ active_page(admin_dashboard_pages(), 'expend') }}" id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="{{ active_page(collect('admin.dashboard')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.dashboard') }}">
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
                <!-- Contributor -->
                <li class="has-sub expand {{ active_page(admin_contributor_pages()) }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#contibutor"
                       aria-expanded="false" aria-controls="contibutor">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Intervenants</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{ active_page(admin_contributor_pages(), 'expend') }}" id="contibutor" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="{{ active_page(collect('admin.contributors.index')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.contributors.index') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-account-search-outline"></i>
                                        Tous les intervenants
                                    </span>
                                </a>
                            </li>
                            <li class="{{ active_page(collect('admin.contributors.create')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.contributors.create') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-account-plus-outline"></i>
                                        Ajouter un intervenant
                                    </span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <!-- Document -->
                <li class="has-sub expand {{ active_page(admin_document_pages()) }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#document"
                       aria-expanded="false" aria-controls="document">
                        <i class="mdi mdi-file-document-box-multiple-outline"></i>
                        <span class="nav-text">Documents</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{ active_page(admin_document_pages(), 'expend') }}" id="document" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="{{ active_page(collect('admin.documents.index')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.documents.index') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-file-find-outline"></i>
                                        Tous les documents
                                    </span>
                                </a>
                            </li>
                            <li class="{{ active_page(collect('admin.documents.create')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.documents.create') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-file-upload-outline"></i>
                                        Ajouter un document
                                    </span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <!-- Domain -->
                <li class="has-sub expand {{ active_page(admin_domain_pages()) }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#domain"
                       aria-expanded="false" aria-controls="domain">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">Domaines</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{ active_page(admin_domain_pages(), 'expend') }}" id="domain" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="{{ active_page(collect('admin.domains.index')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.domains.index') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-folder-search-outline"></i>
                                        Tous les domaines
                                    </span>
                                </a>
                            </li>
                            <li class="{{ active_page(collect('admin.domains.create')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.domains.create') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-folder-plus-outline"></i>
                                        Ajouter un domaine
                                    </span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <!-- Service -->
                <li class="has-sub expand {{ active_page(admin_service_pages()) }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#service"
                       aria-expanded="false" aria-controls="service">
                        <i class="mdi mdi-database"></i>
                        <span class="nav-text">Services</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{ active_page(admin_service_pages(), 'expend') }}" id="service" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="{{ active_page(collect('admin.services.index')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.services.index') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-database-search"></i>
                                        Tous les services
                                    </span>
                                </a>
                            </li>
                            <li class="{{ active_page(collect('admin.services.create')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.services.create') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-database-plus"></i>
                                        Ajouter un service
                                    </span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <!-- Settings -->
                <li class="has-sub expand {{ active_page(admin_tools_pages()) }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tool"
                       aria-expanded="false" aria-controls="tool">
                        <i class="mdi mdi-pencil-box-multiple"></i>
                        <span class="nav-text">Outils</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{ active_page(admin_tools_pages(), 'expend') }}" id="tool" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="{{ active_page(collect('admin.settings.index')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.settings.index') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-information-outline"></i> Informations du site
                                    </span>
                                </a>
                            </li>
                            <li class="{{ active_page(collect('admin.countries.index')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.countries.index') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-flag"></i> Pays
                                    </span>
                                </a>
                            </li>
                            <li class="{{ active_page(collect('admin.contacts.index')) }}">
                                <a class="sidenav-item-link" href="{{ route('admin.contacts.index') }}">
                                    <span class="nav-text">
                                        <i class="mdi mdi-email-open-outline"></i> Méssages
                                    </span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
