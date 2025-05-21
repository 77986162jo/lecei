<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\AideController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\AdminSearchController;

//page d'accueil
Route::get('/',[
    \App\Http\Controllers\HomeController::class,
    'index'
])->name('home');


Route::get('/connexion', [HomeController::class, 'bienvenue'])->name('bienvenue');

// Tableau de bord accessible à admin et author
Route::get('/dashboard', [
    DashboardController::class,
    'index'
])->middleware(['auth', 'verified', 'checkRole:admin,author'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//les category

    Route::resource('/category', CategoryController::class)->middleware(['auth', 'verified','checkRole:admin']);

//les articles
Route::resource('/activite', ArticleController::class);

// les auteurs
 // Auteurs
    Route::resource('/author', UserController::class)->middleware(['auth', 'verified','checkRole:admin']);


// Réseaux sociaux
    Route::resource('/socialMedia', SocialMediaController::class)->middleware(['auth', 'verified','checkRole:admin']);

    // les paramettres

    // Paramètres
    Route::get('/parametre', [SettingsController::class, 'index'])->name('setting.index')->middleware(['auth', 'verified','checkRole:admin']);
    Route::post('/parametre', [SettingsController::class, 'store'])->name('setting.store')->middleware(['auth', 'verified','checkRole:admin']);
    Route::get('/parametre/{id}', [SettingsController::class, 'show'])->name('setting.show')->middleware(['auth', 'verified','checkRole:admin']);
    Route::put('/parametre', [SettingsController::class, 'update'])->name('setting.update')->middleware(['auth', 'verified','checkRole:admin']);

//page detail article
Route::get('/detail/{slug}', [\App\Http\Controllers\DetailController::class, 'index'])->name('article.detail');

// parties commentaires
Route::post('/comment/{id}', [\App\Http\Controllers\DetailController::class, 'comment'])->name('comment');

Route::resource('/comment', \App\Http\Controllers\CommentController::class);
Route::put('/comment/unlock/{comment}', [CommentController::class, 'unlock'])->name('comment.unlock');

//beneficiaire

Route::resource('beneficiaire', BeneficiaireController::class)->middleware(['auth', 'verified','checkRole:admin,author']);
Route::get('/beneficiaires/create', [BeneficiaireController::class, 'create'])->name('beneficiaires.create');
Route::get('/beneficiaires', [BeneficiaireController::class, 'index'])->name('beneficiaires.index');
Route::get('/beneficiaires/{beneficiaire}', [BeneficiaireController::class, 'show'])->name('beneficiaires.show');

    Route::post('/beneficiaires', [BeneficiaireController::class, 'store'])->name('beneficiaires.store');
    Route::get('/beneficiaires/{beneficiaire}/edit', [BeneficiaireController::class, 'edit'])->name('beneficiaires.edit');
    Route::put('/beneficiaires/{beneficiaire}', [BeneficiaireController::class, 'update'])->name('beneficiaires.update');
    Route::delete('/beneficiaires/{beneficiaire}', [BeneficiaireController::class, 'destroy'])->name('beneficiaires.destroy');

//les aides
    Route::get('/aides', [AideController::class, 'index'])->name('aides.index');
    Route::get('/aides/create', [AideController::class, 'create'])->name('aides.create');
    Route::post('/aides', [AideController::class, 'store'])->name('aides.store');
    Route::get('/aides/{aide}', [AideController::class, 'show'])->name('aides.show');
    Route::get('/aides/{aide}/edit', [AideController::class, 'edit'])->name('aides.edit');
    Route::put('/aides/{aide}', [AideController::class, 'update'])->name('aides.update');
    Route::delete('/aides/{aide}', [AideController::class, 'destroy'])->name('aides.destroy');


//demandes
// Toutes les routes sauf `create` pour admin + author
Route::resource('demandes', DemandeController::class)
    ->except(['create', 'show'])
    ->middleware(['auth', 'verified', 'checkRole:admin,author']);

Route::post('/demandes/admin/action', [DemandeController::class, 'adminAction'])->name('demandes.admin.action');

    // Route pour afficher le formulaire de création (réservée à l'admin)
Route::get('/demandes/create', [DemandeController::class, 'create'])
    ->name('demandes.create')
    ->middleware(['auth', 'verified', 'checkRole:admin']);


    Route::get('/admin/demandes', [DemandeController::class, 'adminIndex'])->name('demandes.admin.index')->middleware(['auth', 'verified','checkRole:admin']);


// les categories
Route::get('/categorie/{slug}',[FrontCategoryController::class,'index'])->name('category.activite');

// Route pour la page de contact
Route::get('/contacts', [\App\Http\Controllers\FrontContactController::class, 'index'])->name('front.contact');
Route::post('/contacts/envoyer', [\App\Http\Controllers\FrontContactController::class, 'contact'])->name('contact.send');

//contacts
Route::resource('/contact', \App\Http\Controllers\ContactController::class);

//recherche
// Route pour la recherche
Route::post('/recherches', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');


//recherche cote admin
Route::prefix('admin')->group(function() {
    Route::get('/search', [AdminSearchController::class, 'index'])->name('admin.search');
});
require __DIR__.'/auth.php';







