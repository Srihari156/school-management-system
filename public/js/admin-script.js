$(document).ready(function () {
    $("#logout-admin").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            url: "/admin/admin-logout", // Or route('admin.logout')
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            // xhrFields: {
            //     withCredentials: true
            // },
            success: function (response) {
                //alert(response.message);
                Swal.fire({
                    title: "Good Job !",
                    text: response.message,
                    icon: "success",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = response.redirect;
                    }
                });
            },
            error: function (xhr) {
                // alert("Logout failed");
                console.log(xhr.responseText);
                Swal.fire({
                    title: "Error !",
                    text: "Logout failed",
                    icon: "error",
                });
            },
        });
    });
});

$(document).ready(function () {
    $("#class-form").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(".form-control").removeClass("border border-danger");
        $.ajax({
            url: "/admin/store-classes",
            data: $(this).serialize(),
            type: "post",
            success: function (data) {
                if (data.code === 422) {
                    console.log(data);
                    if (data.error.class_name) {
                        $("#class-name-error").html(data.error.class_name[0]);
                        $("#class-name").addClass("border border-danger");
                    } else {
                        $("#class-name-error").html("");
                    }
                } else if (data.status === 200) {
                    //alert(data.message);
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#class-form")[0].reset();
                            $("#class-name-error").html("");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (data) {
                console.log("Error:", data);
                // $('#saveBtn').html('Save Changes');
            },
        });
    });
    $(".class-form-update").on("submit", function (event) {
        event.preventDefault();
        const id = $(this).find("#class-id").val();
        const data = {
            class_name: $(this).find(`#class-update-name\\ ${id}`).val(),
        };
        $(".form-control").removeClass("border border-danger");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "put",
            url: "/admin/update-class/" + id,
            data: data,
            success: function (data) {
                if (data.code === 422) {
                    console.log(data);
                    $(this)
                        .find(`#class-name-error-${id}`)
                        .html(data.error.class_name[0])
                        .find(`#class-update-name-${id}`)
                        .addClass('border border-danger');
                } else if (data.status === 200) {
                    // alert(data.message);
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#class-name-error").html("");
                            $(`#classEditModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });
                    // $('#class-form-update')[0].reset();

                }
            },
            error: function (data) {
                console.log("Error:", data);
                // alert('not update');
                Swal.fire({
                    title: "Error !",
                    text: "not update",
                    icon: "error",
                });
            },
        });
    });
    $(".class-form-delete").on("submit", function (event) {
        event.preventDefault();
        const id = $(this).find("#class-delete-id").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "delete",
            url: "/admin/delete-class/" + id,
            success: function (data) {
                if (data.code === 200) {
                    console.log(data);
                    // alert(data.message);
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#deleteClassModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log("Delete Error:", xhr.responseText);
                // alert('Delete failed.');
                Swal.fire({
                    title: "Error !",
                    text: "Delete failed",
                    icon: "error",
                });
            },
        });
    });
});
$(document).ready(function () {
    $("#admin-change-password-form").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(".form-control").removeClass("border border-danger");
        $("#admin-old-password-error").html("");
        $("#admin-new-password-error").html("");
        $("#admin-confirm-password-error").html("");
        $.ajax({
            url: "/admin/admin-password-update/",
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.admin_old_password) {
                        $("#admin-old-password-error").html(data.error.admin_old_password[0]);
                        $("#admin-old-password").addClass("border border-danger");
                    }
                    if (data.error.admin_new_password) {
                        $("#admin-new-password-error").html(data.error.admin_new_password[0]);
                        $("#admin-new-password").addClass("border border-danger");
                    }
                    if (data.error.admin_confirm_password) {
                        $("#admin-confirm-password-error").html(data.error.admin_confirm_password[0]);
                        $("#admin-confirm-password").addClass("border border-danger");
                    }
                } else if (data.code === 403) {
                    $(`#admin-old-password-error`).html(data.message);
                } else if (data.code === 200) {
                    console.log(data.message);
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#admin-change-password-form")[0].reset();
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error !",
                    text: "not update password",
                    icon: "error",
                });
            },
        });
    });
});

