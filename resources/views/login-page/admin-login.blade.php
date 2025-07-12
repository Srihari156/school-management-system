@extends('layouts.login-layout')
@section('title', 'Admin Login Page')
@section('bg-color', 'login-page-bg')
@section('content')
    <div class="container mt-5">
        <div class="parent">
            <div>
                <img src="{{url('images/man-using-laptop-login-username-260nw-2587212981.jpg')}}" alt=""
                    class="admin-image">
            </div>
            <div class="form ">
                <h3 class="text-info text-center">Admin Login</h3>
                <form action="{{route('storeLogin')}}" method="post" id="admin-login">
                    @csrf
                    <input type="text" class="input mb-3 form-control" name="username" id="username" placeholder="Username">
                    <span class="text-danger d-block" id="username-error"></span>
                    <input type="password" class="input mb-3 form-control" name="password" id="password"
                        placeholder="Password">
                    <span class="text-danger d-block" id="password-error"></span>
                    <button type="submit" name="admin_login" class="btn btn-primary admin-login">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#admin-login').submit(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#username-error').html('');
                $('#password-error').html('');
                $.ajax({
                    type: 'POST',
                    url: '{{route('storeLogin')}}',
                    data: $(this).serialize(),
                    success: function (data) {
                        console.log('Response:', data);
                        if (data.code === 422) {
                            // $('.error-message').html('');
                            if (data.error.username) {
                                $('#username-error').html(data.error.username[0]);
                            }
                            if (data.error.password) {
                                $('#password-error').html(data.error.password[0]);
                            }
                        } 
                        else if (data.code === 200) {
                            // if (data.errors.username == 'The username field is required.') {
                            //     $('#username-error').html(`<p>${data.errors.username}</p>`);
                            // } else {
                            //      $('#password-error').html(`<p>${data.errors.password[0]}</p>`);
                            // }
                            console.log('Redirecting to:', data.redirect);
                            Swal.fire({
                                title: "Good Job !",
                                text: 'Login Successfully',
                                icon: 'success'
                        });
                            window.location.href = '{{route('admin.admin-page')}}';
                            // alert(data.errors.username);
                            // alert(data.errors.password[0]);
                        } else if(data.code === 401) {
                            Swal.fire({
                                title: "error !",
                                text: data.error,
                                icon: 'error'
                        });
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
                    //     if (res.code === 401) {
                    //         $('#password-error').html(res.error.password[0]);
                    //     } 
                    //     else if () {
                            
                    //         alert('login failed');
                    //     }


                    // }
                });
            });
            Swal.fire({
                title: "error !",
                text: error,
                icon: 'error'
            });
        })
    </script>
@endsection