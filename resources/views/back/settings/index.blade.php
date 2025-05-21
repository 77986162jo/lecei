@extends('back.app')
@section('title', 'Dashboard - Paramètres')

@section('dashboard-content')

<div class="row">
  <div class="col-lg-12">

    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT') <!-- Utilisation de la méthode PUT pour la mise à jour -->

      <h3 class="page-title">Paramètres de base</h3>
      <div class="row mt-4">

        <div class="col-md-4">
          <div class="form-group">
            <label>Nom du site <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="website_name" value="{{ old('website_name', $settings->website_name ?? '') }}" />
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Télécharger un logo</label>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFile" name="logo" />
              <label class="custom-file-label" for="logo">Choisir une image</label>
            </div>
            @if($settings->logo)
              <div class="mt-2">
                <img src="{{ asset('storage/setting/' . $settings->logo) }}" alt="Logo actuel" height="60">
              </div>
            @endif
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Adresse</label>
            <input class="form-control" value="{{ old('adress', $settings->adress ?? '') }}" type="text" name="adress" />
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Numéro de téléphone</label>
            <input class="form-control" value="{{ old('phone', $settings->phone ?? '') }}" type="text" name="phone" />
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" value="{{ old('email', $settings->email ?? '') }}" type="email" name="email" />
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="5" name="about">{{ old('about', $settings->about ?? '') }}</textarea>
          </div>
        </div>

      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-primary buttonedit">
          Enregistrer
        </button>
      </div>

    </form>
  </div>
</div>

@endsection
