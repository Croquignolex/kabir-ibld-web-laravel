<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileManageTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    use FileManageTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('auth.admin.account');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Auth::user()->update($request->except(['role_id', 'email']));
        toast_message('Profil mis à jour avec succès');
        return back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:6|max:255',
            'password' => 'required|string|min:6|max:255|confirmed'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $old_password = $request->input('old_password');
        $password = $request->input('password');

        if($old_password === $password)
        {
            toast_message('Vous devez choisir un mot de passe different');
            return back()->withErrors($validator)->withInput();
        }
        else if(!Hash::check($old_password, $user->password))
        {
            toast_message('Ancien mot de passe incorrect');
            return back()->withErrors($validator)->withInput();
        }
        $user->update(['password' => Hash::make($password)]);
        toast_message('Mot de passe mis à jour avec succès');
        return back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function changeAvatar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:10000'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $file = $this->storeFile($request, User::FOLDER, $user);

        $user->update([
            'file' =>  $file->name,
            'extension' => $file->extension
        ]);
        toast_message('Photo de profile mise à jour avec succès');
        return back();
    }
}
