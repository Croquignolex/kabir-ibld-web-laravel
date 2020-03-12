{{ mb_strtoupper($subject) }}

Bonjour,
Ce méssage vous à été envoyé dépuis {{ config('app.name') }} le
{{ \Carbon\Carbon::now()->format('d/m/Y') }}.
Voici les détails de ce méssage:

@if($domain !== null) Domaine: {{ $domain }} @endif
Nom: {{ $name }}
Email: {{ $email }}
Sujet: {{ $subject }}
Méssage: {{ $msg }}

Merci
&copy; 2018 {{ config('app.name') }}, @lang('general.right').
