<div class="row">
    @forelse($contributors as $contributor)
        <div class="col-lg-6 col-xl-4">
            <div class="card card-default p-4">
                <a href="javascript:void(0)" class="media text-secondary">
                    <img src="{{ $contributor->src }}" class="mr-3 img-fluid rounded" alt="..." width="100px" height="100px">
                    <div class="media-body">
                        <h5 class="mt-0 mb-2 text-dark">{{ $contributor->name }}</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex mb-1">
                                <i class="mdi mdi-map mr-1"></i>
                                <span>{{ $contributor->address }}</span>
                            </li>
                            <li class="d-flex mb-1">
                                <i class="mdi mdi-email mr-1"></i>
                                <span>{{ $contributor->email }}</span>
                            </li>
                            <li class="d-flex mb-1">
                                <i class="mdi mdi-phone mr-1"></i>
                                <span>{{ $contributor->phone }}</span>
                            </li>
                            @if(!($domain_page ?? false))
                                <li class="d-flex mb-1">
                                    <i class="mdi mdi-folder-multiple-outline mr-1"></i>
                                    <span class="badge badge-primary">{{ $contributor->domain->name }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </a>
                <div class=" mt-2">
                    <button class="btn btn-sm btn-primary" data-toggle="popover"
                            title="Description" data-content="{{ $contributor->description }}">
                        ...
                    </button>
                    <a class="btn btn-warning btn-sm text-white" title="Modifier"
                       href="{{ route('admin.contributors.edit', [$contributor]) }}">
                        <i class="mdi mdi-square-edit-outline"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" title="Supprimer"
                            data-target="#delete-contributor-modal-{{ $contributor->id }}">
                        <i class="mdi mdi-trash-can-outline"></i>
                    </button>
                </div>
            </div>
        </div>
        @component('components.delete-modal', [
            'id' => 'delete-contributor-modal-' . $contributor->id,
            'title' => 'Supprimer ' . $contributor->name,
            'message' => 'Vous ne pourrez plus consulter cet intervenant, les documents, les intervenants et les messages associés, êtes vous sûr?',
            'route' => route('admin.contributors.destroy', [$contributor])
        ])
        @endcomponent
    @empty
        <div class="text-center col-12">
            <div class="alert alert-primary text-primary" role="alert">
                Pas d'intervenants disponible
            </div>
        </div>
    @endforelse
</div>
