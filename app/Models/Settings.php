<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory; // Utilisez HasFactory pour générer des usines de données

    protected $table = 'settings';

    protected $fillable = [
        'website_name',
        'logo',
        'adress',
        'phone',
        'email',
        'about',
    ];
}
