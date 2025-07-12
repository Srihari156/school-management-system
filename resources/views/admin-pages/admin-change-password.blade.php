@extends('layouts.admin-layout')
@section('title', 'Admin Change Password')
@section('bg-color','admin-page-bg')
@section('content')
    <p class="display-6">Admin Change Password</p>
        <div class="mt-3">

            <form action="{{route('update.password')}}" method="post" id="admin-change-password-form">
                @csrf
                <input type="password" class="form-control input mb-3" name="admin_old_password" placeholder="Old Password"
                    id="admin-old-password">
                <span class="text-danger" id="admin-old-password-error"></span>
                <input type="password" class="form-control input mt-3 mb-3" name="admin_new_password" placeholder="New Password"
                    id="admin-new-password">
                <span class="text-danger" id="admin-new-password-error"></span>
                <input type="password" class="form-control input mt-3 mb-3" name="admin_confirm_password" placeholder="Confirm Password"
                    id="admin-conform-password">
                <span class="text-danger d-block" id="admin-confirm-password-error"></span>
                <button type="submit" name="admin_change_password_submit" class="btn btn-info mt-3 text-light">Set Password</button>
            </form>
        </div>
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $('#admin-change-password-form').on('submit', function(event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('update.password')}}',
                    type: 'POST',
                    data:$(this).serialize(),
                    success: function (data) {
                        console.log(data);
                        if (data.code === 422) {
                            if (data.error.admin_old_password) {
                                $('#admin-old-password-error').html(data.error.admin_old_password[0]);
                            }
                            if (data.error.admin_new_password) {
                                $('#admin-new-password-error').html(data.error.admin_new_password[0]);
                            }
                            if (data.error.admin_confirm_password) {
                                $('#admin-confirm-password-error').html(data.error.admin_confirm_password[0]);
                            }
                        } else if(data.code === 403) {
                            $(`#admin-old-password-error`).html(data.message);
                        }else if(data.code === 200) {
                            console.log(data.message);
                            Swal.fire({
                                title: "Good Job !",
                                text: data.message,
                                icon: 'success'
                            });
                            $('#admin-change-password-form')[0].reset();
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        Swal.fire({
                                title: "Error !",
                                text: 'not update password',
                                icon: 'error'
                        });
                    }
                });
            });
        });
    </script>
@endsection


