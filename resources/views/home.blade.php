<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WeDiscuss</title>

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container flex justify-content-between align-items-center">
              <a class="navbar-brand p-0 h-32px" href="{{route('home')}}">WeDiscuss</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item d-block d-lg-none d-xl-block">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Discussions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">About Us</a>
                  </li>
                </ul>
                <form class="d-flex" role="search" action="#" method="GET">
                  <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><img class="opacity-50" src="{{url('assets/img/search.png')}}" alt="search"></span>
                    <input class="form-control border-start-0 ps-0 " type="search" placeholder="Search" aria-label="Search" name="" value="">
                  </div>
                </form>
                <div class="d-flex flex-column flex-lg-row gap-2 ms-2 mt-2 mt-lg-0 ">
                  <button class="btn btn-primary ps-1 pe-0">
                    <a class="nav-link text-nowrap" href="#">Log In</a>
                  </button>
                  <button class="btn btn-primary-white ps-1 pe-0">
                    <a class="nav-link text-nowra" href="#">Sign Up</a>
                  </button>
                </div>
              </div>
            </div>
          </nav>
          <section class="container hero">
            <div class="row align-items-center h-100">
              <div class="col-12 col-lg-6">
                <h1>WeDiscuss<br/> Technology Community Forum</h1>
                <p class="mb-4">Empowering the technology community to connect, share and learn.</p>
                  <a class="btn btn-primary me-2 mb-2 mb-lg-0" href="#">Sign Up</a>
                  <a class="btn btn-secondary mb-2 mb-lg-0" href="#">Join Discussions</a>
              </div>
              <div class="col-12 col-lg-6 text-center h-315px order-first order-lg-last mb-3 mb-lg-0 pt-2 pt-lg-4">
                <img class="h-100 float-lg-end" src="{{url('assets/img/hero.png')}}" alt="hero">
              </div>
            </div>
          </section>
          <section class="container counter-data min-h-372px">
            <div class="row">
                <div class="col-12 col-lg-4 text-center">
                  <img class="promote-icon mb-2" src="{{url('assets/img/discussions.png')}}" alt="discussion">
                  <h2>Discussions</h2>
                  <p class="fs-3">12,345</p>
                </div>
                <div class="col-12 col-lg-4 text-center">
                  <img class="promote-icon mb-2" src="{{url('assets/img/answers.png')}}" alt="answers">
                  <h2>Answers</h2>
                  <p class="fs-3">12,345</p>
                </div>
                <div class="col-12 col-lg-4 text-center">
                  <img class="promote-icon mb-2" src="{{url('assets/img/users.png')}}" alt="users">
                  <h2>Users</h2>
                  <p class="fs-3">12,345</p>
                </div>
            </div>

          </section>
          <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </body>
</html>
