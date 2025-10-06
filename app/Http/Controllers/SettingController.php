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
            'semail' => 'required|email',
            'smobile' => 'required',
            'auth_key' => 'required',
            // Add more validation rules as needed
        ]);

        $setting = Setting::first();
        $setting->webname = $request->input('webname');
        $setting->timezone = $request->input('timezone');
        $setting->currency = $request->input('currency');
        $setting->pdboy = $request->input('pdboy');
        $setting->one_key = $request->input('one_key');
        $setting->one_hash = $request->input('one_hash');
        $setting->d_key = $request->input('d_key');
        $setting->d_hash = $request->input('d_hash');
        $setting->scredit = $request->input('scredit');
        $setting->rcredit = $request->input('rcredit');
        $setting->gkey = $request->input('gkey');
        $setting->vehiid = $request->input('vehiid');
        $setting->couvid = $request->input('couvid');
        $setting->kglimit = $request->input('kglimit');
        $setting->kgprice = $request->input('kgprice');
        $setting->semail = $request->input('semail');
        $setting->smobile = $request->input('smobile');
        $setting->sms_type = $request->input('sms_type');
        $setting->auth_key = $request->input('auth_key');
        $setting->otp_id = $request->input('otp_id');
        $setting->acc_id = $request->input('acc_id');
        $setting->auth_token = $request->input('auth_token');
        $setting->twilio_number = $request->input('twilio_number');
        $setting->otp_auth = $request->input('otp_auth');

        if ($request->hasFile('weblogo')) {
            $setting->weblogo = $request->file('weblogo')->store('weblogos');
        }

        $setting->save();

        return redirect()->route('settings.edit')->with('success', 'Settings updated successfully'); 
    }
} 
