@php
    $user = \Illuminate\Support\Facades\Auth::user();
    $contactService = new \App\Services\ContactService();
    $contactsNumber = $contactService->getContactsNumber();
@endphp
<div class="navbar-right">
    <ul class="nav navbar-nav">
        {{--<li class="dropdown notifications-menu">
            <button class="dropdown-toggle" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                --}}{{--<i class="mdi mdi-bell-ring text-danger"></i>
                <small class="very-small">(2)</small>--}}{{--
            </button>
            <!-- Notifications area -->
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="m-3"></li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-account-plus"></i> notification
                        <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                    </a>
                </li>
                <li class="dropdown-footer">
                    <a class="text-center" href="#">Tous voir</a>
                </li>
            </ul>
        </li>--}}
        <li class="dropdown notifications-menu">
            <button class="dropdown-toggle" data-toggle="dropdown">
                @if($contactsNumber === 0)
                    <i class="mdi mdi-email-open-outline"></i>
                @else
                    <i class="mdi mdi-email text-danger"></i>
                    <small class="very-small">({{ $contactsNumber }})</small>
                @endif
            </button>
            <!-- Notifications area -->
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="m-3"></li>
                @foreach($contactService->getContacts() as $contact)
                    <li class="{{ $contact->viewed ? '' : 'bg-light' }}">
                        <a href="{{ route('admin.contacts.show', [$contact])  }}">
                            <small>
                                @if($contact->domain !== null)
                                    <span class="mb-2 badge badge-primary">{{ text_format($contact->domain->name, 10) }}</span>
                                @endif
                                <span class="mb-2 badge badge-secondary">{{ text_format($contact->name, 10) }}</span>
                            </small><br>
                            {{ text_format($contact->subject, 20) }}
                            <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> {{ $contact->created_date }}</span>
                        </a>
                    </li>
                @endforeach
                <li class="dropdown-footer">
                    <a class="text-center" href="{{ route('admin.contacts.index') }}">Tous voir</a>
                </li>
            </ul>
        </li>
        <!-- User Account -->
        <li class="dropdown user-menu">
            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <img src="{{ $user->avatar_src }}" class="user-image" alt="User Image" />
                <span class="d-none d-lg-inline-block">{{ $user->format_first_name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
                <!-- User image -->
                <li class="dropdown-header">
                    <img src="{{ $user->avatar_src }}" class="img-circle" alt="User Image" />
                    <div class="d-inline-block">
                        {{ text_format($user->format_full_name, 20) }}
                        <small class="pt-1">{{ text_format($user->email, 25) }}</small>
                    </div>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-account"></i> Mon Profil
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-settings"></i> Paramètres
                    </a>
                </li>
                <li class="dropdown-footer">
                    <a class="nav-link logout" href="javascript: void(0);" role="button" data-placement="bottom"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       data-content="Déconnexion" data-trigger="hover" data-toggle="popover">
                        <i class="mdi mdi-logout"></i>
                        Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</div>
