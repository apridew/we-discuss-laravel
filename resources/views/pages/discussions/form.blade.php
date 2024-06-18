@extends('layouts.app')

@section('body')
    <section class="bg-gray py-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold me-2 mb-0">
                            Ask a Question
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussion mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('discussions.store')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" autofocus>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_slug" class="form-label fw-bold">Category</label>
                                        <select name="category_slug" id="category_slug" class="form-select @error('category_slug') is-invalid @enderror">
                                            <option value="">--Select Category--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->slug }}"
                                                    @if (old('category_slug') == $category->slug){{ 'selected' }} @endif>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_slug')
                                            <div class="invalid-feedback">Please select a category.</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label fw-bold">Question</label>
                                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30" rows="10">{{old('content')}}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">Content is required.</div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-primary rounded-2 me-4">Post</button>
                                        <a href="{{route('discussions.index')}}" class="cancel-btn">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: 'Type your question here',
                tabsize: 2,
                height: 320,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ]
            })
            $('span.note-icon-caret').remove()
            $('div.note-modal-footer').height(60)
        })
    </script>
@endsection