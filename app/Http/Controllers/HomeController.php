<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function index()
    {
        $articles = Article::where('isActive',1)->orderBy('created_at', 'desc')->take(10)->get();
        $famous_articles = Article::where('isActive',1)->orderBy('created_at', 'desc')->orderby('views','desc')->take(10)->get();
        $categories = Category::where('isActive',1)->orderBy('created_at', 'desc')->with('articles')->get();
        return view('front.home', compact('articles', 'categories','famous_articles'));
    }
    public function bienvenue()
{
    return view('welcome'); // c’est le fichier welcome.blade.php que tu vas personnaliser
}

}
