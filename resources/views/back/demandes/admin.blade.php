@extends('back.app')

@section('title', 'Demandes des responsables')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">Demandes des responsables</h3>
    </div>
</div>
@endsection

@section('dashboard-content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">

                @if($demandes->isEmpty())
                    <p>Aucune demande trouvée.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Auteur</th>
                                    <th>Contenu</th>
                                    <th>Statut</th>
                                    <th>Motif de rejet</th>
                                    <th>Soumise le</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $demande->user->name }}</td>
                                        <td>{{ Str::limit($demande->contenu, 50) }}</td>
                                        <td>
                                            @if($demande->statut == 'en_attente')
                                                <span class="badge bg-warning text-dark">En attente</span>
                                            @elseif($demande->statut == 'validee')
                                                <span class="badge bg-success">Validée</span>
                                            @elseif($demande->statut == 'rejetee')
                                                <span class="badge bg-danger">Rejetée</span>
                                            @endif
                                        </td>
                                        <td>{{ $demande->motif_rejet ?? '—' }}</td>
                                        <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            @if($demande->statut == 'en_attente')
                                                <form action="{{  route('demandes.admin.action', $demande)}}" method="POST" class="d-flex flex-column gap-1">
                                                                                                        
                                                    @csrf
                                                    <input type="hidden" name="action" value="valider">
                                                    <button type="submit" class="btn btn-success btn-sm">Valider</button>
                                                </form>

                                                <!-- Rejet avec motif -->
                                                <form action="{{  route('demandes.admin.action', $demande)}}" method="POST" class="mt-1">
                                                                                                        
                                                    @csrf
                                                    <input type="hidden" name="action" value="rejeter">

                                                    <div class="mb-1">
                                                        <textarea name="motif_rejet" rows="2" class="form-control" placeholder="Motif du rejet..." required></textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                                                </form>
                                            @else
                                                <span class="text-muted">Aucune action</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
