@extends('back.app')
@section('title', 'CEI - Page des activites')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <div class="mt-5">
            <h4 class="card-title float-left mt-2">Activié</h4>
            <a href="{{ route('activite.create') }}" class="btn btn-primary float-right veiwbutton">Ajouter une activité</a>
        </div>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body booking_card">
                <div class="table-responsive">
                    <table class="datatable table table-stripped table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID Activié</th>
                                <th>Titre</th>
                                <th>Categorie</th>
                                <th>Image</th>

                                <th>Date</th>
                                <th>Publication</th>
                                <th>Partage</th>
                                <th>Commentaires</th>
                                <th>Auteur</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach ($articles as $article)
                                <tr>
                                    <td> ACT-000{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->category->name ?? 'N/A' }}</td>

                                    <td>
                                        @if($article->image)
                                            <img src="{{ $article->imageUrl() }}" alt="Image" width="50" height="50">
                                        @else
                                            <span>Aucune image</span>
                                        @endif
                                    </td>
                                    <td>{{ $article->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <div class="actions">
                                            <span class="btn {{ $article->isActive ? 'btn-sm bg-success-light mr-2' : 'btn-sm bg-success-light mr-2' }}">
                                                {{ $article->isActive ? 'Publié' : 'Non publié' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="btn {{ $article->isSharable ? 'btn-sm bg-success-light mr-2' : 'btn-sm bg-success-light mr-2' }}">
                                                {{ $article->isSharable ? 'Partageable' : 'Non Partageable' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="btn {{ $article->isComment ? 'btn-sm bg-success-light mr-2' : 'btn-sm bg-success-light mr-2' }}">
                                                {{ $article->isComment ? 'Autorisé' : 'Non autorisé' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2">
                                                <img class="avatar-img rounded-circle" src="{{ $article->getAuthorImage() }}" alt="User Image">


                                            </a>
                                            <a href="{{ route('profile.edit') }}">
                                                {{ $article->author->name ?? 'Auteur inconnu' }} <span>#{{ $article->author->id ?? 'N/A' }}</span>
                                            </a>
                                        </h2>
                                    </td>
                                    
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v ellipse_color"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('activite.show', $article->slug) }}">
                                                    <i class="fas fa-eye m-r-5"></i> Voir
                                                </a>
                                                <a class="dropdown-item" href="{{ route('activite.edit', $article) }}">
                                                    <i class="fas fa-pencil-alt m-r-5"></i> Modifier
                                                </a>
                                                <form action="{{ route('activite.destroy', $article->slug) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                                        <i class="fas fa-trash-alt m-r-5"></i> Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
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