$(document).ready(function () {
    $("#teacher-assign-class-form").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(".form-control").removeClass("border border-danger");
        $.ajax({
            url: "/admin/teacher-assign-class-store",
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.teacher_id) {
                        $("#teacher-name-error").html(data.error.teacher_id[0]);
                        $("#teacher-name").addClass("border border-danger");
                    } else {
                        $("#teacher-name-error").html("");
                    }
                    if (data.error.subject_id) {
                        $("#teacher-subject-error").html(data.error.subject_id[0]);
                        $("#teacher-subject").addClass("border border-danger");
                    } else {
                        $("#teacher-subject").html("");
                    }
                    if (data.error.class_id) {
                        $("#teacher-class-error").html(data.error.class_id[0]);
                        $("#student-class").addClass("border border-danger");
                    } else {
                        $("#teacher-class-error").html("");
                    }
                } else if (data.status === 200) {
                    console.log(data.message);
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#teacher-assign-class-form")[0].reset();
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error !",
                    text: "not created teacher assigned class",
                    icon: "error",
                });
            },
        });
    });
    $(".teacher-assign-class-form-update").on("submit", function (event) {
        event.preventDefault();
        const id = $(this).find("input[name='teacher_assign_class_id']").val();
        $(".form-control").removeClass("border border-danger");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(".form-control").removeClass("border border-danger");
        $.ajax({
            url: `/admin/update-teacher-assign-class/${id}`,
            type: "put",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.status === 422) {
                    if (data.error.teacher_id) {
                        $(`#teacher-name-error-${id}`).html(data.error.teacher_id[0]);
                    }
                    if (data.error.subject_id) {
                        $(`#teacher-subject-error-${id}`).html(data.error.subject_id[0]);
                    }
                    if (data.error.class_id) {
                        $(`#teacher-class-error-${id}`).html(data.error.class_id[0]);
                    }
                } else if (data.status === 200) {
                    console.log(data.message);
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#teacherAssignEditModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error !",
                    text: "Not Updated",
                    icon: "error",
                });
            },
        });
    });
    $(".teacher-assign-class-form-delete").on("submit", function (event) {
        event.preventDefault();
        const id = $(this).find("input[name='teacher_assign_delete_id']").val();
        console.log(id);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: `/admin/delete-teacher-assign-class/${id}`,
            type: "delete",
            success: function (data) {
                console.log(data);
                if (data.status === 200) {
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#teacherAssignDeleteModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error !",
                    text: "Not Deleted",
                    icon: "error",
                });
            },
        });
    });
});

