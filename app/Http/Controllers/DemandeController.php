<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    // Affiche la liste des demandes pour l'utilisateur connecté
    public function index()
    {
        $demandes = Demande::where('user_id', Auth::id())->latest()->get();
    return view('back.demandes.index', compact('demandes'));
    }

    // Formulaire de création
    public function create()
    {
        return view('back.demandes.create');
    }

    // Enregistrement d'une nouvelle demande
    public function store(Request $request)
    {
        $request->validate([
            'contenu' => 'required|string',
        ]);

        Demande::create([
            'user_id' => Auth::id(),
            'contenu' => $request->contenu,
        ]);

        return redirect()->route('demandes.index')->with('success', 'Demande soumise avec succès.');
    }

    // Vue pour l'admin : liste de toutes les demandes à traiter
    public function adminIndex()
    {
        $demandes = Demande::latest()->get();
        return view(' back.demandes.admin', compact('demandes'));
    }

    

    // Traitement par l'admin (validation ou rejet)
    public function updateStatus(Request $request, Demande $demande)
    {
        $request->validate([
            'statut' => 'required|in:validee,rejetee',
            'motif_rejet' => 'required_if:statut,rejetee',
        ]);

        $demande->statut = $request->statut;
        $demande->motif_rejet = $request->statut === 'rejetee' ? $request->motif_rejet : null;
        $demande->save();

        return redirect()->back()->with('success', 'Demande mise à jour avec succès.');
    }


    public function adminAction(Request $request, Demande $demande)
{
    // Vérifie si la demande est toujours en attente
    if ($demande->statut !== 'en_attente') {
        return back()->with('error', 'Cette demande a déjà été traitée.');
    }

    // Traitement selon l'action reçue
    if ($request->action === 'valider') {
        $demande->update([
            'statut' => 'validee',
            'motif_rejet' => null,
        ]);
        return back()->with('success', 'Demande validée avec succès.');
    }

    if ($request->action === 'rejeter') {
        $request->validate([
            'motif_rejet' => 'required|string|min:5',
        ]);

        $demande->update([
            'statut' => 'rejetee',
            'motif_rejet' => $request->motif_rejet,
        ]);
        return back()->with('success', 'Demande rejetée avec succès.');
    }

    return back()->with('error', 'Action non reconnue.');
}
}
