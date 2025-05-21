<div class="header">
    <div class="header-left">
        <a href="{{ route('profile.edit') }}" class="logo">
            <img
                src="{{ asset('back_auth/assets/profile/' . (Auth::user()->image ? Auth::user()->image : 'logo.png')) }}"
                width="50"
                height="70"
                alt="logo"
            />
        </a>
        <span class="logoclass">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
        <span class="logoclass"></span>
        <a href="" class="logo logo-small">
            <img
               src="{{ asset('back_auth/assets/profile/' . (Auth::user()->image ? Auth::user()->image : 'logo.png')) }}"
                alt="Logo"
                width="30"
                height="30"
            />
        </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>
    <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
    <ul class="nav user-menu">

        <li class="nav-item dropdown has-arrow">
            <a href="{{ route('profile.edit') }}" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <span class="user-img"
              ><img
                      class="rounded-circle"
                        src="{{ asset('back_auth/assets/profile/' . (Auth::user()->image ? Auth::user()->image : 'logo.png')) }}" width="31"
                      alt="Josue p"
                  /></span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img
                            src="{{ asset('back_auth/assets/profile/' . (Auth::user()->image ? Auth::user()->image : 'logo.png')) }}"
                            alt="User Image"
                            class="avatar-img rounded-circle"
                        />
                    </div>
                    <div class="user-text">
                        <h6>{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                        <p class="text-muted mb-0">Administrateur</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('setting.index') }}">Paramettre</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Déconnexion</button>
                </form>
            </div>
        </li>
    </ul>
    <div class="top-nav-search">
        <form action="{{ route('admin.search') }}" method="GET">
            @csrf
            <input 
                type="text" 
                name="query" 
                class="form-control" 
                placeholder="Rechercher ici..."
                value="{{ request('query') }}"
            />
            <button class="btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</div>
