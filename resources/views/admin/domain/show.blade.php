@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Détails',
    'breadcrumb_icon' => 'mdi mdi-folder-search-outline',
    'breadcrumb_chain' => ['Domaines', 'Détails']
])

@section('app.master.title', page_title('Détail du domaine'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Détail du domaine</h2>
                </div>
                <!-- body -->
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
