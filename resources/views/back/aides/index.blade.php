@extends('back.app')
@section('title', 'CEI - Liste des aides')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">Liste des aides</h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Catégorie</th>
                        <th>Bénéficiaire</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Document</th>
                        <th>Responsable</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aides as $index => $aide)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $aide->category->name ?? 'N/A' }}</td>
                            <td>{{ $aide->beneficiaire->nom }} {{ $aide->beneficiaire->prenom }}</td>
                            <td>{{ number_format($aide->montant, 2) }} DH</td>
                            <td>{{ $aide->date->format('d/m/Y') }}</td>
                            <td>{{ Str::limit($aide->description, 50) }}</td>
                            <td>
                                @if($aide->photo)
                                    <img src="{{ asset('storage/' . $aide->photo) }}" width="80" alt="Photo">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($aide->document)
                                    <a href="{{ asset('storage/' . $aide->document) }}" download class="btn btn-sm btn-success">Télécharger</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                {{ $aide->user->name ?? 'N/A' }}
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v ellipse_color"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('aides.edit', $aide) }}">
                                            <i class="fas fa-pencil-alt mr-2"></i> Modifier
                                        </a>
                                        <form action="{{ route('aides.destroy', $aide) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette aide ?')">
                                                <i class="fas fa-trash-alt mr-2"></i> Supprimer
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
@endsection
