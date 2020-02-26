<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SettingRequest;
use Illuminate\Contracts\View\Factory;

class SettingController extends Controller
{
    /**
     * DashboardController constructor.
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
        $setting = Setting::all()->first();
        return view('admin.setting', compact('setting'));
    }

    /**
     * @param SettingRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update(SettingRequest $request)
    {
        $setting = Setting::all()->first();
        $setting->update($request->all());
        toast_message('Informations enrégistrées avec succès');
        return redirect(route('admin.settings.index'));
    }
}
