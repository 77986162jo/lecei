@extends('back.app')

@section('title', 'Résultats de recherche')

@section('dashboard-header')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Résultats de recherche</h4>
                <div class="float-right">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title">Recherche pour "{{ $query }}"</h4>
            </div>
            <div class="card-body">
                <!-- Onglets de navigation -->
                <ul class="nav nav-tabs" id="searchTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="articles-tab" data-toggle="tab" href="#articles" role="tab">
                            Activites ({{ $results['articles']->count() }})
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="users-tab" data-toggle="tab" href="#users" role="tab">
                            Utilisateurs ({{ $results['users']->count() }})
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab">
                            Commentaires ({{ $results['comments']->count() }})
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab">
                            Catégories ({{ $results['categories']->count() }})
                        </a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link" id="aides-tab" data-toggle="tab" href="#aides" role="tab">
        Aides ({{ $results['aides']->count() }})
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" id="beneficiaires-tab" data-toggle="tab" href="#beneficiaires" role="tab">
        Bénéficiaires ({{ $results['beneficiaires']->count() }})
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" id="demandes-tab" data-toggle="tab" href="#demandes" role="tab">
        Demandes ({{ $results['demandes']->count() }})
    </a>
</li>

                </ul>

                <!-- Contenu des onglets -->
                <div class="tab-content pt-3" id="searchTabsContent">
                    <!-- Articles -->
                    <div class="tab-pane fade show active" id="articles" role="tabpanel">
                        @if($results['articles']->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Catégorie</th>
                                            <th>Auteur</th>
                                            <th>Date</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results['articles'] as $article)
                                        <tr>
                                            <td>{{ Str::limit($article->title, 50) }}</td>
                                            <td>{{ $article->category->name ?? '-' }}</td>
                                            <td>{{ $article->author->name ?? '-' }}</td>
                                            <td>{{ $article->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ route('activite.update', $article->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">Aucun article trouvé</div>
                        @endif
                    </div>

                    <!-- Utilisateurs -->
                    <div class="tab-pane fade" id="users" role="tabpanel">
                        @if($results['users']->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Rôle</th>
                                            <th>Inscrit le</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results['users'] as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">Aucun utilisateur trouvé</div>
                        @endif
                    </div>

                    <!-- Commentaires -->
                    <div class="tab-pane fade" id="comments" role="tabpanel">
                        @if($results['comments']->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Contenu</th>
                                            <th>Activite</th>
                                            <th>Auteur</th>
                                            <th>Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results['comments'] as $comment)
                                        <tr>
                                            <td>{{ Str::limit($comment->content, 50) }}</td>
                                            <td>{{ Str::limit($comment->article->title, 30) ?? '-' }}</td>
                                            <td>{{ $comment->name ?? '-' }}</td>
                                            <td>{{ $comment->created_at->format('d/m/Y') }}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">Aucun commentaire trouvé</div>
                        @endif
                    </div>

                    <!-- Catégories -->
                    <div class="tab-pane fade" id="categories" role="tabpanel">
                        @if($results['categories']->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Activite</th>
                                            <th>Créée le</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results['categories'] as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->articles_count }}</td>
                                            <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">Aucune catégorie trouvée</div>
                        @endif
                    </div>



<!-- Aides -->
<div class="tab-pane fade" id="aides" role="tabpanel">
    @if($results['aides']->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Montant</th>
                        <th>Description</th>
                        <th>Créée le</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results['aides'] as $aide)
                    <tr>
                        <td>{{ Str::limit($aide->montant, 50) }}</td>
                        <td>{{ Str::limit($aide->description, 80) }}</td>
                        <td>{{ $aide->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Aucune aide trouvée</div>
    @endif
</div>




<!-- Bénéficiaires -->
<div class="tab-pane fade" id="beneficiaires" role="tabpanel">
    @if($results['beneficiaires']->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Ville</th>
                        <th>Telephone</th>
                        <th>Date d'ajout</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results['beneficiaires'] as $beneficiaire)
                    <tr>
                        <td>{{ $beneficiaire->nom }}</td>
                        <td>{{ $beneficiaire->prenom }}</td>
                        <td>{{ $beneficiaire->email }}</td>
                        <td>{{ $beneficiaire->ville }}</td>
                        <td>{{ $beneficiaire->telephone }}</td>
                        <td>{{ $beneficiaire->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Aucun bénéficiaire trouvé</div>
    @endif
</div>






<!-- Demandes -->
<div class="tab-pane fade" id="demandes" role="tabpanel">
    @if($results['demandes']->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Contenu</th>
                        <th>Motif_rejet</th>
                        <th>Date de création</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results['demandes'] as $demande)
                    <tr>
                        <td>{{ Str::limit($demande->contenu, 40) }}</td>
                        <td>{{ Str::limit($demande->motif_rejet, 80) }}</td>
                        <td>{{ $demande->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Aucune demande trouvée</div>
    @endif
</div>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Active le premier onglet et initialise les tooltips
    $(document).ready(function() {
        $('#searchTabs a:first').tab('show');
        $('[data-toggle="tooltip"]').tooltip();
        
        // Persiste le dernier onglet actif
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('lastSearchTab', $(e.target).attr('id'));
        });
        
        var lastTab = localStorage.getItem('lastSearchTab');
        if (lastTab) {
            $('#' + lastTab).tab('show');
        }
    });
</script>
@endpush