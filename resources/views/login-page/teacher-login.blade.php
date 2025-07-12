@extends('layouts.login-layout')
@section('title', 'Teacher Login Page')
@section('bg-color', 'login-page-bg')
@section('content')
    <div class="container mt-5">
        <div class="parent">
            <div>
                <img src="{{url('images/1000_F_344622326_0uFbEvuGUwYFlHgJjIofNMAqseVU8Lry.jpg')}}" alt=""
                    class="teacher-image">
            </div>
            <div class="form ">
                <h3 class="text-info text-center">Teacher Login</h3>
                <form action="{{route('store.teacher-login')}}" method="post" id="teacher-login">
                    <input type="text" class="input mb-3 form-control" name="name" placeholder="Username" id="name">
                    <span id="teacher-username-error" class="text-danger"></span>
                    <input type="password" class="input mb-3 form-control" name="password" placeholder="Password"
                        id="password">
                    <span id="teacher-password-error" class="text-danger d-block"></span>
                    <button type="submit" name="admin_login" class="btn btn-primary admin-login">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#teacher-login').on('submit', function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('store.teacher-login')}}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (data) {
                        console.log(data);
                        if (data.code === 422) {
                            if (data.error.name) {
                                $('#teacher-username-error').html(data.error.name);
                            }
                            if (data.error.password) {
                                $('#teacher-password-error').html(data.error.password);
                            }
                        }else if(data.status === 200) {
                            console.log('redirecting: ', data.redirect);
                            window.location.href = data.redirect;
                        }
                        
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        Swal.fire({
                            title: "error !",
                            text: 'Teacher Login Error',
                            icon: 'error'
                        });
                    }
                });
            });
        });
    </script>
@endsection