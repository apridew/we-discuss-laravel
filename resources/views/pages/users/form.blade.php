@extends('layouts.app')

@section('body')
    <section class="bg-gray py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <form action="">
                        <div class="d-flex flex-column flex-md-row mb-4">
                            <div class="edit-avatar-wrapper mb-3 mb-md-0 mx-auto mx-md-0">
                                <div class="avatar-wrapper rounded-circle overflow-hidden flex-shrink-0 me-4 bg-white">
                                    <img id="avatar" src="{{url('assets/img/avatar.png')}}" alt="avatar" class="img-fluid">
                                </div>
                                <label for="picture" class="btn p-0 edit-avatar-show rounded-circle">
                                    <img src="{{url('assets/img/edit.png')}}" alt="edit">
                                </label>
                                <input type="file" class="d-none" name="picture" id="picture" accept="image/*">
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" >
                                    <div class="fs-12px color-gray">
                                        Empty this if you don't want to change your password
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" >
                                    <div class="fs-12px color-gray">
                                        Empty this if you don't want to change your password
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary me-4 rounded-3" type="submit">Save</button>
                            <a href="" class="cancel-btn">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $('#picture').on('change', function(e) {
            let output = $('#avatar')
            output.attr('src', URL.createObjectURL(e.target.files[0]))
            output.onload = function() {
                URL.revokeObjectURL(output.attr('src'))
            }
        })
    </script>
@endsection