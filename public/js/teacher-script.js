$(document).ready(function () {
    $("#logout-teacher").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/teacher/teacher-logout",
            type: "POST",
            success: function (data) {
                Swal.fire({
                    title: "Good Job !",
                    text: data.message,
                    icon: "success",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = data.redirect;
                    }
                });
            },
        });
    });
});

$(document).ready(function () {
    $("#monthly-report-form").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/teacher/monthly-reports-search",
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.student_class) {
                        $("#class-error").html(data.error.student_class);
                    }
                    if (data.error.from_date) {
                        $("#from-error").html(data.error.from_date);
                    }
                    if (data.error.to_date) {
                        $("#to-error").html(data.error.to_date);
                    }
                    if (data.error.student_select) {
                        $("#student-select-error").html(
                            data.error.student_select
                        );
                    }
                } else if (data.code === 200) {
                    const chart = document
                        .getElementById("leave-status-bar")
                        .getContext("2d");
                    const labels = [];
                    const values = [];
                    const barColors = [];

                    const chartData = data.chart;
                    const minIds = data.min_students.map((s) =>
                        s.id.toString()
                    );
                    const maxIds = data.max_students.map((s) =>
                        s.id.toString()
                    );

                    for (const [studentId, leaveCount] of Object.entries(
                        chartData
                    )) {
                        const studentName =
                            data.student_names[studentId] ??
                            `Student ${studentId}`;
                        labels.push(studentName);
                        values.push(leaveCount);
                        if (minIds.includes(studentId)) {
                            barColors.push("rgba(255, 206, 86, 0.8)");
                        } else if (maxIds.includes(studentId)) {
                            barColors.push("rgba(255, 99, 132, 0.8)");
                        } else {
                            barColors.push("rgba(54, 162, 235, 0.7)");
                        }
                    }

                    new Chart(chart, {
                        type: "bar",
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: "Leave Status Monthly reports",
                                    data: values,
                                    backgroundColor: barColors,
                                },
                            ],
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    labels: {
                                        color: "white",
                                    },
                                },
                            },
                            scales: {
                                x: {
                                    ticks: {
                                        color: "white",
                                    },
                                    grid: {
                                        color: "white",
                                    },
                                },
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1,
                                        color: "white",
                                    },
                                    grid: {
                                        color: "white",
                                    },
                                },
                            },
                        },
                    });
                    Swal.fire({
                        title: "Success !",
                        text: "Monthly Report Loaded Success",
                        icon: "success",
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error !",
                    text: "not report error",
                    icon: "error",
                });
            },
        });
    });
    $("#student-select").select2({
        placeholder: "Select the Students",
        closeOnSelect: false,
    });
    $("#student-select").on("select2:select", function (event) {
        if (event.params.data.id === "all") {
            const allOptions = $("#student-select option")
                .map(function () {
                    return this.value !== "all" ? this.value : null;
                })
                .get();
            $("#student-select").val(allOptions).trigger("change");
        }
    });
    $("#student-select").on("select2:unselect", function (event) {
        if (event.params.id === "all") {
            $("#student-select").val(null).trigger("change");
        }
    });
    $("#student-class").on("change", function () {
        let classId = $(this).val();

        if (classId) {
            $("#student-select").html("<option>Loading...</option>");

            $.ajax({
                url: "/teacher/get-students/" + classId,
                type: "GET",
                success: function (res) {
                    if (res.status === 200) {
                        let options =
                            '<option value="all">Select the Students All</option>';
                        res.students.forEach(function (student) {
                            options += `<option value="${student.id}">${student.name}</option>`;
                        });
                        $("#student-select").html(options);
                    } else {
                        $("#student-select").html(
                            "<option disabled>No students found</option>"
                        );
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    $("#student-select").html(
                        "<option disabled>Error loading students</option>"
                    );
                },
            });
        } else {
            $("#student-select").html(
                "<option disabled selected>Select Student Name</option>"
            );
        }
    });
});

$(document).ready(function () {
    $("#teacher-change-password-form").on("submit", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/teacher/store-teacher-change-password",
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.teacher_old_password) {
                        $("#old-password-error").html(
                            data.error.teacher_old_password[0]
                        );
                    }
                    if (data.error.teacher_new_password) {
                        $("#new-password-error").html(
                            data.error.teacher_new_password[0]
                        );
                    }
                    if (data.error.teacher_confirm_password) {
                        $("#confirm-password-error").html(
                            data.error.teacher_confirm_password[0]
                        );
                    }
                } else if (data.code === 200) {
                    Swal.fire({
                        title: "Good job !",
                        text: data.message,
                        icon: "success",
                    });
                    $("#teacher-change-password-form")[0].reset();
                } else if (data.code === 403) {
                    $("#old-password-error").html(data.message);
                } else if (data.code === 405) {
                    Swal.fire({
                        title: "Error !",
                        text: data.message,
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error !",
                    text: "change password error",
                    icon: "error",
                });
            },
        });
    });
});

$(document).ready(function () {
    $("#student-class").on("change", function () {
        let classId = $(this).val();

        if (classId) {
            $("#student-name").html("<option>Loading...</option>");

            $.ajax({
                url: "/teacher/get-students/" + classId,
                type: "GET",
                success: function (res) {
                    if (res.status === 200) {
                        let options =
                            "<option disabled selected>Select Student Name</option>";
                        res.students.forEach(function (student) {
                            options += `<option value="${student.id}">${student.name}</option>`;
                        });
                        $("#student-name").html(options);
                    } else {
                        $("#student-name").html(
                            "<option disabled>No students found</option>"
                        );
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    $("#student-name").html(
                        "<option disabled>Error loading students</option>"
                    );
                },
            });
        } else {
            $("#student-name").html(
                "<option disabled selected>Select Student Name</option>"
            );
        }
    });
    $("#leave-status-form").submit(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(".form-control").removeClass("border border-danger");
        $.ajax({
            url: "/teacher/store-leave-status",
            method: "POST",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.code === 422) {
                    if (data.error.student_class) {
                        $("#class-error").html(data.error.student_class[0]);
                        $("#student-class").addClass("border border-danger");
                    } else {
                         $("#class-error").html("");
                    }
                    if (data.error.student_name) {
                        $("#student-name-error").html(data.error.student_name[0]);
                        $("#student-name").addClass("border border-danger");
                    } else {
                        $("#student-name-error").html("");
                    }
                    if (data.error.date) {
                        $("#date-error").html(data.error.date[0]);
                        $("#date").addClass("border border-danger");
                    } else {
                        $("#date-error").html("");
                    }
                    if (data.error.reason_status) {
                        $("#reason-status-error").html(data.error.reason_status[0]);
                        $("#reason-status").addClass("border border-danger");
                    }else {
                        $("#reason-status-error").html("");
                    }
                } else if (data.code === 200) {
                    Swal.fire({
                        title: "Good Job !",
                        text: data.message,
                        icon: "success",
                    });
                    // $("#leave-status-form")[0].reset();
                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    title: "Error !",
                    text: "not class add error",
                    icon: "error",
                });
            },
        });
    });
});

$(document).ready(function () {
    $("#status-form").submit(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "",
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
            },
            error: function (xhr) {},
        });
    });
});
