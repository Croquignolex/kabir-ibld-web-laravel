<?php

namespace App\Http\Controllers\App;

use Exception;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use App\Traits\ErrorFlashMessagesTrait;

class DashboardController extends Controller
{
    use ErrorFlashMessagesTrait;

    /**
     * @return Factory|View
     */
    public function index()
    {
        try
        {
            // Fetch data from database
        }
        catch (Exception $exception)
        {
            $this->databaseError($exception);
        }
        return view('app.dashboard');
    }
}
