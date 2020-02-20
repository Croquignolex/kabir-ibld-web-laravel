@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Pays',
    'breadcrumb_icon' => 'mdi mdi-flag',
    'breadcrumb_chain' => ['Outils', 'Pays']
])

@section('app.master.title', page_title('Tous les pays'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>List des pays</h2>
                </div>
                <!-- Table -->
                <div class="card-body">
                    <a href="{{ route('admin.countries.create') }}"
                        class="btn btn-primary mb-2">
                        <i class="mdi mdi-flag-plus"></i>
                        Ajouter un pays
                    </a>
                    <div class="responsive-data-table">
                        <table id="responsive-data-table" class="table dt-responsive nowrap table-bordered table-hover" style="width:100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-white">Code</th>
                                    <th class="text-white">Alpha 2</th>
                                    <th class="text-white">Alpha 3</th>
                                    <th class="text-white">Nom en Anglais</th>
                                    <th class="text-white">Nom en Francais </th>
                                    <th class="text-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $country)
                                    <tr>
                                        <td>{{ $country->code }}</td>
                                        <td>{{ $country->alpha_2 }}</td>
                                        <td>{{ $country->alpha_3 }}</td>
                                        <td>{{ $country->en_name }}</td>
                                        <td>{{ $country->fr_name }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-warning btn-sm text-white" href="{{ route('admin.countries.edit', [$country]) }}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                                Modifier
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete-modal-{{ $country->id }}">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                                Supprimer
                                            </button>
                                        </td>
                                        @component('components.delete-modal', [
                                            'id' => 'delete-modal-' . $country->id,
                                            'title' => 'Supprimer ' . $country->fr_name,
                                            'message' => 'Vous ne pourrez plus consulter ce pays, êtes vous sûr?',
                                            'route' => route('admin.countries.destroy', [$country])
                                        ])
                                        @endcomponent
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.table-page-push')
