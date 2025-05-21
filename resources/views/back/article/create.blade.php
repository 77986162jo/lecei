@extends('back.app')
@section('title', 'CEI - Ajouter une activité')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">@if(isset($article)) Modifier @else Ajouter @endif un article</h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ isset($article) ? route('activite.update', $article) : route('activite.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($article))
                @method('PUT')
            @endif

            <div class="row formtype">
                @if(isset($article))
                <div class="col-12 mb-3">
                    <img src="{{ $article->imageUrl() }}" alt="{{ $article->title }}" style="width:100%" height="200" />
                </div>
                @endif

                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="title">Titre de l'activité</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}" />
                    @error('name')
                    <p class="text-reed-500 mt-2">{{ $message }}</p>
                    @enderror
                    
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sel1">Catégorie</label>
                        <select class="form-control" id="sel1" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $article->category_id ?? '') == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="image">Modifier l'image</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="image" name="image" />
                            <label class="custom-file-label" for="image">Choisir une image</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="comment">Description</label>
                        <textarea class="form-control" rows="5" id="comment" name="description">{{ old('description', $article->description ?? '') }}</textarea>

                        @error('description')
                        <p class="text-reed-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>




{{-- Tags déjà associés --}}
                @if(isset($article))
                <div class="col-md-12 mt-3">
                    @foreach($article->tags as $tag)
                        <span class="badge badge-primary">{{ $tag->name }}</span>
                    @endforeach
                </div>
                @endif

                {{-- Input des tags dynamiques --}}
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <div class="input-container">
                            <input type="text" id="tags" class="form-control"/>
                            <div id="tags-container" class="tags-container mt-2"></div>
                            <input type="hidden" name="tags" id="hidden-tags" />
                        </div>
                    </div>
                    @if($errors->has('tags'))
                        <div class="text-danger">{{ $errors->first('tags') }}</div>
                    @endif
                </div>







                {{-- Publication --}}
                <div class="col-md-4">
                    <label>Publication:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="isActive" value="1" @checked(old('isActive', $article->isActive ?? 1) == 1)>
                        <label class="form-check-label">Publier</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="isActive" value="0" @checked(old('isActive', $article->isActive ?? 1) == 0)>
                        <label class="form-check-label">Ne pas publier</label>
                    </div>
                </div>

                {{-- Partages --}}
                <div class="col-md-4">
                    <label>Partages:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="isSharable" value="1" @checked(old('isSharable', $article->isSharable ?? 1) == 1)>
                        <label class="form-check-label">Partageable</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="isSharable" value="0" @checked(old('isSharable', $article->isSharable ?? 1) == 0)>
                        <label class="form-check-label">Non partageable</label>
                    </div>
                </div>

                {{-- Commentaires --}}
                <div class="col-md-4">
                    <label>Commentaires:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="isComment" value="1" @checked(old('isComment', $article->isComment ?? 1) == 1)>
                        <label class="form-check-label">Autorisé</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="isComment" value="0" @checked(old('isComment', $article->isComment ?? 1) == 0)>
                        <label class="form-check-label">Non autorisé</label>
                    </div>
                </div>

                

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-3">Enregistrer l'activité</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection













