{{ mb_strtoupper($msg->subject) }}

Nom: {{ $msg->name }}
Email: {{ $msg->email }}
Sujet: {{ $msg->subject }}
Méssage: {{ $msg->message }}

Réponse: {{ $answer }}

Merci
&copy; 2018 {{ config('app.name') }}, @lang('general.right').
