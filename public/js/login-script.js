$(document).ready(function () {
    $("#admin-login").submit(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $("#username-error").html("");
        $("#password-error").html("");
        $(".form-control").removeClass("border border-danger");
        $.ajax({
            type: "POST",
            url: "/admin-login-store",
            data: $(this).serialize(),
            success: function (data) {
                console.log("Response:", data);
                if (data.code === 422) {
                    // $('.error-message').html('');
                    if (data.error.username) {
                        $("#username-error").html(data.error.username[0]);
                        $("#username").addClass("border border-danger");
                    }
                    if (data.error.password) {
                        $("#password-error").html(data.error.password[0]);
                        $("#password").addClass("border border-danger");
                    }
                } else if (data.code === 200) {
                    // if (data.errors.username == 'The username field is required.') {
                    //     $('#username-error').html(`<p>${data.errors.username}</p>`);
                    // } else {
                    //      $('#password-error').html(`<p>${data.errors.password[0]}</p>`);
                    // }
                    console.log("Redirecting to:", data.redirect);
                    Swal.fire({
                        title: "Good Job !",
                        text: "Admin Login Successfully",
                        icon: "success",
                    }).then((result)=> {
                        if (result.isConfirmed) {
                            window.location.href = data.redirect;
                        }
                    });
                    
                    // alert(data.errors.username);
                    // alert(data.errors.password[0]);
                } else if (data.code === 401) {
                    Swal.fire({
                        title: "error !",
                        text: data.error,
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "error !",
                    text: "Teacher Login Error",
                    icon: "error",
                });
            },
            //     if (res.code === 401) {
            //         $('#password-error').html(res.error.password[0]);
            //     }
            //     else if () {

            //         alert('login failed');
            //     }

            // }
        });
    });
    // Swal.fire({
    //     title: "error !",
    //     text: "Something Wrong",
    //     icon: 'error'
    // });
});

$(document).ready(function () {
    $("#teacher-login").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $("#teacher-username-error").html("");
        $("#teacher-password-error").html("");
        $(".form-control").removeClass("border border-danger");
        $.ajax({
            url: "/teacher-login-store",
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.name) {
                        $("#teacher-username-error").html(data.error.name);
                        $("#name").addClass("border border-danger");
        
                    }
                    if (data.error.password) {
                        $("#teacher-password-error").html(data.error.password);
                        $("#password").addClass("border border-danger");
                    }
                } else if (data.status === 200) {
                    console.log("redirecting: ", data.redirect);
                    Swal.fire({
                        title: "Good Job !",
                        text: "Teacher Login Successfully",
                        icon: "success",
                    }).then((result)=> {
                        if (result.isConfirmed) {
                            window.location.href = data.redirect;
                        }
                    });
                    
                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "error !",
                    text: "Teacher Login Error",
                    icon: "error",
                });
            },
        });
    });
});
