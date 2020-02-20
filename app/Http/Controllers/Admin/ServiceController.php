<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class ServiceController extends Controller
{
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
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.service.create');
    }
}
