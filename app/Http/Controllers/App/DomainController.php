<?php

namespace App\Http\Controllers\App;

use App\Models\Role;
use Exception;
use App\Models\Domain;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use App\Http\Requests\DomainRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;

class DomainController extends Controller
{
    /**
     * DomainController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $domains = Domain::all()->sortByDesc('updated_at');
        return view('app.domain.index', compact('domains'));
    }

    /**
     * @return Factory|View
     */
    public function subscribed()
    {
        $domains = Domain::all()->sortByDesc('updated_at')->filter(function (Domain $domain) {
            return !$domain->can_subscribe && $domain->can_show;
        });

        return view('app.domain.subscribed', compact('domains'));
    }

    /**
     * @param Domain $domain
     * @return Factory|View
     */
    public function show(Domain $domain)
    {
        return view('app.domain.show', compact('domain'));
    }

    /**
     * @param Request $request
     * @param Domain $domain
     * @return RedirectResponse
     */
    public function subscribe(Request $request, Domain $domain)
    {
        $validator = Validator::make($request->all(), [
            'reason-' . $domain->id => 'required|string|min:2',
        ]);

        if ($validator->fails()) {
            danger_flash_message(trans('auth.error'), 'Vous devez donner une raison pour pouvoir souscrire au domaine ' . $domain->name);
            return back()->withErrors($validator)->withInput();
        }

        if($domain->can_subscribe)
        {
            Auth::user()->domains()->attach($domain, ['reason' => $request->input('reason-' . $domain->id)]);
            toast_message('Souscription au domaine en attente de confirmation');
        }
        else toast_message('Vous ne pouvez pas souscrire à ce domaine');

        return back();
    }
}
