@extends('layouts.app', [
    'breadcrumb_name' => 'Domaines',
    'breadcrumb_icon' => 'mdi mdi-folder-plus-outline',
    'breadcrumb_chain' => ['Domaines', 'Nouveau domaine']
])

@section('app.master.title', page_title('Nouveau domaine'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Nouveau domaine</h2>
                </div>
                <!-- body -->
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
