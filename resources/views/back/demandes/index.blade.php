@extends('back.app')

@section('title', 'Mes demandes')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">Mes demandes</h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{ route('demandes.create') }}" class="btn btn-primary mb-3">Soumettre une nouvelle demande</a>

                @if($demandes->isEmpty())
                    <p>Aucune demande soumise pour le moment.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Contenu</th>
                                    <th>Statut</th>
                                    <th>Motif de rejet</th>
                                    <th>Date de soumission</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
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
