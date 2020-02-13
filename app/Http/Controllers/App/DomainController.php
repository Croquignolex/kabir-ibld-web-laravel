<?php

namespace App\Http\Controllers\App;

use App\Models\Domain;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class DomainController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $domains = Domain::all();
        return view('app.domain.index', compact('domains'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('app.domain.create');
    }
}
