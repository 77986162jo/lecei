<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Aide;
use App\Models\Beneficiaire;
use App\Models\Demande;

class AdminSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $results = [
            'articles' => $this->searchArticles($query),
            'users' => $this->searchUsers($query),
            'comments' => $this->searchComments($query),
            'categories' => $this->searchCategories($query),
            'aides' => $this->searchAides($query),
            'beneficiaires' => $this->searchBeneficiaires($query),
            'demandes' => $this->searchDemandes($query),
        ];

        return view('back.search', compact('results', 'query'));
    }

    protected function searchArticles($query)
    {
        return Article::with('category', 'author')
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
    }

    protected function searchUsers($query)
    {
        return User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
    }

    protected function searchComments($query)
    {
        return Comment::with('article')
            ->where('message', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
    }

    protected function searchCategories($query)
    {
        return Category::where('name', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
    }

    protected function searchAides($query)
    {
        return Aide::where('montant', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
    }

    protected function searchBeneficiaires($query)
    {
        return Beneficiaire::where('nom', 'LIKE', "%{$query}%")
            ->orWhere('prenom', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('ville', 'LIKE', "%{$query}%")
            ->orWhere('telephone', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
    }

    protected function searchDemandes($query)
    {
        return Demande::where('contenu', 'LIKE', "%{$query}%")
            ->orWhere('motif_rejet', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
    }
}
