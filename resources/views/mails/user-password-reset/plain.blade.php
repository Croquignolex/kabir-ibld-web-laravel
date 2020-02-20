{{ mb_strtoupper(trans('auth.reset_pwd')) }}


@lang('mail.top_password_reset_msg', ['name' => $user->format_first_name]).

@lang('mail.body_password_reset_msg' , ['date' => $user->long_created_date]).

<a href="{{ $user->reset_link }}" target="_blank">@lang('mail.reset_my_password')</a>

@lang('mail.bottom_register_msg', ['contact' => config('app.email')]).

Merci
&copy; 2018 {{ config('app.name') }}, Tous droits réservés.