$(document).ready(function () {
    $("#student-form-add").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(".form-control").removeClass("border border-danger");
        $.ajax({
            url: "/admin/store-student",
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.name) {
                        $("#student-name-error").html(data.error.name[0]);
                        $("#student-name").addClass("border border-danger");
                    } else {
                        $("#student-name-error").html("");
                    }
                    if (data.error.age) {
                        $("#student-age-error").html(data.error.age[0]);
                        $("#student-age").addClass("border border-danger");
                    } else {
                        $("#student-age-error").html("");
                    }
                    if (data.error.dob) {
                        $("#student-dob-error").html(data.error.dob[0]);
                        $("#student-dob").addClass("border border-danger");
                    } else {
                        $("#student-dob-error").html("");
                    }
                    if (data.error.email) {
                        $("#student-email-error").html(data.error.email[0]);
                        $("#student-email").addClass("border border-danger");
                    } else {
                        $("#student-email-error").html("");
                    }
                    if (data.error.father_name) {
                        $("#student-father-name-error").html(data.error.father_name[0]);
                        $("#student-father-name").addClass("border border-danger");
                    } else {
                        $("#student-father-name-error").html("");
                    }
                    if (data.error.mother_name) {
                        $("#student-mother-name-error").html(data.error.mother_name[0]);
                        $("#student-mother-name").addClass("border border-danger");
                    } else {
                        $("#student-mother-name-error").html("");
                    }
                    if (data.error.district) {
                        $("#student-district-error").html(data.error.district[0]);
                        $("#student-district").addClass("border border-danger");
                    } else {
                        $("#student-district-error").html("");
                    }
                    if (data.error.city) {
                        $("#student-city-error").html(data.error.city[0]);
                        $("#student-city").addClass("border border-danger");
                    } else {
                        $("#student-city-error").html("");
                    }
                    if (data.error.state) {
                        $("#student-state-error").html(data.error.state[0]);
                        $("#student-state").addClass("border border-danger");
                    } else {
                        $("#student-state-error").html("");
                    }
                    if (data.error.nationality) {
                        $("#student-nationality-error").html(data.error.nationality[0]);
                        $("#student-nationality").addClass("border border-danger");
                    } else {
                        $("#student-nationality-error").html("");
                    }
                    if (data.error.father_occupation) {
                        $("#student-father-occupation-error").html(data.error.father_occupation[0]);
                        $("#student-father-occupation").addClass("border border-danger");
                    } else {
                        $("#student-father-occupation-error").html("");
                    }
                    if (data.error.mother_occupation) {
                        $("#student-mother-occupation-error").html(data.error.mother_occupation[0]);
                        $("#student-mother-occupation").addClass("border border-danger");
                    } else {
                        $("#student-mother-occupation-error").html("");
                    }
                    if (data.error.mobile_no) {
                        $("#student-mobile-no-error").html(data.error.mobile_no[0]);
                        $("#student-mobile-no").addClass("border border-danger");
                    } else {
                        $("#student-mobile-no-error").html("");
                    }
                    if (data.error.address) {
                        $("#student-address-error").html(data.error.address[0]);
                        $("#student-address").addClass("border border-danger");
                    } else {
                        $("#student-address-error").html("");
                    }
                    if (data.error.bloodgroup) {
                        $("#student-blood-group-error").html(data.error.bloodgroup[0]);
                        $("#student-blood-group").addClass("border border-danger");
                    } else {
                        $("#student-blood-group-error").html("");
                    }
                    if (data.error.class_id) {
                        $("#student-class-error").html(data.error.class_id[0]);
                        $("#student-class").addClass("border border-danger");
                    } else {
                        $("#student-class-error").html("");
                    }
                } else if (data.status === 200) {
                    // alert(data.message);
                    Swal.fire({
                        title: "Good Job!",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                // alert('not created student');
                Swal.fire({
                    title: "Error !",
                    text: "Not Created Student",
                    icon: "error",
                });
            },
        });
    });
    $(".student-form-update").on("submit", function (event) {
        event.preventDefault();
        const id = $(this).find('input[name="student_id"]').val();
        const data = {
            name: $(this).find(`#student-update-name-${id}`).val(),
            age: $(this).find(`#student-update-age-${id}`).val(),
            dob: $(this).find(`#student-update-dob-${id}`).val(),
            email: $(this).find(`#student-update-email-${id}`).val(),
            father_name: $(this)
                .find(`#student-update-father-name-${id}`)
                .val(),
            mother_name: $(this)
                .find(`#student-update-mother-name-${id}`)
                .val(),
            district: $(this).find(`#student-update-district-${id}`).val(),
            city: $(this).find(`#student-update-city-${id}`).val(),
            state: $(this).find(`#student-update-state-${id}`).val(),
            nationality: $(this)
                .find(`#student-update-nationality-${id}`)
                .val(),
            father_occupation: $(this)
                .find(`#student-update-father-occupation-${id}`)
                .val(),
            mother_occupation: $(this)
                .find(`#student-update-mother-occupation-${id}`)
                .val(),
            address: $(this).find(`#student-update-address-${id}`).val(),
            mobile_no: $(this).find(`#student-update-mobile-no-${id}`).val(),
            bloodgroup: $(this).find(`#student-update-blood-group-${id}`).val(),
            class_id: $(this).find(`#student-update-class-id-${id}`).val(),
        };
        $(".form-control").removeClass("border border-danger");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: `/admin/update-student/${id}`,
            type: "put",
            data: data,
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.name) {
                        $(`#student-name-error-${id}`).html(data.error.name[0]);
                    }
                    if (data.error.age) {
                        $(`#student-age--error-${id}`).html(data.error.age[0]);
                    }
                    if (data.error.dob) {
                        $(`#student-dob-error-${id}`).html(data.error.dob[0]);
                    }
                    if (data.error.email) {
                        $(`#student-email-error-${id}`).html(data.error.email[0]);
                    }
                    if (data.error.father_name) {
                        $(`#student-father-name-error-${id}`).html(
                            data.error.father_name[0]
                        );
                    }
                    if (data.error.mother_name) {
                        $(`#student-mother-name-error-${id}`).html(
                            data.error.mother_name[0]
                        );
                    }
                    if (data.error.district) {
                        $(`#student-district-error-${id}`).html(
                            data.error.district[0]
                        );
                    }
                    if (data.error.city) {
                        $(`#student-city--error-${id}`).html(
                            data.error.city[0]
                        );
                    }
                    if (data.error.state) {
                        $(`#student-state-error-${id}`).html(
                            data.error.state[0]
                        );
                    }
                    if (data.error.nationality) {
                        $(`#student-nationality-error-${id}`).html(
                            data.error.nationality[0]
                        );
                    }
                    if (data.error.father_occupation) {
                        $(`#student-father-occupation-error-${id}`).html(
                            data.error.father_occupation[0]
                        );
                    }
                    if (data.error.mobile_no) {
                        $(`#student-mobile-no-error-${id}`).html(
                            data.error.mobile_no[0]
                        );
                    }
                    if (data.error.address) {
                        $(`#student-address-error-${id}`).html(
                            data.error.address[0]
                        );
                    }
                    if (data.error.bloodgroup) {
                        $(`#student-blood-group-error-${id}`).html(
                            data.error.bloodgroup[0]
                        );
                    }
                    if (data.error.class_id) {
                        $(`#student-class-id-error-${id}`).html(
                            data.error.class_id[0]
                        );
                    }
                } else if (data.status === 200) {
                    console.log(data.message);
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#studentEditModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error !",
                    text: "Not Updated Student",
                    icon: "error",
                });
            },
        });
    });
    $(".student-form-delete").on("submit", function (event) {
        event.preventDefault();
        const id = $(this).find(`input[name="student_delete_id"]`).val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: `/admin/delete-student/${id}`,
            type: "delete",
            success: function (data) {
                console.log(data);
                if (data.status === 200) {
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#deleteStudentModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error !",
                    text: "Not Deleted Student",
                    icon: "error",
                });
            },
        });
    });
});

