<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Service;
use App\Models\Setting;
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
        $services = Service::all();
        $setting = Setting::all()->first();
        return view('home', compact('domains', 'services', 'setting'));
    }
}
