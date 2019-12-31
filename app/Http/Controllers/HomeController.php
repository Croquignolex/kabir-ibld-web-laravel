<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use App\Traits\ErrorFlashMessagesTrait;

class HomeController extends Controller
{
    use ErrorFlashMessagesTrait;

    /**
     * @return Factory|View
     */
    public function __invoke()
    {
        try
        {
            // Fetch data from database
        }
        catch (Exception $exception)
        {
            $this->databaseError($exception);
        }
        return view('home');
    }
}
