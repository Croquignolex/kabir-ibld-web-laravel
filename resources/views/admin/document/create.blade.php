@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Documents',
    'breadcrumb_icon' => 'mdi mdi mdi-file-find-outline',
    'breadcrumb_chain' => ['Documents', 'Nouveau']
])

@section('app.master.title', page_title('Nouveau document'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Nouveau document</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
