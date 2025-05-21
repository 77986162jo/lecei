<?php

namespace App\Http\Controllers;

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
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

// Si l'email a été modifié, réinitialiser la vérification
if ($request->user()->isDirty('email')) {
    $request->user()->email_verified_at = null;
}

// Si une nouvelle image est envoyée
if ($request->hasFile('image')) {
    $oldImagePath = public_path('back_auth/assets/profile/' . $request->user()->image);

    // Supprimer l'ancienne image si elle existe
    if (!empty($request->user()->image) && file_exists($oldImagePath)) {
        unlink($oldImagePath);
    }

    // Générer un nom de fichier unique
    $ext = $request->file('image')->extension();
    $file_name = date('YmdHis') . '.' . $ext;

    // Déplacer la nouvelle image dans le dossier public
    $request->file('image')->move(public_path('back_auth/assets/profile'), $file_name);

    // Mettre à jour l'image de l'utilisateur
    $request->user()->image = $file_name;
    $request->user()->name = $request->name;
    $request->user()->email = $request->email;
}

// Sauvegarder les modifications
$request->user()->save();

// Rediriger avec un message de succès
return Redirect::route('profile.edit')->with('status', 'profile modifie avec succes');
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
