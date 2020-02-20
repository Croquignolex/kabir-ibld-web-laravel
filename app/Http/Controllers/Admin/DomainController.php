<?php

namespace App\Http\Controllers\Admin;

use App\Models\Domain;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class DomainController extends Controller
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
        $domains = Domain::all();
        return view('admin.domain.index', compact('domains'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.domain.create');
    }

    /**
     * @param Request $request
     * @param Domain $domain
     * @return Factory|View
     */
    public function show(Request $request, Domain $domain)
    {
        return view('admin.domain.show', compact('domain'));
    }
}
