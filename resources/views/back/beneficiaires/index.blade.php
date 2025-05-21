@extends('back.app')
@section('title', 'Dashboard - Bénéficiaires')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <div class="mt-5">
            <h4 class="card-title float-left mt-2">Liste des bénéficiaires</h4>
            <a href="{{ route('beneficiaires.create') }}" class="btn btn-primary float-right veiwbutton">
                <i class="fas fa-plus"></i> Ajouter un bénéficiaire
            </a>
        </div>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body booking_card">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <div class="table-responsive">
                    <table class="datatable table table-stripped table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nom complet</th>
                                <th>Ville</th>
                                <th>Adresse</th>
                                <th>Contact</th>
                                <th>Ajouté par</th>
                                <th>Date d'ajout</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($beneficiaires as $beneficiaire)
                            <tr>
                                <td>BEN-{{ str_pad($beneficiaire->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <div class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle"
                                            src="{{ $beneficiaire->photo ? asset('storage/'.$beneficiaire->photo) : asset('back_auth/assets/profile/default.png') }}"
                                            alt="Photo de {{ $beneficiaire->prenom }} {{ $beneficiaire->nom }}"
                                            title="{{ $beneficiaire->prenom }} {{ $beneficiaire->nom }}"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('beneficiaires.show', $beneficiaire) }}" class="text-primary">
                                        {{ $beneficiaire->prenom }} {{ $beneficiaire->nom }}
                                    </a>
                                </td>
                                <td>{{ $beneficiaire->ville ?? '---' }}</td>
                                <td>{{ Str::limit($beneficiaire->adresse ?? '---', 20) }}</td>
                                <td>
                                    <div><i class="fas fa-phone mr-1"></i> {{ $beneficiaire->telephone ?? '---' }}</div>
                                    @if($beneficiaire->email)
                                    <div><i class="fas fa-envelope mr-1"></i> {{ $beneficiaire->email }}</div>
                                    @endif
                                </td>
                               <td>
                                        @if($beneficiaire->user)
                                            <span class="badge badge-pill bg-success inv-badge">
                                                <i class="fas fa-user"></i> {{ $beneficiaire->user->name }}
                                            </span>
                                            <br>
                                            <small class="text-muted">{{ $beneficiaire->user->email }}</small>
                                        @else
                                            <span class="badge badge-pill">Utilisateur supprimé</span>
                                        @endif
                                    </td>
                                <td>{{ $beneficiaire->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('beneficiaires.show', $beneficiaire) }}">
                                                <i class="fas fa-eye mr-2"></i> Détails
                                            </a>
                                            <a class="dropdown-item" href="{{ route('beneficiaires.edit', $beneficiaire) }}">
                                                <i class="fas fa-pencil-alt mr-2"></i> Modifier
                                            </a>
                                            <a class="dropdown-item" href="
                                            {{ route('aides.create', ['beneficiaire_id' => $beneficiaire->id]) }}
                                             ">
                                                <i class="fas fa-hands-helping mr-2"></i> Aider
                                            </a>

                                            <form action="{{ route('beneficiaires.destroy', $beneficiaire) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bénéficiaire ?')">
                                                    <i class="fas fa-trash-alt mr-2"></i> Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">Aucun bénéficiaire enregistré</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($beneficiaires->hasPages())
                <div class="mt-3">
                    {{ $beneficiaires->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<br/><br/><br/><br/><br/>