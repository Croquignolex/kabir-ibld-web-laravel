{{ mb_strtoupper(trans('auth.account_validation')) }}

@lang('mail.top_register_msg', ['name' => $user->format_first_name]).

@lang('mail.body_register_msg' , ['date' => $user->created_date]).

{{ $user->confirmation_link }}

@lang('mail.bottom_register_msg', ['contact' => config('app.email')]).

Merci
&copy; 2018 {{ config('app.name') }}, @lang('general.right').
