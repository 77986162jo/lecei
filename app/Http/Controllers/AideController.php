<?php

namespace App\Http\Controllers;

use App\Models\Aide;
use App\Models\Category;
use App\Models\Beneficiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AideController extends Controller
{
    /**
     * Afficher la liste des aides.
     */
    public function index()
    {
        $aides = Aide::with(['category', 'beneficiaire', 'user'])->latest()->get();
        return view('back.aides.index', compact('aides'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create(Request $request)
    {
        $categories = Category::where('isActive', 1)->get();
        $beneficiaire_id = $request->query('beneficiaire_id');

    // On vérifie que le bénéficiaire existe
    $beneficiaire = Beneficiaire::findOrFail($beneficiaire_id);

        return view('back.aides.create', compact('categories', 'beneficiaire'));
    }

    /**
     * Enregistrer une nouvelle aide.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'beneficiaire_id' => 'required|exists:beneficiaires,id',
            'montant' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'photo' => 'nullable|image|max:2048',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id(); // L'utilisateur connecté

        // Gestion du fichier photo
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('aides/photos', 'public');
        }

        // Gestion du fichier document
        if ($request->hasFile('document')) {
            $data['document'] = $request->file('document')->store('aides/documents', 'public');
        }

        Aide::create($data);

        return redirect()->route('aides.index')->with('success', 'Aide ajoutée avec succès.');
    }

    /**
     * Afficher une aide spécifique.
     */
    public function show(Aide $aide)
    {
        return view('back.aides.show', compact('aide'));
    }

    /**
     * Formulaire d’édition.
     */
    public function edit(Aide $aide)
    {
        $categories = Category::where('isActive', 1)->get();
        $beneficiaires = Beneficiaire::all();

        return view('back.aides.create', compact('aide', 'categories', 'beneficiaires'));
    }

    /**
     * Mise à jour de l’aide.
     */
    public function update(Request $request, Aide $aide)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'beneficiaire_id' => 'required|exists:beneficiaires,id',
            'montant' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'photo' => 'nullable|image|max:2048',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->all();

        // Remplacement du fichier photo
        if ($request->hasFile('photo')) {
            if ($aide->photo) {
                Storage::disk('public')->delete($aide->photo);
            }
            $data['photo'] = $request->file('photo')->store('aides/photos', 'public');
        }

        // Remplacement du document
        if ($request->hasFile('document')) {
            if ($aide->document) {
                Storage::disk('public')->delete($aide->document);
            }
            $data['document'] = $request->file('document')->store('aides/documents', 'public');
        }

        $aide->update($data);

        return redirect()->route('aides.index')->with('success', 'Aide mise à jour avec succès.');
    }

    /**
     * Supprimer une aide.
     */
    public function destroy(Aide $aide)
    {
        if ($aide->photo) {
            Storage::disk('public')->delete($aide->photo);
        }

        if ($aide->document) {
            Storage::disk('public')->delete($aide->document);
        }

        $aide->delete();

        return redirect()->route('aides.index')->with('success', 'Aide supprimée avec succès.');
    }
}
