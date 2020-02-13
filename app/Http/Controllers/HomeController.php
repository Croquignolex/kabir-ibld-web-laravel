<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;

class HomeController extends Controller
{
    /**
     * @return Factory|View
     */
    public function __invoke()
    {
        $domains = Domain::all();
        return view('home', compact('domains'));
    }
}
