@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Services',
    'breadcrumb_icon' => 'mdi mdi-database-search',
    'breadcrumb_chain' => ['Services', 'Tous les services']
])

@section('app.master.title', page_title('Tous les services'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Tous les services</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <div id="services" class="accordion accordion-bordered">
                        @foreach($services as $service)
                            <div class="card">
                                <div class="card-header" id="heading{{ $service->id }}">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $service->id }}" aria-expanded="{{ $loop->index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $service->id }}">
                                        <strong>{{ $service->name }}</strong>
                                    </button>
                                </div>
                                <div id="collapse{{ $service->id }}" class="collapse {{ $loop->index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $service->id }}" data-parent="#services">
                                    <div class="card-body">
                                        <p>{{ $service->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
