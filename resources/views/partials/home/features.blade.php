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
            @foreach($domains as $domain)
                @component('components.landing.feature', [
                    'icon' => $domain->icon,
                    'title' => $domain->name,
                    'description' => $domain->description
                ])
                @endcomponent
            @endforeach
        </div>
    </div>
</section>
