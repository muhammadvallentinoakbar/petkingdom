<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * SHOW PROFILE PAGE
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * UPDATE BASIC PROFILE + PHOTO
     */
    public function update(ProfileUpdateRequest $request)
{
    $user = $request->user();

    // update data utama
    $user->fill($request->validated());

    // reset email verification kalau email berubah
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // upload foto
    if ($request->hasFile('profile_photo')) {

        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->profile_photo = $request
            ->file('profile_photo')
            ->store('profile', 'public');
    }

    $user->save();

    return redirect()
        ->route('profile.edit')
        ->with('status', 'Profile berhasil diperbarui');
}

    /**
     * 🔐 UPDATE PASSWORD
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = $request->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors([
                'old_password' => 'Password lama tidak cocok'
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Password berhasil diperbarui');
    }

    /**
     * 📍 UPDATE ADDRESS
     */
    public function updateAddress(Request $request)
{
    $request->validate([
        'address' => 'required',
        'city' => 'required',
        'postal_code' => 'required',
    ]);

    $user = $request->user();

    $user->address = $request->address;
    $user->city = $request->city;
    $user->postal_code = $request->postal_code;

    $user->save();

    return back()->with('status', 'Alamat berhasil disimpan');
}

    /**
     * DELETE ACCOUNT
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