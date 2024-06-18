@extends('layouts.auth')

@section('body')
    <section class="bg-gray vh-100">
        <div class="container">
            <div class="row pt-5 justify-content-center">
                <div class="col-12 col-lg-6 my-auto mb-5 mb-lg-auto me-0">
                    <div class="d-none d-lg-block">
                        <h2>Join WeDiscuss Community</h2>
                        <p>
                            <ul>
                                <li>Stuck? Ask in the Discussions</li>
                                <li> Get answers from experienced developers from around the world</li>
                                <li>Contribute by answering questions</li>
                            </ul>
                        </p>
                    </div>
                    <div class="d-block d-lg-none w-100 text-center">
                        Create your account in a minute. It's free.
                    </div>
                </div>
                <div class="col-12 col-lg-3 h-100">
                    <a href="{{route('home')}}" class="nav-link mb-4 text-center fs-3 text-primary fw-bold spa">WeDiscuss</a>
                    <div class="card mb-4">
                        <form action="{{route('auth.signup.signup')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autocomplete="off" autofocus value="{{old('email')}}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group mb-3">
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" aria-label="Password" aria-describedby="password">
                                    <span class="input-group-text  @error('password') border-danger rounded-end @enderror" id="password">
                                        <a href="javascript:;" id="password-toggle"><img id="password-toggle-img" src="{{url('assets/img/eye-slash.png')}}" alt="password"></a>
                                    </span>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" autocomplete="off value="{{old('username')}}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary rounded-2">Log In</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                        Already have an account?<u><a href="{{route('auth.login.show')}}"> Log In</a></u>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        let isPasswordVisible = false
        $('#password-toggle').on('click', function() {
            isPasswordVisible = !isPasswordVisible

            if(isPasswordVisible) {
                $("#password-toggle-img").attr('src', "{{url('assets/img/eye.png')}}")
                $("#password").attr('type', 'text')
            }else{
                $("#password-toggle-img").attr('src', "{{url('assets/img/eye-slash.png')}}")
                $("#password").attr('type', 'password')
            }
        })        
    </script>
@endsection