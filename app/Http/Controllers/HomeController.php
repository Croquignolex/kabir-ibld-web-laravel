<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\View\View;
use App\Traits\RequestTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $domains = Domain::all();
        $services = Service::all();
        $setting = Setting::all()->first();
        return view('home', compact('domains', 'services', 'setting'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function contact(Request $request)
    {
        $returnRoute = route('home') . '#contact';

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|min:2|max:255|email',
            'name' => 'required|string|min:2|max:255',
            'subject' => 'required|string|min:2|max:255',
            'message' =>'required|string|min:2|max:510',
        ]);

        if ($validator->fails()) {
            return redirect($returnRoute)->withErrors($validator)->withInput();
        }

        Contact::create($request->all());
        toast_message('Méssage envoyé avec succès');
        return redirect($returnRoute);
    }
}
