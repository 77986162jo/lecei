<?php

namespace App\Models;
use Spatie\Tags\HasTags;
// use RtConner\LaravelTagging\Taggable;

// use Illuminate\Container\Attributes\Storage;
// use Illuminate\Container\Attributes\Storage;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    //
    use HasFactory, HasSlug, HasTags;
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'isActive',
        'isComment',
        'isSharable',
        'category_id',
        'author_id',	

    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function imageUrl(): string {
        return Storage::url($this->image);
        // return $this->image ? Storage::disk('public')->url($this->image) : null;

 
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');	
    }
    
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getAuthorImage()
    {
        return $this->author && $this->author->image
            ? asset('back_auth/assets/profile/' . $this->author->image)
            : asset('back_auth/assets/profile/logo.png');
    }
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class, 'article_id', 'id')->where('isActive', 1);
    }

      
}
