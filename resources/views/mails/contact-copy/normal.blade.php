@extends('layouts.mail')

@section('head', mb_strtoupper($msg->subject))

@section('body')
    <tr>
        <td>
            <p style="text-align: justify;">
                Ceci est la copie du mail que vous avez envoyés aux administrateurs
                de {{ config('app.name') }} dépuis la page de contact.
            </p>
            <p style="text-align: justify;">
                <strong style="color: #0e2076;">Nom:</strong> {{ $msg->name }}<br />
                <strong style="color: #0e2076;">Email:</strong> {{ $msg->email }}<br />
                <strong style="color: #0e2076;">Sujet:</strong> {{ $msg->subject }}
            </p>
            <p style="text-align: justify; border: 1px solid #0e2076; padding: 10px">
                <strong>Méssage:</strong>
                {{ $msg->message }}
            </p>
        </td>
    </tr>
@endsection
