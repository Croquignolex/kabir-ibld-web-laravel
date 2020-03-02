<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileManageTrait;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    use FileManageTrait;

    /**
     * DomainController constructor.
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
        $users = User::where('id', '<>', Auth::user()->id)->get()->sortByDesc('updated_at');
        return view('admin.user.index', compact('users'));
    }

    /**
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'last_name' => 'required|string|min:2|max:255',
            'first_name' => 'required|string|min:2|max:255',
            'email' => 'required|string|min:2|max:255|email|unique:users',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $file = $this->storeFile($request, User::FOLDER);

        Role::where('type', Role::USER)->first()->users()->create([
            'file' =>  $file->name,
            'extension' => $file->extension,
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make('fogadac'),
            'country' => $request->input('country'),
            'address' => $request->input('address'),
            'last_name' => $request->input('last_name'),
            'post_code' => $request->input('post_code'),
            'profession' => $request->input('profession'),
            'first_name' => $request->input('first_name'),
            'description' => $request->input('description'),
        ]);

        toast_message('Utilisateur enrégistré avec succès. Mot de passe par défaut est: fodagac');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(User $user)
    {
        if($user->can_delete_user)
        {
            $user->delete();
            toast_message('Utilisateur supprimé avec succès');
        }
        else toast_message('Vous ne pouvez pas supprimer cet utilisateur');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function grantAdmin(User $user)
    {
        if($user->can_grant_admin_user)
        {
            $user->update(['role_id' => Role::where('type', Role::ADMIN)->first()->id]);
            toast_message('Utilisateur nommé administrateur avec succès');
        }
        else toast_message('Vous ne pouvez pas nommer administrateur cet utilisateur');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function grantSuperAdmin(User $user)
    {
        if($user->can_grant_super_admin_user)
        {
            $user->update(['role_id' => Role::where('type', Role::SUPER_ADMIN)->first()->id]);
            toast_message('Utilisateur nommé super administrateur avec succès');
        }
        else toast_message('Vous ne pouvez pas nommer super administrateur cet utilisateur');

        return back();
    }
}
