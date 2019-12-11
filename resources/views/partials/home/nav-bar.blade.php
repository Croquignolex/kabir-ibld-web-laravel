<nav class="navbar navbar-expand-lg navbar-dark navbar-togglable  fixed-top " id="mainNav">
    <div class="container">
        {{--Brand--}}
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <img src="{{ img_asset('logo') }}" alt="..." width="50">
            {{--<h2>{{ config('app.name') }}</h2>--}}
        </a>

        {{--Toggle--}}
        {{--TODO: fiw this drawer toogler--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon-bar">
                <i class="fa fa-bars"></i>
            </span>
        </button>

        {{--Collapse--}}
        <div class="collapse navbar-collapse" id="navbarCollapse">
            {{--Links--}}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#page-top">
                        Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#feature">
                        Domaines
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">
                        A propos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">
                        Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#exemples">
                        Exemples
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#pricing">
                        Plan tarifaire
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link js-scroll-trigger" href="#contact">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
