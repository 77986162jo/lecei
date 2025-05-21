<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{

public function index()
{
    // Récupérer les paramètres
    $settings = Settings::first(); // Utilisez first() au lieu de where()->first() pour plus de simplicité

    // Si l'enregistrement n'existe pas, créer un nouvel objet vide
    if (!$settings) {
        $settings = new Settings();
        // Optionnel : sauvegarder un modèle vide si nécessaire
        // $settings->save(); 
    }

    return view('back.settings.index', compact('settings')); // Ici, on passe la variable $settings à la vue
}










    // public function store(SettingsRequest $request)
    // {
    //     // Valider les données du formulaire
    //     $validated = $request->validated();
    
    //     // Par défaut, pas d'image
    //     $logoPath = null;
    
    //     // Si un fichier logo est téléchargé
    //     if ($request->hasFile('logo')) {
    //         // Sauvegarde du logo dans le dossier 'setting' du disque public
    //         $logoPath = $request->file('logo')->store('setting', 'public');
    //     }
    
    //     // Créer les paramètres avec les données validées
    //     Settings::create([
    //         'website_name' => $validated['website_name'],
    //         'logo'         => $logoPath,   // Le chemin de l'image sauvegardé
    //         'adress'       => $validated['adress'] ?? '', // Si aucune donnée, laisser vide
    //         'phone'        => $validated['phone'] ?? '',
    //         'email'        => $validated['email'] ?? '',
    //         'about'        => $validated['about'] ?? '',
    //     ]);
    
    //     // Retourner vers la page avec un message de succès
    //     return back()->with('success', 'Paramètres enregistrés avec succès.');
    // }
    
    public function update(SettingsRequest $request)
    {
        // Valider les données
        $validated = $request->validated();
    
        // Récupérer les paramètres (en supposant qu'il n'y a qu'une seule ligne)
        $setting = Settings::where('id', 1)->first();
    
        // Gestion du logo
        if ($request->hasFile('logo')) {
            // Supprimer l'ancien logo s'il existe
            if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }
    
            // Stocker le nouveau logo
            $logoPath = $request->file('logo')->store('setting', 'public');
        } else {
            $logoPath = $setting->logo;
        }
    
        // Mise à jour des champs
        $setting->update([
            'website_name' => $validated['website_name'],
            'logo'         => $logoPath,
            'adress'       => $validated['adress'] ?? $setting->adress,
            'phone'        => $validated['phone'] ?? $setting->phone,
            'email'        => $validated['email'] ?? $setting->email,
            'about'        => $validated['about'],
        ]);
    
        return back()->with('success', 'Paramètres mis à jour avec succès.');
    }
    
}
