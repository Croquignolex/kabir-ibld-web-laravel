<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * CountryController constructor.
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
        $countries = Country::all()->sortByDesc('updated_at');
        return view('admin.country.index', compact('countries'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * @param CountryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CountryRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|numeric|min:0|unique:countries',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Country::create($request->all());
        toast_message('Pays enrégistré avec succès');
        return redirect(route('admin.countries.index'));
    }

    /**
     * @param Country $country
     * @return Factory|View
     */
    public function edit(Country $country)
    {
        return view('admin.country.edit', compact('country'));
    }

    /**
     * @param CountryRequest $request
     * @param Country $country
     * @return RedirectResponse|Redirector
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->except('code'));
        toast_message('Pays modifié avec succès');
        return redirect(route('admin.countries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Country $country)
    {
        $country->delete();
        toast_message('Pays supprimé avec succès');
        return redirect(route('admin.countries.index'));
    }
}
