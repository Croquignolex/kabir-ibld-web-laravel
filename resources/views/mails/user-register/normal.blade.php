@extends('layouts.mail')

@section('head', mb_strtoupper(trans('auth.account_validation')))

@section('body')
    <tr>
        <td>
            <p style="text-align: justify;">
                <strong>
                    @lang('mail.top_register_msg', ['name' => $user->format_first_name]).
                </strong>
            </p>
            <p style="text-align: justify;">
                @lang('mail.body_register_msg' , ['date' => $user->created_date]).
            </p>
            <div style="text-align: center;">
                <a href="{{ $user->confirmation_link }}" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4c84ff; text-decoration:none;" target="_blank">
                    @lang('mail.validate_my_account')
                </a>
            </div>
            <p style="text-align: justify;">
                @lang('mail.bottom_register_msg', ['contact' => config('app.email')]).
            </p>
        </td>
    </tr>
@endsection
