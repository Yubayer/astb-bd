<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Setting;

class SettingsController extends Controller
{
    public function index() {
        $settings = Setting::first();
        return view('admin.settings.index', compact('settings'));
    }

    public function updaeShopName(Request $request) {
        $setting = Setting::where('id', $request->id)->first();
        $setting[$request->key] = $request[$request->key];
        $setting->update();
        
        return redirect()->back();
    }
}
