<?php

namespace App\Http\Controllers\App;

use Exception;
use App\Models\Country;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use App\Traits\ErrorFlashMessagesTrait;

class CountryController extends Controller
{
    use ErrorFlashMessagesTrait;

    /**
     * @return Factory|View
     */
    public function index()
    {
        $countries = [];
        try
        {
            $countries = Country::all();
        }
        catch (Exception $exception)
        {
            $this->databaseError($exception);
        }
        return view('app.country.index', compact('countries'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        try
        {
            // Fetch data from database
        }
        catch (Exception $exception)
        {
            $this->databaseError($exception);
        }
        return view('app.country.create');
    }
}
