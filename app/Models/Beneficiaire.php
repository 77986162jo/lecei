<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'ville',
        'adresse',
        'telephone',
        'email',
        'photo',
        'user_id', // auteur
    ];

    // Auteur de l’enregistrement
    public function auteur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Aides reçues
    // public function aides()
    // {
    //     return $this->hasMany(Aide::class, 'beneficiaire_id');
    // }

    // Nom complet pour affichage simple
    public function getNomCompletAttribute()
    {
        return ucfirst($this->prenom) . ' ' . strtoupper($this->nom);
    }

    // Accès à l’URL complète de la photo (si stockée dans storage/app/public)
    public function getPhotoUrlAttribute()
    {
        return $this->photo 
            ? asset('storage/' . $this->photo) 
            : asset('images/default-avatar.png'); // ou une image par défaut
    }

    public function user()
{
    return $this->belongsTo(User::class)->withDefault([
        'name' => 'Utilisateur inconnu',
        'email' => 'N/A'
    ]);
}

public function aides()
{
    return $this->hasMany(Aide::class);
}

}
