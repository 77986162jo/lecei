@extends('back.app')
@section('title', 'CEI - Ajouter une aide')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">
            @if(isset($aide)) Modifier @else Ajouter @endif une aide
        </h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ isset($aide) ? route('aides.update', $aide) : route('aides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($aide))
                @method('PUT')
            @endif

            <div class="row formtype">

                {{-- Catégorie --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_id">Catégorie</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $aide->category_id ?? '') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
{{-- Bénéficiaire --}}
<div class="col-md-4">
    <div class="form-group">
        <label>Bénéficiaire</label>
        @php
            $b = $beneficiaire ?? $aide->beneficiaire ?? null;
        @endphp

        @if($b)
            <input type="text" class="form-control" value="{{ $b->nom }} {{ $b->prenom }}" disabled>
            <input type="hidden" name="beneficiaire_id" value="{{ $b->id }}">
        @else
            <p class="text-danger">Bénéficiaire introuvable.</p>
        @endif

        @error('beneficiaire_id')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>


                {{-- Montant --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="montant">Montant</label>
                        <input type="number" class="form-control" name="montant" id="montant"
                            value="{{ old('montant', $aide->montant ?? '') }}" step="0.01">
                        @error('montant')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Date --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Date d’aide</label>
                        <input type="date" class="form-control" name="date" id="date"
                            value="{{ old('date', isset($aide) ? $aide->date->format('Y-m-d') : '') }}">
                        @error('date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Photo --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo">Photo (optionnelle)</label>
                        <input type="file" class="form-control" name="photo" id="photo">
                        @error('photo')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        @if(isset($aide) && $aide->photo)
                            <img src="{{ asset('storage/' . $aide->photo) }}" class="mt-2" width="150" alt="photo aide">
                        @endif
                    </div>
                </div>

                {{-- Document --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="document">Document (optionnel)</label>
                        <input type="file" class="form-control" name="document" id="document">
                        @error('document')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        @if(isset($aide) && $aide->document)
                            <a href="{{ asset('storage/' . $aide->document) }}" target="_blank" class="d-block mt-2">Voir le document</a>
                        @endif
                    </div>
                </div>

                {{-- Description --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description (optionnelle)</label>
                        <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $aide->description ?? '') }}</textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Submit --}}
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-3">
                        @if(isset($aide)) Mettre à jour @else Enregistrer @endif l’aide
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
