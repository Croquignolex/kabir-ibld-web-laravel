<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ServiceRequest;
use Illuminate\Contracts\View\Factory;

class ServiceController extends Controller
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
        $services = Service::all()->sortByDesc('updated_at');
        return view('admin.service.index', compact('services'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * @param ServiceRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(ServiceRequest $request)
    {
        Service::create($request->all());
        toast_message('Service enrégistré avec succès');
        return redirect(route('admin.services.index'));
    }

    /**
     * @param Service $service
     * @return Factory|View
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * @param ServiceRequest $request
     * @param Service $service
     * @return RedirectResponse|Redirector
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $service->update($request->all());
        toast_message('Service modifié avec succès');
        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Service $service)
    {
        $service->delete();
        toast_message('Service supprimé avec succès');
        return redirect(route('admin.services.index'));
    }
}
