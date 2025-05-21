<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Demande;
use App\Models\Beneficiaire;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'author'){
            $author_articles = Article::where('author_id', $user->id)->count();
        }
$articles = Article::all();
$recent_articles = Article::where('isActive',1)->orderBy('created_at', 'desc')->take(10)->get();
$categories = Category::count();
$comments = Comment::count(); // 👈 Ajout du total de commentaires
$users = User::count();
$demandes_en_attente = Demande::where('statut', 'en_attente')->count();
$beneficiaires_total = Beneficiaire::count();

$mois_actuel = Carbon::now()->month;
$annee_actuelle = Carbon::now()->year;

$aides_ce_mois = Demande::whereMonth('created_at', $mois_actuel)
                        ->whereYear('created_at', $annee_actuelle)
                        ->count();



                        $total_demandes = Demande::count();
$demandes_approuvees = Demande::where('statut', 'validee')->count();

$taux_approbation = $total_demandes > 0 
    ? round(($demandes_approuvees / $total_demandes) * 100, 2)
    : 0;



return view('back.dashboard', [
        'author_articles' => $user->role == 'author'?  $author_articles : null,
        'articles' => $articles,
        'recent_articles' => $recent_articles,
        'categories' => $categories,
        'comments' => $comments, // 👈 Ajouté ici aussi
        'users' => $users,
        'demandes_en_attente' => $demandes_en_attente,
        'beneficiaires_total' => $beneficiaires_total,
        'aides_ce_mois' => $aides_ce_mois,
        'taux_approbation' => $taux_approbation,

    
    ]);
    }
   
}
