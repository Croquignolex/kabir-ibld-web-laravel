<?php

namespace App\Http\Controllers\App\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Traits\UserAccountTrait;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    use UserAccountTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('validation');
        $this->middleware('guest')->only('validation');
    }

    /**
     * @param $email
     * @param $token
     * @return RedirectResponse|Redirector
     */
    public function validation($token, $email)
    {
        $user = User::where([
            'token' => $token, 'email' => $email, 'is_confirmed' => false
        ])->first();

        if($user === null) danger_flash_message(trans('auth.error'), trans('general.bad_link'));
        else
        {
            $user->is_confirmed = true;
            $user->token = Str::random(64);
            $user->save();
            success_flash_message(trans('auth.success'),  trans('general.well_confirmed'));
        }

        return redirect(route('login'));
    }
}