$(document).ready(function () {
    $("#subject-form-add").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(".form-control").removeClass("border border-danger");
        $.ajax({
            url: "/admin/store-subject",
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.subject) {
                        $("#subject-name-error").html(data.error.subject);
                        $("#subject-name").addClass("border border-danger");
                    } else {
                        $("#subject-name-error").html("");
                    }
                } else if (data.status === 200) {
                    console.log(data.message);
                    //alert(data.message);
                    Swal.fire({
                        title: "Good Job!",
                        text: data.message,
                        icon: "success",
                    }.then((result) => {
                        if (result.isConfirmed) {
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    }));

                }
            },
            error: function (xhr) {
                console.log(xhr);
                //alert('not subject created');
                Swal.fire({
                    title: "Error !",
                    text: "not subject created",
                    icon: "error",
                });
            },
        });
    });
    $(".subject-form-update").on("submit", function (event) {
        event.preventDefault();
        const id = $(this).find("#subject-id").val();
        const data = {
            subject: $(this).find(`#subject-update-name\\ ${id}`).val(),
        };
        $(".form-control").removeClass("border border-danger");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: `/admin/update-subject/${id}`,
            type: "put",
            data: data,
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.subject) {
                        $("#subject-name-error").html(data.error.subject);
                    }
                } else if (data.status === 200) {
                    console.log(data.message);
                    // alert(data.message);
                    Swal.fire({
                        title: "Good Job!",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#subjectEditModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                // alert('not updated');
                Swal.fire({
                    title: "Error !",
                    text: "not updated",
                    icon: "error",
                });
            },
        });
    });
    $(".subject-form-delete").on("submit", function (event) {
        event.preventDefault();
        const id = $(this).find(`input[name="subject_delete_id"]`).val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: `/admin/delete-subject/${id}`,
            type: "delete",
            success: function (data) {
                console.log(data);
                if (data.status === 200) {
                    // alert(data.message);
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#subjectDeleteModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                // alert('deleted failed');
                Swal.fire({
                    title: "Error !",
                    text: "Delete failed",
                    icon: "error",
                });
            },
        });
    });
});

