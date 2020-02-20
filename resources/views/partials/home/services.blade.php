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
            @foreach($services as $service)
                @component('components.landing.service', [
                    'icon' => $service->icon,
                    'title' => $service->name,
                    'description' => $service->description
                ])
                @endcomponent
            @endforeach
        </div>
    </div>
</section>
