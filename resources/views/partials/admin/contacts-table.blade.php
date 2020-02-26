<div class="responsive-data-table">
    <table id="responsive-data-table" class="table dt-responsive nowrap table-bordered table-hover" style="width:100%">
        <thead class="bg-primary">
        <tr>
            <th class="text-white">Nom</th>
            <th class="text-white">Email</th>
            <th class="text-white">Sujet</th>
            @if(!($domain_page ?? false))<th class="text-white">Domaine</th>@endif
            <th class="text-white">Date</th>
            <th class="text-white">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                @if(!($domain_page ?? false))
                    <td>
                        @if($contact->domain !== null)
                            <a href="{{ route('admin.domains.show', [$contact->domain]) }}">
                                <span class="badge badge-primary">{{ $contact->domain->name }}</span>
                            </a>
                        @endif
                    </td>
                @endif
                <td>{{ $contact->created_date }}</td>
                <td class="text-right">
                    <a class="btn btn-primary btn-sm" title="Détails"
                       href="{{ route('admin.contacts.show', [$contact]) }}">
                        <i class="mdi mdi-eye-outline"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" title="Supprimer"
                            data-target="#delete-contact-modal-{{ $contact->id }}">
                        <i class="mdi mdi-trash-can-outline"></i>
                    </button>
                </td>
                @component('components.delete-modal', [
                    'id' => 'delete-contact-modal-' . $contact->id,
                    'title' => 'Supprimer le méssage de ' . $contact->name,
                    'message' => 'Vous ne pourrez plus consulter ce méssage et les réponses associés, êtes vous sûr?',
                    'route' => route('admin.contacts.destroy', [$contact])
                ])
                @endcomponent
            </tr>
        @endforeach
        </tbody>
    </table>
</div>