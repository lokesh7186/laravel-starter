<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAppSettings;
use App\Http\Requests\Admin\UpdateAppSettings;
use App\Models\AppSettings;
use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('app_settings.access');
        $settings = AppSettings::orderBy('setting_type')->orderBy('sort_order')->get();
        $settings = $settings->groupBy('setting_type');
        return view('admin.settings.index', ['appSettings' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('app_settings.manage');
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\StoreAppSettings  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppSettings $request)
    {
        $validated = $request->validated();

        $setting = new AppSettings();
        $setting->setting_type = 'User Defined';
        $setting->is_system = 0;
        $setting->key = $validated['key'];
        $setting->value = $validated['value'];
        $setting->sort_order = $validated['sort_order'];
        $setting->save();

        return redirect()->route('admin.settings.index')->with('status-success', 'Setting ' . $setting->key . ' was added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\AppSettings  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(AppSettings $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AppSettings  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(AppSettings $setting)
    {
        $this->authorize('app_settings.manage');
        return view('admin.settings.edit', ['appSettings' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateAppSettings  $request
     * @param  App\Models\AppSettings  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppSettings $request, AppSettings $setting)
    {
        $validated = $request->validated();

        if (!$setting->is_system) {
            $setting->key = $validated['key'];
        }
        $setting->value = $validated['value'];
        $setting->sort_order = $validated['sort_order'];

        $setting->save();

        return redirect()->route('admin.settings.index')->with('status-success', 'Setting ' . $setting->key . ' was modified successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\AppSettings  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppSettings $setting)
    {
        //
    }
}
