@extends('layouts.auth')

@section('body')
    <section class="bg-gray vh-100">
        <div class="container h-100 pt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-3">
                    <a href="{{route('home')}}" class="nav-link mb-4 text-center fs-3 text-primary fw-bold spa">WeDiscuss</a>
                    <div class="card mb-4">
                        <form action="">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="name@example.com" autocomplete="off" autofocus>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group mb-3">
                                    <input id="password" name="password" type="password" class="form-control" placeholder="password" aria-label="Password" aria-describedby="password">
                                    <span class="input-group-text" id="password">
                                        <a href="javascript:;" id="password-toggle"><img id="password-toggle-img" src="{{url('assets/img/eye-slash.png')}}" alt="password"></a>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary rounded-2">Log In</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                        Don't have an account?<u><a href="{{route('auth.signup.show')}}"> Sign Up</a></u>
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