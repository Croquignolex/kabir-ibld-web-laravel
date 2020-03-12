{{ mb_strtoupper($msg->subject) }}

Ceci est la copie du mail que vous avez envoyés aux administrateurs
de {{ config('app.name') }} dépuis la page de contact.

Nom: {{ $msg->name }}
Email: {{ $msg->email }}
Sujet: {{ $msg->subject }}
Méssage: {{ $msg->message }}

Merci
&copy; 2018 {{ config('app.name') }}, @lang('general.right').
