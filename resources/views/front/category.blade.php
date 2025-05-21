@extends('front.app')

@section('title', 'CEI - Categorie')


@section('main_section')
    

<div class="row">
@if(count($category->articles))
@foreach ($category->articles as $article)
        
    <div class="col-lg-6">
      <div class="position-relative mb-3">
        <img
          class="img-fluid w-100"
          src="{{ $article->imageUrl() }}"
          style="object-fit: cover"
        />
        <div class="bg-white border border-top-0 p-4">
          <div class="mb-2">
            
            <a class="text-body" href=""
              ><small>
                <i>
                    <span class="text-body">
                        @if(isset($comment->created_at))
                            {{ $comment->created_at->isoFormat('dddd, DD MMMM YYYY') }}
                        @else
                            {{ now()->isoFormat('dddd, DD MMMM YYYY') }}
                        @endif
                    </span>
                </i>
            </small></a>
            
          </div>
          <a
            class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
            href="{{ route('article.detail', $article->slug) }}"
            >{{ $article->title }}</a
          >
          
        </div>
        <div
          class="d-flex justify-content-between bg-white border border-top-0 p-4"
        >
          <div class="d-flex align-items-center">
            <img
              class="rounded-circle mr-2"
              src="{{ asset('back_auth/assets/profile/'.$article->author->image) }}"
              width="25"
              height="25"
              alt=""
            />
            <small>{{ $article->author->name }}</small>
          </div>
          <div class="d-flex align-items-center">
            <small class="ml-3"
              ><i class="far fa-eye mr-2"></i>{{ $article->views }}</small
            >
            <small class="ml-3"
              ><i class="far fa-comment mr-2"></i>{{ $article->comments->count() }}</small
            >
          </div>
        </div>
      </div>
    </div>
    

    @endforeach
    @else
        <div class="col-lg-12">
            <div class="alert alert-danger text-center">Pas d'activité pour cette categorie</div>
        </div>
@endif

    

  </div>
@endsection