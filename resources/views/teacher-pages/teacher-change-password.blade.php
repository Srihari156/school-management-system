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

@section('script')
    <script>
        $(document).ready(function () {
            $('#teacher-change-password-form').on('submit', function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('store.teacher-change-password')}}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (data) {
                        console.log(data);
                        if (data.code === 422) {
                            if (data.error.teacher_old_password) {
                                $("#old-password-error").html(data.error.teacher_old_password[0]);
                            }
                            if (data.error.teacher_new_password) {
                                $("#new-password-error").html(data.error.teacher_new_password[0]);
                            }
                            if (data.error.teacher_confirm_password) {
                                $("#confirm-password-error").html(data.error.teacher_confirm_password[0]);
                            }
                        } else if (data.code === 200) {
                            Swal.fire({
                                title: "Good job !",
                                text: data.message,
                                icon: 'success'
                            });
                             $('#teacher-change-password-form')[0].reset();
                        } else if (data.code === 403) {
                            $("#old-password-error").html(data.message);
                        } else if (data.code === 405) {
                            Swal.fire({
                                title: "Error !",
                                text: data.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                         Swal.fire({
                            title: "Error !",
                            text: "change password error",
                            icon: 'error'
                        });
                    }
                });
            });
        });
    </script>
@endsection