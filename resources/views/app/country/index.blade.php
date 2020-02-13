@extends('layouts.app', [
    'breadcrumb_name' => 'Pays',
    'breadcrumb_icon' => 'mdi mdi-map',
    'breadcrumb_chain' => ['Outils', 'Pays']
])

@section('app.master.title', page_title('Tous les pays'))

@push('app.master.style')
    <link rel="stylesheet" href="{{ css_asset('datatables.bootstrap4.min') }}" type="text/css">
    <link rel="stylesheet" href="{{ css_asset('responsive.datatables.min') }}" type="text/css">
@endpush

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>List des pays</h2>
                </div>
                <!-- Table -->
                <div class="card-body">
                    <div class="responsive-data-table">
                        <table id="responsive-data-table" class="table dt-responsive nowrap table-bordered table-hover" style="width:100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-white">Code</th>
                                    <th class="text-white">Alpha 2</th>
                                    <th class="text-white">Alpha 3</th>
                                    <th class="text-white">Nom en Anglais</th>
                                    <th class="text-white">Nom en Francais </th>
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

@push('app.master.script')
    <script type="text/javascript">
        $(function() {
            $('#responsive-data-table').DataTable({
                "responsive": true,
                "aLengthMenu": [[20, 30, 50, 75, -1], [20, 30, 50, 75, "All"]],
                "pageLength": 20,
                "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
                language: {
                    processing:     "Traitement en cours...",
                    search:         "Rechercher&nbsp;:",
                    lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                    info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix:    "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable:     "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first:      "Premier",
                        previous:   "Pr&eacute;c&eacute;dent",
                        next:       "Suivant",
                        last:       "Dernier"
                    },
                    aria: {
                        sortAscending:  ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            });
        });
    </script>
    <script src="{{ js_asset('jquery.datatables.min') }}" type="text/javascript"></script>
    <script src="{{ js_asset('datatables.bootstrap4.min') }}" type="text/javascript"></script>
    <script src="{{ js_asset('datatables.responsive.min') }}" type="text/javascript"></script>
@endpush
