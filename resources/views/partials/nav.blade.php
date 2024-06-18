<header>
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container flex justify-content-between align-items-center">
          <a class="navbar-brand p-0 h-32px" href="{{route('home')}}">WeDiscuss</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item d-block d-lg-none d-xl-block">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'discussions.index' ? 'active' : ''}}" aria-current="page" href="{{route('discussions.index')}}">Discussions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('home')}}">About Us</a>
              </li>
            </ul>
            <form class="d-flex" role="search" action="#" method="GET">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><img class="opacity-50" src="{{url('assets/img/search.png')}}" alt="search"></span>
                <input class="form-control border-start-0 ps-0" type="search" placeholder="Search" aria-label="Search" name="" value="">
              </div>
            </form>
            @auth
                <ul class="navbar-nav ms-auto my-3 my-lg-0">
                  <li class="nav-item my-auto dropdown">
                    <a class="nav-link p-0 d-flex align-items-center" href="javascript:;" data-bs-toggle="dropdown">
                      <div class="me-2">
                        <img src="{{ filter_var(auth()->user()->picture, FILTER_VALIDATE_URL) 
                          ? auth()->user()->picture : Storage::url(auth()->user()->picture) }}" 
                          alt="{{ auth()->user()->username }}" class="avatar rounded-circle">
                      </div>
                      <span class="fw-bold">{{ auth()->user()->username }}</span>
                    </a>
                    <ul class="dropdown-menu mt-2">
                      <li>
                        <a class="dropdown-item" href="{{ route('users.show', auth()->user()->username) }}">My Profile</a>
                      </li>
                      <li>
                        <form action="{{ route('auth.login.logout')}}" method="POST">
                          @csrf
                          <button type="submit" class="dropdown-item">Log out</button>
                        </form>
                      </li>
                    </ul>
                  </li>
                </ul>
            @endauth
            @guest               
            <div class="d-flex flex-column flex-lg-row gap-2 ms-2 mt-2 mt-lg-0 ">
              <button class="btn btn-primary ps-1 pe-0">
                <a class="nav-link text-nowrap" href="{{route("auth.login.show")}}">Log In</a>
              </button>
              <button class="btn btn-primary-white ps-1 pe-0">
                <a class="nav-link text-nowra" href="{{route("auth.signup.show")}}">Sign Up</a>
              </button>
            </div>
            @endguest
          </div>
        </div>
      </nav>
  </header>