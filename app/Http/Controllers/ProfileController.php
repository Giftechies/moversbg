<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View; 
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $auth =   Auth::user();         
        $business = Business::where('id', $auth->business_id)->first();
        return view('profile.edit', ['business' => $business,'auth' => $auth]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function profile_update(Request $request)
    {
        $user = $request->user();
        $user->fill([
            'name'   => $request->name,
            'mobile' => $request->mobile,
            'email'  => $request->email,
        ]);
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $business = Business::findOrNew($user->business_id);
        $business->fill([
            'name'    => $request->business_name,
            'abn'     => $request->business_abn,
            'website' => $request->business_website,
            'mobile'  => $request->business_mobile,
            'email'   => $request->business_email,
            'address'   => $request->address,
            'status'  => $request->status,
        ]);

        // ⿣ Handle image upload
        if ($request->hasFile('business_img')) {
            // delete old file if it exists
            if ($business->img) {
                $oldPath = public_path($business->img);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file     = $request->file('business_img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('business_images'), $filename);

            $business->img = 'business_images/' . $filename;
        }
 
        $business->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
