@extends('back.app')
@section('title', 'CEI - Détail du bénéficiaire')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">Détail du bénéficiaire</h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card p-4">

            {{-- Informations du bénéficiaire --}}
            <h5 class="mb-4">Informations personnelles</h5>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Nom :</strong> {{ $beneficiaire->nom }}</li>
                <li class="list-group-item"><strong>Prénom :</strong> {{ $beneficiaire->prenom }}</li>
                <li class="list-group-item"><strong>Ville :</strong> {{ $beneficiaire->ville }}</li>
                <li class="list-group-item"><strong>Adresse :</strong> {{ $beneficiaire->adresse }}</li>
                <li class="list-group-item"><strong>Email :</strong> {{ $beneficiaire->email }}</li>
                <li class="list-group-item"><strong>Téléphone :</strong> {{ $beneficiaire->telephone }}</li>
                <li class="list-group-item"><strong>Photo :</strong> {{ $beneficiaire->photo }}</li>
                <li class="list-group-item"><strong>Ajouter par :</strong> {{ $beneficiaire->user->name }}</li>
                {{-- Ajoute ici d'autres champs si tu en as --}}
            </ul>

            {{-- Historique des aides --}}
            <h5 class="mb-3">Historique des aides reçues</h5>

            @if($beneficiaire->aides->count() > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Catégorie</th>
                            <th>Montant</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($beneficiaire->aides as $aide)
                        <tr>
                            <td>{{ $aide->id }}</td>
                            <td>{{ $aide->category->name ?? 'Non défini' }}</td>
                            <td>{{ number_format($aide->montant, 2, ',', ' ') }} F CFA</td>
                            <td>{{ $aide->date->format('d/m/Y') }}</td>
                            <td>{{ Str::limit($aide->description, 50) }}</td>
                            <td>
                                <a href="{{ route('aides.index', $aide->id) }}" class="btn btn-sm btn-info">Voir</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">Ce bénéficiaire n’a encore reçu aucune aide.</p>
            @endif

        </div>
    </div>
</div>
@endsection
