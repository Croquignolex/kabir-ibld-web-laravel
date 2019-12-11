<section class="section bg-light" id="exemples">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 col-lg-7 text-center">
                {{--Heading--}}
                <h2 class="lg-title mb-2">Quelques exemples</h2>

                {{--Subheading--}}
                <p class="mb-5">Petite description.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            @component('components.landing.example', [
                'img' => img_asset('example1'),
                'legend' => 'Petite explication',
                'name' => 'Ex 1.'
            ])
            @endcomponent

            @component('components.landing.example', [
                'img' => img_asset('example2'),
                'legend' => 'Petite explication',
                'name' => 'Ex 2.'
            ])
            @endcomponent

            @component('components.landing.example', [
                'img' => img_asset('example3'),
                'legend' => 'Petite explication',
                'name' => 'Ex 3.'
            ])
            @endcomponent

            @component('components.landing.example', [
                'img' => img_asset('example4'),
                'legend' => 'Petite explication',
                'name' => 'Ex 4.'
            ])
            @endcomponent
        </div>
    </div>
</section>
