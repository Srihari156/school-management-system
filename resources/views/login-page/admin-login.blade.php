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
                <form action="" method="post" id="admin-login">
                    @csrf
                    <input type="text" class="input  form-control" name="username" id="username" placeholder="Username">
                    <span class="text-danger d-block" id="username-error"></span>
                    <input type="password" class="input mt-3 form-control" name="password" id="password"
                        placeholder="Password">
                    <span class="text-danger d-block" id="password-error"></span>
                    <button type="submit" name="admin_login" class="btn btn-primary admin-login mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

