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
                                <div>{!! $discussion->content !!}</div>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('discussions.categories.show', $discussion->category->slug) }}">
                                    <span class="badge rounded-pill text-bg-light">{{ $discussion->category->slug }}</span>
                                </a>
                            </div>
                            <div class="row align-items-center justify-content-between">
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <span class="color-gray ms-2">
                                            <a href="javascript:;" id="share-discussion">Share</a>
                                            <input type="text" value={{ route('discussions.show', $discussion->slug) }} id="current-url" class="d-none">
                                        </span>
                                        @if ($discussion->user->id === auth()->id())   
                                        <span class="color-gray ms-3">
                                            <a href="{{ route('discussions.edit', $discussion->slug) }}">Edit</a>
                                        </span>
                                        
                                        <form action="{{ route('discussions.destroy', $discussion->slug)}}" class="d-inline-block lh-1" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="color-gray cancel-btn btn border-0" id="delete-discussion">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-5 col-lg-3 d-flex justify-content-end">
                                    <a href="" class="card-discussion-author flex-shrink-0 rounded-circle overflow-hidden me-1">
                                        <img src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL) 
                                        ? $discussion->user->picture : Storage::url($discussion->user->picture) }}" alt="{{ $discussion->user->username }}" class="avatar rounded-circle">
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

                    @php
                        $answerCount = $discussion->answers->count();
                    @endphp

                    <h3 class="mb-5">{{ $answerCount . ' ' . Str::plural('Reply', $answerCount)}}</h3>

                    <div class="mb-5">
                        @forelse ($discussionAnswer as $answer)
                        <div class="card card-discussion">
                            <div class="row">
                                <div class="col-1 d-flex flex-column align-items-center">
                                    <a href="javascript:;" data-id="{{ $answer->id }}" 
                                        class="answer-like d-flex align-items-center flex-column" data-liked="{{ $answer->liked() }}">
                                        <img src="{{$answer->liked() ? $likedImage : $notLikedImage}}" alt="like" class="answer-like-icon like-icon mb-1">
                                        <span class="answer-like-count fs-4 color-gray mb-1">{{ $answer->likeCount }}</span>
                                    </a>
                                </div>
                                <div class="col-11">
                                    <div>
                                        {!! $answer->answer !!}
                                    </div>
                                    <div class="row align-items-center justify-content-end">
                                        <div class="col pt-3">
                                        @if ($answer->user->id === auth()->id())   
                                        <span class="color-gray">
                                            <a href="{{ route('answers.edit', $answer->id) }}">Edit</a>
                                        </span>
                                        
                                        <form action="{{ route('answers.destroy', $answer->id)}}" class="d-inline-block lh-1" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-answer color-gray cancel-btn btn border-0">Delete</button>
                                        </form>
                                        @endif
                                        </div>
                                        <div class="col-5 col-lg-3 d-flex justify-content-end">
                                            <a href="" class="card-discussion-author flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{ filter_var($answer->user->picture, FILTER_VALIDATE_URL) 
                                        ? $answer->user->picture : Storage::url($answer->user->picture) }}" alt="{{ $answer->user->username }}" class="avatar">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="{{ $answer->user->username === $discussion->user->username ? 'text-primary' : ''}}">
                                                    <a href="" class="fw-bold d-flex align-items-start text-break mb-1">
                                                        {{ $answer->user->username }}
                                                    </a>
                                                </span>
                                                <span class="color-gray">{{ $answer->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="card card-discussion">
                            Currently no reply yet.
                        </div>
                        @endforelse
                        <div class="pt-3">
                            {{$discussionAnswer->links()}}
                        </div> 
                    </div>
                    @auth
                    <h3 class="mb-5">Your Reply</h3>    
                    <div class="card card-discussion">
                        <form action="{{ route('discussions.answer.store', $discussion->slug)}}" method="POST">
                            @csrf
                            <textarea name="answer" id="answer">
                            {{old('answer')}}
                            </textarea>
                            <div class="d-flex justify-content-end align-items-center mt-3">
                                <button type="submit" class="btn btn-primary rounded-2">Reply</button>
                            </div>
                        </form>
                    </div>
                    @endauth

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
            $('#answer').summernote({
                placeholder: 'Type your reply here',
                tabsize: 2,
                height: 220,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ]
             });

            $('span.note-icon-caret').remove();
            $('div.note-modal-footer').height(60);

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
             });

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

            $('#delete-discussion').click(function(e) {
                if(!confirm('Are you sure you want to delete this discussion?')){
                    e.preventDefault();
                }
            });

            $('.delete-answer').click(function(e) {
                if(!confirm('Are you sure you want to delete this reply?')){
                    e.preventDefault();
                }
            });

            $('.answer-like').click(function() {
            let $this = $(this);
            let id = $this.data('id');
            let isLiked = $this.data('liked');
            let likeRoute = isLiked ? '{{ url('') }}/answers/' + id + '/unlike'
                : '{{ url('') }}/answers/' + id + '/like';

            $.ajax({
                method: 'POST',
                url: likeRoute,
                data: {
                    '_token': '{{ csrf_token() }}'
                }
            })
            .done(function(res) {
                if (res.status === 'success') {
                    console.log(res.data);
                    $this.find('.answer-like-count').text(res.data.likeCount);

                    if (isLiked) {
                        $this.find('.answer-like-icon').attr('src', '{{ $notLikedImage }}');
                    }
                    else {
                        $this.find('.answer-like-icon').attr('src', '{{ $likedImage }}');
                    }

                    $this.data('liked', !isLiked);
                }
            })

        });
        });
    </script>
@endsection