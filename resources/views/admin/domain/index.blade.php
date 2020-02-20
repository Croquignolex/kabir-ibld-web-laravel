@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Domaines',
    'breadcrumb_icon' => 'mdi mdi-folder-search-outline',
    'breadcrumb_chain' => ['Domaines']
])

@section('app.master.title', page_title('Tous les domaines'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Tous les domaines</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <div id="domains" class="accordion accordion-bordered">
                        @foreach($domains as $domain)
                            <div class="card">
                                <div class="card-header" id="heading{{ $domain->id }}">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $domain->id }}" aria-expanded="{{ $loop->index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $domain->id }}">
                                        <strong>{{ $domain->name }}</strong>
                                    </button>
                                </div>
                                <div id="collapse{{ $domain->id }}" class="collapse {{ $loop->index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $domain->id }}" data-parent="#domains">
                                    <div class="card-body">
                                        <span class="mb-2 badge badge-primary">{{ $domain->country->fr_name }}</span>
                                        <p>{{ $domain->description }}</p>
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
