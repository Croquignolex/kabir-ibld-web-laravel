<section class="section" id="services">
    {{--Content--}}
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 col-lg-7 text-center">
                {{--Heading--}}
                <h2 class="lg-title mb-2">Nos services</h2>

                {{--Subheading--}}
                <p class="mb-5">Petite introduction</p>
            </div>
        </div>

        <div class="row">
            @component('components.landing.service', [
                'icon' => 'gem',
                'title' => 'Service 1',
                'description' => 'Explication du service 1.'
            ])
            @endcomponent

            @component('components.landing.service', [
                'icon' => 'code',
                'title' => 'Service 2',
                'description' => 'Explication du service 2.'
            ])
            @endcomponent

            @component('components.landing.service', [
                'icon' => 'home',
                'title' => 'Service 3',
                'description' => 'Explication du service 3.'
            ])
            @endcomponent

            @component('components.landing.service', [
                'icon' => 'leaf',
                'title' => 'Service 4',
                'description' => 'Explication du service 4.'
            ])
            @endcomponent

            @component('components.landing.service', [
                'icon' => 'cogs',
                'title' => 'Service 5',
                'description' => 'Explication du service 5.'
            ])
            @endcomponent

            @component('components.landing.service', [
                'icon' => 'bug',
                'title' => 'Service 6',
                'description' => 'Explication du service 6.'
            ])
            @endcomponent
        </div>
    </div>
</section>
