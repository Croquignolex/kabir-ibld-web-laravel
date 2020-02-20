@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Nouveau',
    'breadcrumb_icon' => 'mdi mdi-database-plus',
    'breadcrumb_chain' => ['Services', 'Nouveau']
])

@section('app.master.title', page_title('Nouveau service'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Nouveau service</h2>
                </div>
                <!-- body -->
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
