@extends('back.app')

@section('title', 'Soumettre une demande')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">Soumettre une demande</h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('demandes.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="contenu" class="form-label">Contenu de la demande</label>
                            <textarea name="contenu" class="form-control" rows="6" required>{{ old('contenu') }}</textarea>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                        <a href="{{ route('demandes.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
