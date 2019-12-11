<section class="section" id="pricing">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6 col-lg-3 ">
                {{--Heading--}}
                <h2 class="lg-title mb-2 ">Plan tariffaire</h2>

                {{--Subheading--}}
                <p class="my-4 ">Petite description du plan tariffaire</p>
            </div>

            @component('components.landing.pricing', [
                'title' => 'Plan basique',
                'price' => 0,
                'options' => ['option 1']
            ])
            @endcomponent

            @component('components.landing.pricing', [
                'title' => 'Plan standard',
                'price' => 500,
                'options' => ['option 1']
            ])
            @endcomponent

            @component('components.landing.pricing', [
                'title' => 'Plan Premium',
                'price' => 2000,
                'options' => ['option 1']
            ])
            @endcomponent
        </div>
    </div>
</section>
