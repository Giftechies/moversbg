<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'webname' => 'required',
            'timezone' => 'required',
            'currency' => 'required',
            'pdboy' => 'required',
            // Add more validation rules as needed
        ]);

        $setting = Setting::first();
        if ($request->hasFile('weblogo')) {
            $request->validate([
                'weblogo' => 'image|mimes:jpg,png,jpeg',
            ]);
            $setting->weblogo = $request->file('weblogo')->store('images/website');
        }
        $setting->webname = $request->input('webname');
        $setting->timezone = $request->input('timezone');
        $setting->currency = $request->input('currency');
        $setting->pdboy = $request->input('pdboy');
        // Add more fields as needed
        $setting->save();

        return redirect()->route('settings.edit')->with('success', 'Setting updated successfully');
    }
} 
