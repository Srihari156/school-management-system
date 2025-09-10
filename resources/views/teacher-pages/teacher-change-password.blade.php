@extends('layouts.teacher-layout')
@section('title', 'Teacher Change Password')
@section('bg-color', 'teacher-page-bg')
@section('content')
    <p class="display-6">Teacher Change Password</p>
    <div class="mt-3">

        <form action="" method="post" id="teacher-change-password-form">
            <input type="password" class="form-control input mb-3" name="teacher_old_password" placeholder="Old Password"
                id="teacher-student-password">
            <span id="old-password-error" class="text-danger"></span>
            <input type="password" class="form-control input mt-3 mb-3" name="teacher_new_password"
                placeholder="New Password" id="teacher-new-password">
            <span id="new-password-error" class="text-danger"></span>
            <input type="password" class="form-control input mt-3 mb-3" name="teacher_confirm_password"
                placeholder="Confirm Password" id="teacher-confirm-password">
            <span id="confirm-password-error" class="text-danger d-block"></span>
            <button type="submit" name="teacher_change_password_submit" class="btn btn-info mt-3 text-light">Set
                Password</button>
        </form>
    </div>
@endsection

