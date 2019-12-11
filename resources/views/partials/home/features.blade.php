<section class="section" id="feature">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 col-lg-6 text-center">
                {{--Heading--}}
                <h2 class="lg-title mb-2">Pourquoi nous choisir?</h2>

                {{--Subheading--}}
                <p class="mb-5 ">Bref explicatif</p>
            </div>
        </div>

        {{--Features--}}
        <div class="row justy-content-center">
            @component('components.landing.feature', [
                'icon' => 'gem',
                'title' => 'Domaine 1',
                'description' => 'Explication du domaine 1.'
            ])
            @endcomponent

            @component('components.landing.feature', [
                'icon' => 'dice',
                'title' => 'Domaine 2',
                'description' => 'Explication du domaine 2.'
            ])
            @endcomponent

            @component('components.landing.feature', [
                'icon' => 'anchor',
                'title' => 'Domaine 3',
                'description' => 'Explication du domaine 3.'
            ])
            @endcomponent

            @component('components.landing.feature', [
                'icon' => 'clock',
                'title' => 'Domaine 4',
                'description' => 'Explication du domaine 4.'
            ])
            @endcomponent
        </div>
    </div>
</section>
