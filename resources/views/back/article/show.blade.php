@extends('back.app')

@section('title', 'CEI - Détails de l\'activité')

@section('dashboard-header')
<br/><br/><br/><br/><br/>
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Détails de l'activité: {{ $article->title }}</h4>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-md-8">
        <div class="blog-view">
            <article class="blog blog-single-post">
                <h3 class="blog-title">{{ $article->title }}</h3>
                <div class="blog-image">
                    <a href="blog-details.html"><img alt="" src="{{ $article->imageUrl() }}" class="img-fluid mt-4"></a>
                </div>
                <div class="blog-content mt-4">
                    <p>{{ $article->description }}</p>
                </div>
            </article>
            <small>Tags count: {{ $article->tags->count() }}</small>

            <!-- Affichage des tags -->
            @if($article->tags->isNotEmpty())
            <div>
                <strong>Tags:</strong>
                @foreach($article->tags as $tag)
                    <span class="badge badge-primary">{{ $tag->name }}</span>
                @endforeach
            </div>
        @endif
        

            <div class="widget author-widget clearfix">
                <h3>A propos de l'auteur</h3>
                <div class="about-author">
                    <div class="about-author-img">
                        <div class="author-img-wrap">
                            <img src="{{ $article->getAuthorImage() }}" width="80">
                        </div>
                    </div>
                    <div class="author-details">
                        <span class="blog-author-name">{{ $article->author->name ?? 'Auteur inconnu' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
