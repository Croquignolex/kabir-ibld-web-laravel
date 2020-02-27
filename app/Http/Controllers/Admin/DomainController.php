<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Domain;
use App\Models\Country;
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
        $this->middleware('admin.auth');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $domains = Domain::all()->sortByDesc('updated_at');
        return view('admin.domain.index', compact('domains'));
    }

    /**
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function create()
    {
        $countries = Country::all()->sortByDesc('updated_at');
        if($countries->count() == 0)
        {
            toast_message('Vous ne pouvez pas créer de domaine sans pays');
            return back();
        }
        return view('admin.domain.create', compact('countries'));
    }

    /**
     * @param DomainRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(DomainRequest $request)
    {
        Domain::create($request->all());
        toast_message('Domaine enrégistré avec succès');
        return redirect(route('admin.domains.index'));
    }

    /**
     * @param Domain $domain
     * @return Factory|View
     */
    public function show(Domain $domain)
    {
        return view('admin.domain.show', compact('domain'));
    }

    /**
     * @param Domain $domain
     * @return Factory|View
     */
    public function edit(Domain $domain)
    {
        $countries = Country::all()->sortByDesc('updated_at');
        return view('admin.domain.edit', compact('domain', 'countries'));
    }

    /**
     * @param DomainRequest $request
     * @param Domain $domain
     * @return RedirectResponse|Redirector
     */
    public function update(DomainRequest $request, Domain $domain)
    {
        $domain->update($request->all());
        toast_message('Domaine modifié avec succès');
        return redirect(route('admin.domains.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Domain $domain
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
        toast_message('Domain supprimé avec succès');
        return redirect(route('admin.domains.index'));
    }
}
