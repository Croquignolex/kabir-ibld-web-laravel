@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Detail',
    'breadcrumb_icon' => 'mdi mdi-email-open-outline',
    'breadcrumb_chain' => ['Outils', 'Méssages', 'Detail']
])

@section('app.master.title', page_title('Detail'))

@push('app.master.style')
    <link rel="stylesheet" href="{{ css_asset('datatables.bootstrap4.min') }}" type="text/css">
    <link rel="stylesheet" href="{{ css_asset('responsive.datatables.min') }}" type="text/css">
@endpush

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Détail du méssage</h2>
                </div>
                <!-- Table -->
                <div class="card-body">
                    <div class="row bg-white no-gutters chat">
                        <div class="col-12">
                            <!-- Chats -->
                            <div class="chat-right-side">
                                <div class="media media-chat align-items-center mb-0 media-chat-header" href="#">
                                    <div class="media-body w-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="heading-title mb-0 text-dark">
                                                {{ "$contact->name <$contact->email>" }} <br>
                                                <strong>{{ $contact->subject }}</strong>
                                            </h4>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#"
                                                       data-toggle="modal" data-target="#delete-modal">
                                                        Supprimer cette conversation</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="chat-right-content" id="chat-right-content">
                                    <div class="media media-chat media-left">
                                        <div class="media-body">
                                            <p class="message">{{ $contact->message }}</p>
                                            <div class="date-time">{{ $contact->created_date }}</div>
                                        </div>
                                    </div>

                                    @foreach($contact->answers as $answer)
                                        <div class="media media-chat media-right">
                                            <div class="media-body">
                                                <p class="message bg-primary text-white">{{ $answer->message }}</p>
                                                <div class="date-time">{{ $answer->created_date }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <form method="POST" class="px-5 py-2" action="{{ route('admin.contacts.answer', [$contact]) }}">
                                    {{ csrf_field() }}
                                    <label for="answer">
                                        @if ($errors->has('answer'))
                                            <span class="text-danger">
                                                {{ $errors->first('answer') }}
                                            </span>
                                        @endif
                                    </label>
                                    <input type="text" class="form-control mb-3" value="{{ old('answer') }}"
                                           placeholder="Entrer une réponse" name="answer" id="answer">
                                </form>

                                <form id="delete-message" action="{{ route('admin.contacts.destroy', [$contact]) }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel}">
                        Supprimer ce méssage.
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-danger text-white">
                    Vous ne pourrez plus consulter ce méssage,
                    êtes vous sûr?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="mdi mdi-thumb-down-outline"></i>
                        Non
                    </button>
                    <button type="button" class="btn btn-danger"  onclick="document.getElementById('delete-message').submit();">
                        <i class="mdi mdi-thumb-up-outline"></i>
                        Oui
                    </button>
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
