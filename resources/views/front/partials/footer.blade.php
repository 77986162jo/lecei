<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
  <div class="row py-4">

    <!-- CONTACT -->
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">
        Contactez nous
      </h5>
      <p class="font-weight-medium">
        <i class="fa fa-map-marker-alt mr-2"></i>{{ $global_settings->adress }}
      </p>
      <p class="font-weight-medium">
        <i class="fa fa-phone-alt mr-2"></i>{{ $global_settings->phone }}
      </p>
      <p class="font-weight-medium">
        <i class="fa fa-envelope mr-2"></i>{{ $global_settings->email }}
      </p>
      <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">
        Suivez nous
      </h6>
      <div class="d-flex justify-content-start">
        @foreach ($global_social as $item)
          <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="{{ $item->link }}">
            <i class="{{ $item->icon }}"></i>
          </a>
        @endforeach
      </div>
    </div>

    <!-- INFOS POPULAIRES -->
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">
        Infos Populaires
      </h5>
      @foreach($global_famous_articles as $article)
        <div class="mb-3">
          <div class="mb-2">
            <a class="badge badge-info text-uppercase font-weight-semi-bold p-1 mr-2" href="#">
              {{ $article->category->name }}
            </a>
            <a class="text-body" href="#">
              <small>
                {{ $article->created_at ? $article->created_at->isoFormat('dddd, DD MMMM YYYY') : now()->isoFormat('dddd, DD MMMM YYYY') }}
              </small>
            </a>
          </div>
          <a class="small text-body text-uppercase font-weight-medium" href="{{ route('article.detail', $article->slug) }}">
            {{ $article->title }}
          </a>
        </div>
      @endforeach
    </div>

    <!-- CATÉGORIES -->
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">
        Catégories
      </h5>
      <div class="m-n1">
        @foreach ($global_category as $category)
          <a href="{{ route('category.activite', $category->slug) }}" class="btn btn-sm btn-secondary m-1">
            {{ $category->name }}
          </a>
        @endforeach
      </div>
    </div>

    <!-- PHOTOS FLIRCK (3 articles populaires) -->
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">
        Flickr Photos
      </h5>
      <div class="row">
        @foreach($global_famous_articles as $article)
          <div class="col-4 mb-3">
            <a href="{{ route('article.detail', $article->slug) }}">
              <img class="w-100" src="{{ $article->imageUrl() }}" alt="images"/>
            </a>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</div>

<!-- BAS DE PAGE -->
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111">
  <p class="m-0 text-center">
    CEI &copy; <a href="#">{{ $global_settings->web_site_name }}</a> 2025 . Tout droit reservé.
    Conçu et développé par  <a href="https://josueservicedigital.com">josueservicedigital</a><br />
  </p>
</div>
