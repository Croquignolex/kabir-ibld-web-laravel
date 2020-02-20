<?php

namespace App\Http\Controllers\App;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('app.dashboard');
    }
}
