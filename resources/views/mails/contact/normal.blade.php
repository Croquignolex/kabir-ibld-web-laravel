@extends('layouts.mail')

@section('head', mb_strtoupper($subject))

@section('body')
    <tr>
        <td>
            <p style="text-align: justify;">
                Bonjour,<br>
                Ce méssage vous à été envoyé dépuis {{ config('app.name') }} le
                <span style="color: #1a8cff;">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span>.
                Voici les détails de ce méssage:
            </p>
            <p style="text-align: justify;">
                @if($domain !== null)
                    <strong style="color: #0e2076;">Domaine:</strong>
                    <span class="badge badge-pill badge-primary">{{ $domain }}</span><br />
                @endif
                <strong style="color: #0e2076;">Nom:</strong> {{ $name }}<br />
                <strong style="color: #0e2076;">Email:</strong> {{ $email }}<br />
                <strong style="color: #0e2076;">Sujet:</strong> {{ $subject }}
            </p>
            <p style="text-align: justify; border: 1px solid #0e2076; padding: 10px">
                <strong>Méssage:</strong>
                {{ $msg }}
            </p>
        </td>
    </tr>
@endsection

