<section class="section bg-dark" id="testimonial">
    <div class="carousel slide" id="review-slider" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#review-slider" data-slide-to="0" class="active"></li>
            <li data-target="#review-slider" data-slide-to="1"></li>
            <li data-target="#review-slider" data-slide-to="2"></li>
        </ol>
        <div class="caousel-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        @component('components.landing.testimonial', [
                            'image' => 'tes-1',
                            'name' => 'Temoin 1',
                            'function' => 'Fonction 1',
                            'active_class' => 'active',
                            'description' => 'Explication 1'
                        ])
                        @endcomponent

                        @component('components.landing.testimonial', [
                            'image' => 'tes-2',
                            'name' => 'Temoin 2',
                            'active_class' => '',
                            'function' => 'Fonction 2',
                            'description' => 'Explication 2'
                        ])
                        @endcomponent

                        @component('components.landing.testimonial', [
                            'image' => 'tes-3',
                            'name' => 'Temoin 3',
                            'function' => 'Fonction 3',
                            'active_class' => '',
                            'description' => 'Explication 3'
                        ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
