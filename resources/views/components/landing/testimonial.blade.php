<div class="carousel-item {{ $active_class }} text-center test-content">
    <div class="client-img">
        <img src="{{ img_asset($image, 'jpg') }}" alt="" class="img-fluid ">
    </div>

    <p class="lead">{{ $description }}</p>

    <div class="client-text">
        <h3>{{ $name }}</h3>
        <h6>{{ $function }}</h6>
    </div>
</div>
