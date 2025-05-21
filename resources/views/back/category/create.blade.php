@extends('back.app')

@section('title', "CEI - creer une categorie")

@section('dashboard-header')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title mt-5">
                    @if(isset($category))
                        Modifier
                    @else
                        Ajouter
                    @endif une categorie
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('dashboard-content')

<div class="row">
    <div class="col-lg-12">
        <form action="{{ isset($category) ? route('category.update', $category) : route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($category))
                @method('PUT')
            @endif

            <div class="row formtype">

                <!-- Nom -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nom de la categorie</label>
                        <input
                            class="form-control"
                            type="text"
                            name="name"
                            value="{{ old('name', $category->name ?? '') }}"
                        />
                    </div>
                </div>

                <!-- Description -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea
                            class="form-control"
                            rows="5"
                            name="description"
                        >{{ old('description', $category->description ?? '') }}</textarea>
                    </div>
                </div>

                <!-- Statut d'activation -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Activation</label>
                        <select class="form-control" name="isActive">
                            <option value="1" {{ old('isActive', $category->isActive ?? '1') == 1 ? 'selected' : '' }}>Activer</option>
                            <option value="0" {{ old('isActive', $category->isActive ?? '1') == 0 ? 'selected' : '' }}>Ne pas activer</option>
                        </select>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary buttonedit1">
                Enregistrer
            </button>
        </form>
    </div>
</div>

@endsection
