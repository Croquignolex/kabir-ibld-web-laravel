@extends('layouts.app')

@section('app.master.title', page_title('Tableau de board'))

@section('app.master.body')
    <a class="nav-link logout" href="javascript: void(0);" role="button" data-placement="bottom"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       data-content="Déconnexion" data-trigger="hover" data-toggle="popover">
        <i class="fa fa-power-off"></i>
        Déconnexion
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection
