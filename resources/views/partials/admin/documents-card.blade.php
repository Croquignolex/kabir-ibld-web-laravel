@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
<div class="row">
    @forelse($documents as $document)
        <div class="col-sm-12 col-lg-6 col-xl-3 mb-2">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-primary border-bottom border-primary">{{ $document->code }}</h6>
                    <img class="card-img-top rounded mb-2" src="{{ $document->src }}" alt="..."/>
                    <p class="card-text pb-2">{{ $document->name }}</p>
                    @if(!($domain_page ?? false))
                        <a href="{{ route('admin.domains.show', [$document->domain]) }}">
                            <span class="badge badge-primary">{{ $document->domain->name }}</span>
                        </a>
                    @endif
                    <div class="border-top border-primary text-right mt-2 pt-2">
                        @if($document->can_download)
                            <button class="btn btn-sm btn-info" title="Téléchargement"
                                    onclick="document.getElementById('{{ $document->id }}-download-form').submit();">
                                <i class="mdi mdi-download"></i>
                            </button>
                        @endif
                        <button class="btn btn-sm btn-primary" title="Datails"
                                data-toggle="modal" data-target="#detail-document-modal-{{ $document->id }}">
                            <i class="mdi mdi-eye"></i>
                        </button>
                        @if($user->role->type !== \App\Models\Role::USER)
                            <a class="btn btn-sm btn-warning text-white" title="Modifier"
                                href="{{ route('admin.documents.edit', [$document]) }}">
                                <i class="mdi mdi-square-edit-outline"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" title="Supprimer"
                                    data-target="#delete-document-modal-{{ $document->id }}">
                                <i class="mdi mdi-trash-can-outline"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="detail-document-modal-{{ $document->id }}" tabindex="-1" role="dialog" aria-labelledby="label-detail-document-modal-{{ $document->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="label-detail-document-modal-{{ $document->id }}">
                            Description de {{ $document->name }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="pre-scrollable text-justify">
                            {{ $document->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @if($user->role->type !== \App\Models\Role::USER)
            @component('components.delete-modal', [
                'id' => 'delete-document-modal-' . $document->id,
                'title' => 'Supprimer ' . $document->name,
                'message' => 'Vous ne pourrez plus consulter ce document, êtes vous sûr?',
                'route' => route('admin.documents.destroy', [$document])
            ])
            @endcomponent
        @endif
        <form id="{{ $document->id }}-download-form" action="{{ route('admin.documents.download', [$document]) }}" method="POST" class="hidden">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    @empty
        <div class="text-center col-12">
            <div class="alert alert-primary text-primary" role="alert">
                Pas de documents disponible
            </div>
        </div>
    @endforelse
</div>
