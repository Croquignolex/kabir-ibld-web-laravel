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
                        <button class="btn btn-sm btn-primary" data-toggle="popover"
                                title="Description" data-content="{{ $document->description }}">
                            ...
                        </button>
                        <a class="btn btn-sm btn-warning text-white" title="Modifier"
                            href="{{ route('admin.documents.edit', [$document]) }}">
                            <i class="mdi mdi-square-edit-outline"></i>
                        </a>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" title="Supprimer"
                                data-target="#delete-document-modal-{{ $document->id }}">
                            <i class="mdi mdi-trash-can-outline"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @component('components.delete-modal', [
            'id' => 'delete-document-modal-' . $document->id,
            'title' => 'Supprimer ' . $document->name,
            'message' => 'Vous ne pourrez plus consulter ce document, êtes vous sûr?',
            'route' => route('admin.documents.destroy', [$document])
        ])
        @endcomponent
    @empty
        <div class="text-center col-12">
            <div class="alert alert-primary text-primary" role="alert">
                Pas de documents disponible
            </div>
        </div>
    @endforelse
</div>