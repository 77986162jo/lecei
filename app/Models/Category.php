<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory, HasSlug, SoftDeletes;
    

    protected $fillable = [
        'name', 
        'slug',
        'description',
        'isActive',
    ];
    protected $dates = ['deleted_at'];

    
    public function getSlugOptions(): SlugOptions
    {

        
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id')->where('isActive', 1);
    }

    public function aides()
{
    return $this->hasMany(Aide::class);
}

}
