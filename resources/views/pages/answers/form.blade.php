@extends('layouts.app')

@section('body')
    <section class="bg-gray py-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold me-2 mb-0">
                            Answer a Question
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussion mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="answer" class="form-label fw-bold">Answer</label>
                                        <textarea name="answer" class="form-control" id="answer" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-primary rounded-2 me-4">Post</button>
                                        <a href="">Cancel</a>
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
            $('#answer').summernote({
                placeholder: 'Type your answer here',
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