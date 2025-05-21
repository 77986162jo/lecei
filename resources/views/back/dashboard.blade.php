@extends('back.app')
@section('title', 'CEI - Accueil')

@section('dashboard-header')
    <div class="row">
        <div class="col-sm-12 mt-5">
            <h3 class="page-title mt-3">Bonjour et bienvenue {{\Illuminate\Support\Facades\Auth::user()->name}}!</h3>
            {{-- <ul class="breadcrumb">
                <li class="breadcrumb-item active"> Vue globale de votre dashboard</li>
            </ul> --}}
        </div>
    </div>
@endsection


@section('dashboard-content')

    <div class="row">
        @section('dashboard-content')
    <div class="row">
        @if($demandes_en_attente > 0)
    <div class="alert alert-warning">
        ⚠️ Il y a {{ $demandes_en_attente }} demandes en attente de validation.
    </div>
@endif
        <!-- Carte existante - Total Activités -->
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
                <div class="card-body">
                    <div class="dash-widget-header">
                        @php
                        $total = Auth::user()->role === 'author' ? $author_articles : $articles->count();
                        @endphp
                        <div>
                            <h3 class="card_widget_header">{{ $total }}</h3>
                            <h6 class="text-muted">Total Activités</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte existante - Total Catégories -->
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <div>
                            <h3 class="card_widget_header">{{ $categories }}</h3>
                            <h6 class="text-muted">Total Catégories</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte existante - Total Commentaires -->
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <div>
                            <h3 class="card_widget_header">
                                {{ $comments}}
                                 
                            </h3>
                            <h6 class="text-muted">Total Commentaires</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="12" y1="18" x2="12" y2="12"></line>
                                    <line x1="9" y1="15" x2="15" y2="15"></line>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte existante - Abonnements -->
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <div>
                            <h3 class="card_widget_header">{{ $users }}</h3>
                            <h6 class="text-muted">Abonnements</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- NOUVELLE CARTE 1 - Demandes en attente -->
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <div>
                            <h3 class="card_widget_header">{{ $demandes_en_attente }}</h3>

                            <h6 class="text-muted">Demandes en attente</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- NOUVELLE CARTE 2 - Bénéficiaires actifs -->
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <div>
                            <h3 class="card_widget_header">{{ $beneficiaires_total }}</h3>
                            <h6 class="text-muted">Total Bénéficiaires</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- NOUVELLE CARTE 3 - Aides ce mois-ci -->
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <div>
                            <h3 class="card_widget_header">{{ $aides_ce_mois }}</h3>

                            <h6 class="text-muted">Aides ce mois</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- NOUVELLE CARTE 4 - Taux d'approbation -->
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <div>
                            <h3 class="card_widget_header">{{ $taux_approbation }}%</h3>

                            <h6 class="text-muted">Taux d'approbation</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Activités récentes existante -->
    <div class="row">
        <div class="col-md-12 d-flex">
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title float-left mt-2">Activités récentes</h4>
                    <a href="{{ route('activite.index') }}" type="button" class="btn btn-primary float-right veiwbutton">
                        Voir tous
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Catégories</th>
                                    <th class="text-right">Auteur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_articles as $recent_article)
                                <tr>
                                    <td class="text-nowrap">
                                        <img src="{{ $recent_article->imageUrl()}}" alt="{{ $recent_article->slug }}" width="100px" height="100px"/>
                                    </td>
                                    <td>{{ $recent_article->title }}</td>
                                    <td>{{ $recent_article->category->name }}</td>
                                    <td class="text-center">{{ $recent_article->author->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection