@extends('layouts.app')
@section('body')
<main>
  <section class="container hero">
    <div class="row align-items-center h-100">
      <div class="col-12 col-lg-6">
        <h1>WeDiscuss<br/> Technology Community Forum</h1>
        <p class="mb-4">Empowering the technology community to connect, share and learn.</p>
        @guest
          <a class="btn btn-primary me-2 mb-2 mb-lg-0" href="{{route('auth.signup.show')}}">Sign Up</a>  
        @endguest
          <a class="btn btn-secondary mb-2 mb-lg-0" href="{{route('discussions.index')}}">Join Discussions</a>
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
    <section class="bg-gray help-others">
      <div class="container py-80px">
        <h2 class="text-center pb-5">Help Others</h2>
        <div class="row">
          <div class="col-12 col-lg-4 mb-3">
            <div class="card">
              <a href="#">
                <h3>How to add a custom validation in laravel?</h3>
              </a>
              <div>
                <p class="mb-5">I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the ...</p>
                <div class="row">
                  <div class="col me-1 me-lg-2">
                    <a href="#"><span class="badge rounded-pill text-bg-light">Eloquent</span></a>
                  </div>
                  <div class="col-5 col-lg-7">
                    <div class="avatar-sm-wrapper d-inline-block">
                      <a class="me-1" href="#"><img class="img-fluid rounded-circle" src="{{url('assets/img/avatar.png')}}" alt="">
                      </a>
                    </div>
                    <span class="fs-12px"><a href="#" class="me-1 fw-bold">apridew</a>
                    <span class="color-gray">8 hours ago</span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-3">
            <div class="card">
              <a href="#">
                <h3>How to add a custom validation in laravel?</h3>
              </a>
              <div>
                <p class="mb-5">I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the ...</p>
                <div class="row">
                  <div class="col me-1 me-lg-2">
                    <a href="#"><span class="badge rounded-pill text-bg-light">Eloquent</span></a>
                  </div>
                  <div class="col-5 col-lg-7">
                    <div class="avatar-sm-wrapper d-inline-block">
                      <a class="me-1" href="#"><img class="img-fluid rounded-circle" src="{{url('assets/img/avatar.png')}}" alt="">
                      </a>
                    </div>
                    <span class="fs-12px"><a href="#" class="me-1 fw-bold">apridew</a>
                    <span class="color-gray">8 hours ago</span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-3">
            <div class="card">
              <a href="#">
                <h3>How to add a custom validation in laravel?</h3>
              </a>
              <div>
                <p class="mb-5">I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the ...</p>
                <div class="row">
                  <div class="col me-1 me-lg-2">
                    <a href="#"><span class="badge rounded-pill text-bg-light">Eloquent</span></a>
                  </div>
                  <div class="col-5 col-lg-7">
                    <div class="avatar-sm-wrapper d-inline-block">
                      <a class="me-1" href="#"><img class="img-fluid rounded-circle" src="{{url('assets/img/avatar.png')}}" alt="">
                      </a>
                    </div>
                    <span class="fs-12px"><a href="#" class="me-1 fw-bold">apridew</a>
                    <span class="color-gray">8 hours ago</span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container cta min-h-372px d-flex gap-3 flex-column align-items-center justify-content-center">
      <h2>Ready to get started?</h2>
      <p class="mb-4">Want to make a big impact?</p>
      <div class="text-center">
        @guest
          <a class="btn btn-primary me-2 mb-2 mb-lg-0" href="{{route('auth.signup.show')}}">Sign Up</a>
        @endguest
        <a class="btn btn-secondary mb-2 mb-lg-0" href="{{route('discussions.index')}}">Join Discussions</a>
      </div>
    </section>
</main>
@endsection
       
