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
                    <input type="text" class="input  form-control" name="name" placeholder="Username" id="name">
                    <span id="teacher-username-error" class="text-danger"></span>
                    <input type="password" class="input mt-3 form-control" name="password" placeholder="Password"
                        id="password">
                    <span id="teacher-password-error" class="text-danger d-block"></span>
                    <button type="submit" name="admin_login" class="btn btn-primary admin-login mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

