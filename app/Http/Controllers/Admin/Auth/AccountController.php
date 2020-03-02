<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Traits\UserAccountTrait;
use App\Http\Controllers\Controller;

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
        $this->middleware('admin.auth');
    }
}
