@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Modifier',
    'breadcrumb_icon' => 'mdi mdi-folder-search-outline',
    'breadcrumb_chain' => ['Document', 'Modifier']
])

@section('app.master.title', page_title('Modifier ce document'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Modifier ce document</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
