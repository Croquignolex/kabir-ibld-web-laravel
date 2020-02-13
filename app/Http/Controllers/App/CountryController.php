<?php

namespace App\Http\Controllers\App;

use App\Models\Country;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class CountryController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $countries = Country::all();
        return view('app.country.index', compact('countries'));
    }
}
