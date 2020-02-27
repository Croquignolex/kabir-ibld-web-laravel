<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class AccountController extends Controller
{
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

    public function edit()
    {
        return view('auth.admin.login');
    }

    public function update()
    {
        return view('auth.admin.login');
    }

    public function password()
    {
        return view('auth.admin.login');
    }

    public function changePassword()
    {
        return view('auth.admin.login');
    }
}
