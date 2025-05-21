<?php

namespace App\Providers;
use Spatie\Tags\Tag;
use App\Models\SocialMedia;
use App\Models\Category;
use App\Models\Settings; // Ensure the Setting model exists in the App\Models namespace
use App\Models\Article; // Import the Article model
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        // Récupération des paramètres de la plateforme (exemple avec un modèle Setting)
        $settings = Settings::first(); // On suppose qu’il n’y a qu’une seule ligne
    
        $socials = SocialMedia::orderby('id', 'desc')->get();
        $cateregories = Category::where('isActive',1)->orderby('created_at', 'DESC')->get();
        $articles = Article::where('isActive',1)->orderBy('created_at', 'desc')->take(5)->get();
        $tags = Tag::whereNotNull('id')->orderBy('id', 'desc')->take(15)->get();
        $settings = Settings::where('id',1)->first(); // On suppose qu’il n’y a qu’une seule ligne
        $famous_articles = Article::where('isActive',1)->orderBy('created_at', 'desc')->orderby('views','desc')->take(3)->get();



        view()->share('global_social', $socials);
        view()->share('global_category', $cateregories);
        view()->share('global_setting', $settings);
        view()->share('global_recent_articles', $articles);
        view()->share('global_tags', $tags);
        view()->share('global_settings', $settings);
        view()->share('global_famous_articles', $famous_articles);

    }
}


