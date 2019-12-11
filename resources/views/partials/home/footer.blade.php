<footer class="top-padding bg-dark">
    <div class="container">
        <div class="row align-self-center">
            {{--Left--}}
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <a href="#" class="footer-brand text-white">
                        {{ config('app.name') }}
                    </a>
                    <p>Text explicatif</p>
                </div>
            </div>
            {{--Center--}}
            <div class="col-lg-2 ml-lg-auto col-md-2">
                <ul class="footer-link list-unstyled ml-0 justify-content-end">
                    <li>
                        <a href="#about" class="text-white js-scroll-trigger">
                            A propos
                        </a>
                    </li>
                    <li>
                        <a href="#feature" class="text-white js-scroll-trigger">
                            Domaines
                        </a>
                    </li>
                </ul>
            </div>
            {{--Right--}}
            <div class="col-lg-3 col-md-4">
                <ul class="footer-link list-unstyled ml-0 justify-content-end">
                    <li>
                        <i class="fa fa-mobile"></i> +345-345456
                    </li>
                    <li>
                        <i class="fa fa-location-arrow"></i> Toronto, CANADA
                    </li>
                </ul>
            </div>
        </div>
        {{--Copyright--}}
        <div class="row justify-content-md-center footer-copy">
            <div class="col-lg-8 col-md-6 col-sm-6 text-center">
                <p class="lead text-white-50">&copy; Copyright Reserved to {{ config('app.name') }}</p>
            </div>
        </div>
    </div>
</footer>