$(document).ready(function () {
    $("#teacher-form-add").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(".form-control").removeClass("border border-danger");
        $.ajax({
            url: "/admin/store-teacher",
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.name) {
                        $("#teacher-name-error").html(data.error.name[0]);
                        $("#teacher-name").addClass("border border-danger");
                    } else {
                        $("#teacher-name-error").html("");
                    }
                    if (data.error.age) {
                        $("#teacher-age-error").html(data.error.age[0]);
                        $("#teacher-age").addClass("border border-danger");
                    } else {
                        $("#teacher-age-error").html("");
                    }
                    if (data.error.dob) {
                        $("#teacher-dob-error").html(data.error.dob[0]);
                        $("#teacher-dob").addClass("border border-danger");
                    } else {
                        $("#teacher-dob-error").html("");
                    }
                    if (data.error.email) {
                        $("#teacher-email-error").html(data.error.email[0]);
                        $("#teacher-email").addClass("border border-danger");
                    } else {
                        $("#teacher-email-error").html("");
                    }
                    if (data.error.father_name) {
                        $("#teacher-father-name-error").html(
                            data.error.father_name[0]
                        );
                        $("#teacher-father-name").addClass(
                            "border border-danger"
                        );
                    } else {
                        $("#teacher-father-name-error").html("");
                    }
                    if (data.error.mother_name) {
                        $("#teacher-mother-name-error").html(
                            data.error.mother_name[0]
                        );
                        $("#teacher-mother-name").addClass(
                            "border border-danger"
                        );
                    } else {
                        $("#teacher-mother-name-error").html("");
                    }
                    if (data.error.degree) {
                        $("#teacher-degree-error").html(data.error.degree[0]);
                        $("#teacher-degree").addClass("border border-danger");
                    } else {
                        $("#teacher-degree-error").html("");
                    }
                    if (data.error.experience) {
                        $("#teacher-experience-error").html(
                            data.error.experience[0]
                        );
                        $("#teacher-experience").addClass(
                            "border border-danger"
                        );
                    } else {
                        $("#teacher-experience-error").html("");
                    }
                    if (data.error.subject_id) {
                        $("#teacher-subject-id-error").html(
                            data.error.subject_id[0]
                        );
                        $("#teacher-subject-id").addClass(
                            "border border-danger"
                        );
                    } else {
                        $("#teacher-subject-id-error").html("");
                    }
                    if (data.error.mobile_no) {
                        $("#teacher-mobile-no-error").html(
                            data.error.mobile_no[0]
                        );
                        $("#teacher-mobile-no").addClass(
                            "border border-danger"
                        );
                    } else {
                        $("#teacher-mobile-no-error").html("");
                    }
                    if (data.error.blood_group) {
                        $("#teacher-blood-group-error").html(
                            data.error.blood_group[0]
                        );
                        $("#teacher-blood-group").addClass(
                            "border border-danger"
                        );
                    } else {
                        $("#teacher-blood-group-error").html("");
                    }
                    if (data.error.address) {
                        $("#teacher-address-error").html(data.error.address[0]);
                        $("#teacher-address").addClass("border border-danger");
                    } else {
                        $("#teacher-address-error").html("");
                    }
                    if (data.error.password) {
                        $("#teacher-password-error").html(
                            data.error.password[0]
                        );
                        $("#teacher-password").addClass("border border-danger");
                    } else {
                        $("#teacher-password-error").html("");
                    }
                } else if (data.status === 200) {
                    console.log(data.message);
                    // alert(data.message);
                    Swal.fire({
                        title: "Good Job!",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                //alert('not created teachers');
                Swal.fire({
                    title: "Error!",
                    text: xhr.responseText,
                    icon: "error",
                });
            },
        });
    });
    $(".teacher-form-update").on("submit", function (event) {
        event.preventDefault();
        // const actionUrl = $(this).attr('action');
        const id = $(this).find("input[name=teacher_id]").val();
        const data = {
            name: $(this).find(`#teacher-update-name-${id}`).val(),
            age: $(this).find(`#teacher-update-age-${id}`).val(),
            dob: $(this).find(`#teacher-update-dob-${id}`).val(),
            email: $(this).find(`#teacher-update-email-${id}`).val(),
            father_name: $(this)
                .find(`#teacher-update-father-name-${id}`)
                .val(),
            mother_name: $(this)
                .find(`#teacher-update-mother-name-${id}`)
                .val(),
            degree: $(this).find(`#teacher-update-degree-${id}`).val(),
            experience: $(this).find(`#teacher-update-experience-${id}`).val(),
            subject_id: $(this).find(`#teacher-update-subject-id-${id}`).val(),
            address: $(this).find(`#teacher-update-address-${id}`).val(),
            mobile_no: $(this).find(`#teacher-update-mobile-no-${id}`).val(),
            blood_group: $(this)
                .find(`#teacher-update-blood-group-${id}`)
                .val(),
        };
        $(".form-control").removeClass("border border-danger");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: `/admin/update-teacher/${id}`,
            type: "PUT",
            data: data,
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.name) {
                        $(`#teacher-name-error-${id}`).html(data.error.name[0]);
                    }
                    if (data.error.age) {
                        $(`#teacher-age-error-${id}`).html(data.error.age[0]);
                    }
                    if (data.error.dob) {
                        $(`#teacher-dob-error-${id}`).html(data.error.dob[0]);
                    }
                    if (data.error.email) {
                        $(`#teacher-email-error-${id}`).html(data.error.email[0]);
                    }
                    if (data.error.father_name) {
                        $(`#teacher-father-name-error-${id}`).html(
                            data.error.father_name[0]
                        );
                    }
                    if (data.error.mother_name) {
                        $(`#teacher-mother-name-error-${id}`).html(
                            data.error.mother_name[0]
                        );
                    }
                    if (data.error.degree) {
                        $(`#teacher-degree-error-${id}`).html(
                            data.error.degree[0]
                        );
                    }
                    if (data.error.experience) {
                        $(`#teacher-experience-error-${id}`).html(
                            data.error.experience[0]
                        );
                    }
                    if (data.error.subject_id) {
                        $(`#teacher-subject-id-error-${id}`).html(
                            data.error.subject_id[0]
                        );
                    }
                    if (data.error.mobile_no) {
                        $(`#teacher-mobile-no-error-${id}`).html(
                            data.error.mobile_no[0]
                        );
                    }
                    if (data.error.blood_group) {
                        $(`#teacher-blood-group-error-${id}`).html(
                            data.error.blood_group[0]
                        );
                    }
                    if (data.error.address) {
                        $(`#teacher-address-error-${id}`).html(
                            data.error.address[0]
                        );
                    }
                } else if (data.status === 200) {
                    console.log(data.message);
                    Swal.fire({
                        title: "Good Job!",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#teacherEditModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });

                }
            },
            error: function (xhr) {
                console.log(xhr);
                //alert('not created teachers');
                Swal.fire({
                    title: "Error!",
                    text: xhr.responseText,
                    icon: "error",
                });
            },
        });
    });
    $(".teacher-form-delete").on("submit", function (event) {
        event.preventDefault();
        const id = $(this).find(`input[name="teacher_delete_id"]`).val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: `/admin/delete-teacher/${id}`,
            type: "delete",
            success: function (data) {
                console.log(data);
                if (data.status === 200) {
                    console.log(data.message);
                    Swal.fire({
                        title: "Deleted!",
                        text: data.message,
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#deleteTeacherModal${id}`).modal("hide");
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error!",
                    text: xhr.responseText,
                    icon: "error",
                });
            },
        });
    });
    $("#email").select2({
        placeholder: 'Select a Email',
        allowClear: false
    });
    $('#class').select2({
        placeholder: 'Select a Class',
        allowClear: false
    });
    $('#section').select2({
        placeholder: 'Select a Section',
        allowClear: false
    });
    $("#fees-payment-form").submit(function (event) {
        event.preventDefault();
        $(".form-control").removeClass("error-valid-border");
        $(".select2-selection").removeClass("error-valid-border");
        $(".text-danger").text("");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "/admin/email-send",
            data: $(this).serialize(),
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                if (data.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Email(s) sent successfully!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#fees-payment-form")[0].reset();
                            $("#class, #section, #email").val(null).trigger('change'); 
                        }
                    });
                } else if (data.status === 422){
                    if (data.errors.class) {
                        $("#class-error").html(data.errors.class);
                        $('#class').next(".select2").find(".select2-selection").addClass("error-valid-border");
                    }
                    if (data.errors.section) {
                        $("#section-error").html(data.errors.section);
                        $('#section').next(".select2").find(".select2-selection").addClass("error-valid-border");
                    }
                    if (data.errors.amount) {
                        $("#amount-error").html(data.errors.amount);
                        $('#amount').addClass("error-valid-border");
                    }
                    if (data.errors.email) {
                        $("#email-error").html(data.errors.email);
                        $('#email').next(".select2").find(".select2-selection").addClass("error-valid-border");
                    }
                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong, please try again.'
                });
            }
        });
    });

$('#section').on('change', function () {
    let classes = $('#class').val();   // array
    let sections = $('#section').val(); // array

    $('#email').empty().trigger('change');

    $.ajax({
        url: "/admin/get-emails",
        type: "POST",
        data: {
            class: classes,   // array
            section: sections, // array
            _token: $('meta[name="csrf-token"]').attr("content")
        },
        success: function (data) {
            $('#email').append('<option disabled>Select the Email</option>');
            data.forEach(function (mail) {
                $('#email').append('<option value="' + mail + '">' + mail + '</option>');
            });
        }
    });
});


});


