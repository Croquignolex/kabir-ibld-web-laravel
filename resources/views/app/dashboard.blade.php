@extends('layouts.app', [
    'breadcrumb_name' => 'Tableaau de bord',
    'breadcrumb_icon' => 'mdi mdi-monitor-dashboard',
    'breadcrumb_chain' => ['Tableaau de bord', 'Général']
]))

@section('app.master.title', page_title('Tableau de board'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Général</h2>
                </div>
                <!-- body -->
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
