<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Domain;
use Illuminate\View\View;
use App\Models\Contributor;
use App\Traits\FileManageTrait;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\ContributorRequest;
use Illuminate\Validation\ValidationException;

class ContributorController extends Controller
{
    use FileManageTrait;

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
        $contributors = Contributor::all()->sortByDesc('created_at');
        return view('admin.contributor.index', compact('contributors'));
    }

    /**
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function create()
    {
        $domains = Domain::all()->sortByDesc('created_at');
        if($domains->count() == 0)
        {
            toast_message('Vous ne pouvez pas créer d\'intervenant sans domaine');
            return back();
        }
        return view('admin.contributor.create', compact('domains'));
    }

    /**
     * @param ContributorRequest $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(ContributorRequest $request)
    {
        $file = $this->storeFile($request, Contributor::FOLDER);

        Contributor::create([
            'file' =>  $file->name,
            'extension' => $file->extension,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'domain_id' => $request->input('domain_id'),
            'description' => $request->input('description'),
        ]);

        toast_message('Intervenant enrégistré avec succès');
        return redirect(route('admin.contributors.index'));
    }

    /**
     * @param Contributor $contributor
     * @return Factory|View
     */
    public function edit(Contributor $contributor)
    {
        $domains = Domain::all()->sortByDesc('created_at');
        return view('admin.contributor.edit', compact('contributor', 'domains'));
    }

    /**
     * @param ContributorRequest $request
     * @param Contributor $contributor
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(ContributorRequest $request, Contributor $contributor)
    {
        $file = $this->storeFile($request, Contributor::FOLDER, $contributor);

        $contributor->update([
            'file' =>  $file->name,
            'extension' => $file->extension,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'domain_id' => $request->input('domain_id'),
            'description' => $request->input('description'),
        ]);

        toast_message('Intervenant modifié avec succès');
        return redirect(route('admin.contributors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contributor $contributor
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Contributor $contributor)
    {
        $contributor->delete();
        toast_message('Service supprimé avec succès');
        return back();
    }
}
