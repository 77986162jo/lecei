<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
       $request->validate([
            'search_key' => 'required|string',
        ]);
        $articles = Article::where('title', 'LIKE', "%$request->search_key%")->get();

            
        return view('front.search',compact('articles'));
    }
}
