<?php

namespace App\Http\Controllers\App\Auth;

use Exception;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Mail\UserPasswordResetMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Traits\ResetPasswordUserTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    const RESET_LINK_NOT_SENT = 'error';

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails, ResetPasswordUserTrait;

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
     * Display the form to request a password reset link.
     *
     * @return Factory|View
     */
    public function showLinkRequestForm()
    {
        return view('auth.app.passwords.email');
    }

    /**
     * @param ForgotPasswordRequest $request
     * @return JsonResponse|RedirectResponse
     */
    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Send a password reset link to a user.
     *
     * @param  array  $credentials
     * @return string
     */
    protected function sendResetLink(array $credentials)
    {
        // First we will check to see if we found a user at the given credentials and
        // if we did not we will redirect back to this current URI with a piece of
        // "flash" data in the session to indicate to the developers the errors.
        $user = $this->getUser($credentials);

        if (is_null($user)) {
            return Password::INVALID_USER;
        }

        // Once we have the reset token, we are ready to send the message out to this
        // user with a link to reset their password. We will then redirect back to
        // the current URI having nothing set in the session to indicate errors.

        return $this->SendResetEmail($user) ? Password::RESET_LINK_SENT :
            ForgotPasswordController::RESET_LINK_NOT_SENT;
    }

    /**
     * @param User $user
     * @return bool
     */
    protected function SendResetEmail(User $user)
    {
        if($user->password_reset === null) $user->password_reset()->create(['token' => Str::random(64)]);
        else $user->password_reset()->update(['token' => Str::random(64)]);

        try
        {
            Mail::to($user->email)->send(new UserPasswordResetMail($user));
            return true;
        }
        catch (Exception $exception) { return false; }
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return RedirectResponse|JsonResponse
     */
    protected function sendResetLinkResponse($response)
    {
        info_flash_message(trans('auth.info'), trans($response));
        return back()->with('status', trans($response));
    }

    /**
     * @param Request $request
     * @param $response
     * @return RedirectResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if($response !== ForgotPasswordController::RESET_LINK_NOT_SENT)
            danger_flash_message(trans('auth.error'), trans($response));
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }
}
