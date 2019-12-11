<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="pricing-block">
        <h2>{{ $title }}</h2>

        <h3 class="price my-3 ">
            {{ $price }} <br> <small>XFA/mois</small>
        </h3>

        <ul class="list-unstyled">
            @foreach($options as $option)
                <li>{{ $option }}</li>
            @endforeach
        </ul>

        <a href="{{ $link ?? '#' }}" class="btn btn-outline-dark">Choisir</a>
    </div>
</div>
