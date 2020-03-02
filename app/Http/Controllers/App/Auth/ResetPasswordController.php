<?php

namespace App\Http\Controllers\App\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Traits\ResetPasswordUserTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords, ResetPasswordUserTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param $token
     * @return Factory|View
     */
    public function showResetForm($token)
    {
        return view('auth.app.passwords.reset', compact('token'));
    }

    public function reset(ResetPasswordRequest $request)
    {
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->resetProcess($this->credentials($request));
        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if($response == Password::PASSWORD_RESET) return $this->sendResetResponse($response);
        else return $this->sendResetFailedResponse($request, $response);
    }

    /**
     * Reset the password for the given token.
     *
     * @param  array $credentials
     * @return mixed
     */
    protected function resetProcess(array $credentials)
    {
        // If the responses from the validate method is not a user instance, we will
        // assume that it is a redirect and simply return it from this method and
        // the user is properly redirected having an error message on the post.
        if (is_null($user = $this->getUser($credentials))) {
            return Password::INVALID_USER;
        }

        if (is_null($user = $this->getTokenUser($credentials))) {
            return Password::INVALID_TOKEN;
        }

        // Once the reset has been validated, we'll call the given callback with the
        // new password. This gives the user an opportunity to store the password
        // in their persistent storage. Then we'll delete the token and return.
        $this->resetPassword($user, $credentials['password']);

        return Password::PASSWORD_RESET;
    }

    /**
     * @param array $credentials
     * @return null
     */
    protected function getTokenUser(array $credentials)
    {
        $user = $this->getUser($credentials);
        if(!is_null($user))
        {
            if($user->password_reset !== null)
            {
                if($user->password_reset->token === $credentials['token']) {
                    $user->password_reset->delete();
                    return $user;
                }
            }
        }

        return null;
    }

    /**
     * @param $user
     * @param $password
     */
    protected function resetPassword(User $user, $password)
    {
        $user->update(['password' => Hash::make($password)]);
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  string  $response
     * @return RedirectResponse|JsonResponse
     */
    protected function sendResetResponse($response)
    {
        success_flash_message(trans('auth.success'), trans($response));
        return redirect(route('login'));
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  Request  $request
     * @param  string  $response
     * @return RedirectResponse|JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        danger_flash_message(trans('auth.error'), trans($response));
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }
}
