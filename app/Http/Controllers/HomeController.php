<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Domain;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\View\View;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
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
        $setting = Setting::all()->first();
        $domains = Domain::all()->sortByDesc('created_at');
        $services = Service::all()->sortByDesc('created_at');
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
            'name' => 'required|string|min:2|max:255',
            'message' =>'required|string|min:2|max:510',
            'subject' => 'required|string|min:2|max:255',
            'email' => 'required|string|min:2|max:255|email',
        ]);

        if ($validator->fails()) {
            return redirect($returnRoute)->withErrors($validator)->withInput();
        }

        try
        {
            Contact::create($request->all());
            if($request->input('copy') !== null)
            {
                Mail::to($request->input('email'))
                        ->send(new ContactMail(
                            $request->input('name'),
                            $request->input('email'),
                            $request->input('subject'),
                            $request->input('message'),
                            null
                        )
                    );
            }
            toast_message('Méssage envoyé avec succès');
        } catch (Exception $ex) {
            toast_message('Erreur du serveur de mail');
        }

        return redirect($returnRoute);
    }
}
