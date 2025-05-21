<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
      <div class="col-lg-9">
        <nav class="navbar navbar-expand-sm bg-dark p-0">
          <ul class="navbar-nav ml-n2">
            <li class="nav-item border-right border-secondary">
              <a class="nav-link text-body small" href="#">
                @php
                    $now = now(); // Utilisation de la helper function now() au lieu de Carbon::now()
                @endphp
                {{ $now->isoFormat('dddd, DD MMMM YYYY') }} 
            </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-body small" href="{{route('bienvenue')}}">Login</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="col-lg-3 text-right d-none d-md-block">
        <nav class="navbar navbar-expand-sm bg-dark p-0">
          <ul class="navbar-nav ml-auto mr-n2">
            @if(count($global_social))
            @foreach ($global_social as $item)
            <li class="nav-item">
              <a class="nav-link text-body" href="{{ $item->link }}"
                ><small class="{{ $item->icon }}"></small
              ></a>
            </li>
          @endforeach
            @endif
  	     
          </ul>
        </nav>
      </div>
    </div>
   

 <div class="row align-items-center bg-white py-3 px-lg-5">
    <div class="col-lg-4"> 
    </div>
    </div>
</div>

  