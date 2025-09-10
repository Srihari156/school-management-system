@extends('layouts.admin-layout')
@section('title', 'Admin Change Password')
@section('bg-color','admin-page-bg')
@section('content')
    <p class="display-6">Admin Change Password</p>
        <div class="mt-3">

            <form action="{{route('update.password')}}" method="post" id="admin-change-password-form">
                @csrf
                <input type="password" class="form-control input " name="admin_old_password" placeholder="Old Password"
                    id="admin-old-password">
                <span class="text-danger" id="admin-old-password-error"></span>
                <input type="password" class="form-control input mt-3 " name="admin_new_password" placeholder="New Password"
                    id="admin-new-password">
                <span class="text-danger" id="admin-new-password-error"></span>
                <input type="password" class="form-control input mt-3 " name="admin_confirm_password" placeholder="Confirm Password"
                    id="admin-conform-password">
                <span class="text-danger d-block" id="admin-confirm-password-error"></span>
                <button type="submit" name="admin_change_password_submit" class="btn btn-info mt-3 text-light">Set Password</button>
            </form>
        </div>
@endsection




