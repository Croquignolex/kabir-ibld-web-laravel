<?php

namespace App\Http\Controllers\App\Auth;

use Exception;
use App\Models\Role;
use Illuminate\View\View;
use App\Mail\UserRegisterMail;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

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
     * Show the application registration form.
     *
     * @return Factory|View
     */
    public function showRegistrationForm()
    {
        return view('auth.app.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse|Redirector
     */
    public function register(RegisterRequest $request)
    {
        $user = Role::where('type', Role::USER)->first()->users()->create([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name')
        ]);

        try
        {
            Mail::to($user->email)->send(new UserRegisterMail($user));
            success_flash_message(trans('auth.success'), trans('auth.registration_message'));
        }
        catch (Exception $exception)
        {
            $user->delete();
            danger_flash_message(trans('auth.error'), 'Erreur du serveur de mail, veillez réessayer plus tard ou contacter l\'administrateur');
        }

        return redirect(route('register'));
    }
}
