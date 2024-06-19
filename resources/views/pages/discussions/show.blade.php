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
                    <h2 class="mb-0">{{ $discussion->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussion mb-5">
                        <div class="row">
                            <div class="col-1 d-flex justify-content-start flex-column align-items-center">
                                 <a id="discussion-like" href="javascript:;" data-liked="{{ $discussion->liked() }}">
                                    <img src="{{ $discussion->liked() ? $likedImage : $notLikedImage }}" 
                                        alt="Like" id="discussion-like-icon" class="like-icon mb-1">
                                </a>
                                <span id="discussion-like-count" class="fs-4 color-gray mb-1">{{ $discussion->likeCount }}</span>
                            </div>
                            <div class="col-11">
                                <p>{!! $discussion->content !!}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('discussions.categories.show', $discussion->category->slug) }}">
                                    <span class="badge rounded-pill text-bg-light">{{ $discussion->category->slug }}</span>
                                </a>
                            </div>
                            <div class="row align-items-center justify-content-between">
                                <div class="col">
                                    <span class="color-gray ms-2">
                                        <a href="javascript:;" id="share-discussion">Share</a>
                                        <input type="text" value={{ route('discussions.show', $discussion->slug) }} id="current-url" class="d-none">
                                    </span>
                                </div>
                                <div class="col-5 col-lg-3 d-flex justify-content-end">
                                    <a href="" class="card-discussion-author flex-shrink-0 rounded-circle overflow-hidden me-1">
                                        <img src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL) 
                                        ? $discussion->user->picture : Storage::url($discussion->user->picture) }}" alt="avatar" class="avatar rounded-circle">
                                    </a>
                                    <div class="fs-12px lh-1">
                                        <span class="text-primary">
                                            <a href="" class="fw-bold d-flex align-items-start text-break mb-1">
                                                {{ $discussion->user->username }}
                                            </a>
                                        </span>
                                        <span class="color-gray">{{ $discussion->created_at->diffForHumans()}}</span>
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
                    </div>
                    @guest
                        <div class="fw-bold text-center">Please <span class="text-primary"><a href="{{route('auth.login.show')}}">sign in</a></span> or <span class="text-primary"><a href="{{route('auth.signup.show')}}">create an account</a></span> to participate in this discussion.
                        </div>
                    @endguest
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <h3>All Categories</h3>
                        <div>
                            @foreach ($categories as $category)    
                            <a href="{{ route('discussions.categories.show', $category->slug)}}">
                                <span class="badge rounded-pill text-bg-light">{{ $category->name }}</span>
                            </a>
                            @endforeach
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

                setTimeout(function() {
                    alert.addClass("d-none");
                }, 1500);
             })

            $('#discussion-like').click(function() {
                let isLiked = $(this).data('liked');
                let likeRoute = isLiked ? '{{ route("discussions.like.unlike", $discussion->slug) }}'
                    : '{{ route("discussions.like.like", $discussion->slug) }}';

                $.ajax({
                    method: 'POST',
                    url: likeRoute,
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                })
                .done(function(res) {
                    if (res.status === 'success') {
                        $('#discussion-like-count').text(res.data.likeCount);

                    if (isLiked) {
                        $('#discussion-like-icon').attr('src', '{{ $notLikedImage }}');
                    } else {
                        $('#discussion-like-icon').attr('src', '{{ $likedImage }}');
                    }

                    $('#discussion-like').data('liked', !isLiked);
                    }
                })
            });
        });
    </script>
@endsection