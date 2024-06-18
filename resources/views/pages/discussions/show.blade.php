@extends('layouts.app')

@section('body')
    <section class="bg-gray py-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold me-2 color-gray mb-0">Disscussions</div>
                        <div class="fs-2 fw-bold me-2 color-gray mb-0">></div>
                    </div>
                    <h2 class="mb-0">How to add a custom validation in laravel?</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussion mb-5">
                        <div class="row">
                            <div class="col-1 d-flex justify-content-start flex-column align-items-center">
                                <a href="">
                                    <img src="{{url('assets/img/like.png')}}" class="like-icon mb-1" alt="like">
                                </a>
                                <span class="fs-4 color-gray mb-0">12</span>
                            </div>
                            <div class="col-11">
                                <p>I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "user", "admin", "moderator" and "author". I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "user", "admin", "moderator" and "author". I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "user", "admin", "moderator" and "author". I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "user", "admin", "moderator" and "author". I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "user", "admin", "moderator" and "author".</p>
                            </div>
                            <div class="mb-3">
                                <a href="">
                                    <span class="badge rounded-pill text-bg-light">Eloquent</span>
                                </a>
                            </div>
                            <div class="row align-items-center justify-content-between">
                                <div class="col">
                                    <span class="color-gray ms-2">
                                        <a href="javascript:;" id="share-discussion">Share</a>
                                        <input type="text" value={{url('/discussions/lorem')}} id="current-url" class="d-none">
                                    </span>
                                </div>
                                <div class="col-5 col-lg-3 d-flex justify-content-end">
                                    <a href="" class="card-discussion-author flex-shrink-0 rounded-circle overflow-hidden me-1">
                                        <img src="{{url('assets/img/avatar.png')}}" alt="avatar" class="avatar">
                                    </a>
                                    <div class="fs-12px lh-1">
                                        <span class="text-primary">
                                            <a href="" class="fw-bold d-flex align-items-start text-break mb-1">
                                                apridew
                                            </a>
                                        </span>
                                        <span class="color-gray">8 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="mb-5">Replies</h3>
                    <div class="mb-5">
                        <div class="card card-discussion">
                            <div class="row">
                                <div class="col-1 d-flex flex-column align-items-center">
                                    <a href="">
                                        <img src="{{url('assets/img/like.png')}}" alt="like" class="like-icon mb-1">
                                    </a>
                                    <span class="fs-4 color-gray mb-1">12</span>
                                </div>
                                <div class="col-11">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At eligendi eum possimus, unde nisi molestias eveniet alias necessitatibus beatae nihil, repudiandae maiores hic temporibus explicabo maxime numquam omnis? Eos, est!</p>
                                    <div class="row align-items-center justify-content-end">
                                        <div class="col-5 col-lg-3 d-flex justify-content-end">
                                            <a href="" class="card-discussion-author flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{url('assets/img/avatar.png')}}" alt="avatar" class="avatar">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-primary">
                                                    <a href="" class="fw-bold d-flex align-items-start text-break mb-1">
                                                        iwed
                                                    </a>
                                                </span>
                                                <span class="color-gray">6 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-discussion">
                            <div class="row">
                                <div class="col-1 d-flex flex-column align-items-center">
                                    <a href="">
                                        <img src="{{url('assets/img/like.png')}}" alt="like" class="like-icon mb-1">
                                    </a>
                                    <span class="fs-4 color-gray mb-1">12</span>
                                </div>
                                <div class="col-11">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At eligendi eum possimus, unde nisi molestias eveniet alias necessitatibus beatae nihil, repudiandae maiores hic temporibus explicabo maxime numquam omnis? Eos, est!</p>
                                    <div class="row align-items-center justify-content-end">
                                        <div class="col-5 col-lg-3 d-flex justify-content-end">
                                            <a href="" class="card-discussion-author flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{url('assets/img/avatar.png')}}" alt="avatar" class="avatar">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-primary">
                                                    <a href="" class="fw-bold d-flex align-items-start text-break mb-1">
                                                        iwed
                                                    </a>
                                                </span>
                                                <span class="color-gray">6 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fw-bold text-center">Please <span class="text-primary"><a href="{{route('auth.login.show')}}">sign in</a></span> or <span class="text-primary"><a href="{{route('auth.signup.show')}}">create an account</a></span> to participate in this discussion.
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <h3>All Categories</h3>
                        <div>
                            <a href="">
                                <span class="badge rounded-pill text-bg-light">Eloquent</span>
                                <span class="badge rounded-pill text-bg-light">Eloquent</span>
                                <span class="badge rounded-pill text-bg-light">Eloquent</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection

@section('after-script')
    <script>
        $(document).ready(function() {
            $('#share-discussion').click(function(){
                let copyText = $("#current-url")

                copyText[0].select()
                copyText[0].setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText.val())

                let alert = $("#alert")
                alert.removeClass("d-none")

                let alertContainer = alert.find(".container")
                alertContainer.first().text('Share link discussion copied successfully')
             })
        })
    </script>
@endsection