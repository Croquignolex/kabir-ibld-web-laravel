@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Detail',
    'breadcrumb_icon' => 'mdi mdi-email-open-outline',
    'breadcrumb_chain' => ['Outils', 'Méssages', 'Detail']
])

@section('app.master.title', page_title('Detail'))

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
                                                <strong>{{ $contact->subject }}</strong> <br>
                                                <a href="{{ route('admin.domains.show', [$contact->domain]) }}">
                                                    <span class="badge badge-primary">{{ $contact->domain->name }}</span>
                                                </a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @component('components.delete-modal', [
        'id' => 'delete-modal',
        'title' => 'Supprimer le méssage de ' . $contact->name,
        'message' => 'Vous ne pourrez plus consulter ce méssage, êtes vous sûr?',
        'route' => route('admin.contacts.destroy', [$contact])
    ])
    @endcomponent
@endsection
