<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aide extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiaire_id',
        'category_id',
        'user_id', // Ajouté : l'utilisateur (donateur) qui offre l'aide
        'description',
        'montant',
        'date',
        'photo',
        'document',
    ];

      protected $casts = [
        'date' => 'date', // Cast automatique au format date (Carbon instance)
        'montant' => 'float', // Optionnel : assure-toi que montant est bien en float
    ];

    /**
     * Lien avec le bénéficiaire
     */
    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class);
    }

    /**
     * Lien avec la catégorie d’aide
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Lien avec le donateur (utilisateur)
     */
  public function user()
{
    return $this->belongsTo(User::class);
}

}
