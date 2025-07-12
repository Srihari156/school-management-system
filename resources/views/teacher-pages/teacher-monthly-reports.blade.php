@extends('layouts.teacher-layout')
@section('title', 'Teacher Monthly Reports')
@section('bg-color', 'teacher-page-bg')
@section('content')
    <p class="display-6">Teacher Student Monthly Attendance Reports</p>
    <div class="mt-3">

        <form action="" method="post" id="monthly-report-form">
            <div class="d-flex justify-content-between">
                <div>
                    <select class="form-select input mb-3" aria-label="Default select example" name="student_class"
                        id="student-class">
                        <option disabled selected>Select Class</option>
                        @foreach ($class as $item)
                            <option value="{{$item->id}}">{{$item->class_name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="class-error"></span>
                </div>
                <div>
                    <select name="student_select[]" id="student-select" class="form-select input mb-3" multiple>

                    </select>
                    <span class="text-danger d-block mt-3" id="student-select-error"></span>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <label for="date" class="form-label">From</label>
                    <input type="date" class="form-control input mb-3" name="from_date" placeholder="date" id="from-date">
                    <span class="text-danger" id="from-error"></span>
                </div>
                <div>
                    <label for="date" class="form-label">To</label>
                    <input type="date" class="form-control input mb-3" name="to_date" placeholder="date" id="to-date">
                    <span class="text-danger" id="to-error"></span>
                </div>
            </div>
            <button type="submit" name="student_monthly_report_submit" class="btn btn-info mt-3 text-light">Submit</button>
        </form>
        <div class="mt-3">
            <canvas id="leave-status-bar" width="400" height="200" class="mt-5"></canvas>
        </div>



    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('#monthly-report-form').on('submit', function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('search.monthly-reports')}}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (data) {
                        console.log(data);
                        if (data.code === 422) {
                            if (data.error.student_class) {
                                $('#class-error').html(data.error.student_class);
                            }
                            if (data.error.from_date) {
                                $('#from-error').html(data.error.from_date);
                            }
                            if (data.error.to_date) {
                                $('#to-error').html(data.error.to_date);
                            }
                            if (data.error.student_select) {
                                $('#student-select-error').html(data.error.student_select);
                            }
                        } else if (data.code === 200) {
                            const chart = document.getElementById('leave-status-bar').getContext('2d');
                            const labels = [];
                            const values = [];
                            const barColors = [];

                            const chartData = data.chart;
                            const minIds = data.min_students.map(s => s.id.toString());
                            const maxIds = data.max_students.map(s => s.id.toString());

                            for (const [studentId, leaveCount] of Object.entries(chartData)) {
                                const studentName = data.student_names[studentId] ?? `Student ${studentId}`;
                                labels.push(studentName);
                                values.push(leaveCount);
                                if (minIds.includes(studentId)) {
                                    barColors.push('rgba(255, 206, 86, 0.8)');
                                } else if (maxIds.includes(studentId)) {
                                    barColors.push('rgba(255, 99, 132, 0.8)');
                                } else {
                                    barColors.push('rgba(54, 162, 235, 0.7)');
                                }
                            }

                            new Chart(chart, {
                                type: 'bar',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Leave Status Monthly reports',
                                        data: values,
                                        backgroundColor: barColors
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            labels: {
                                                color: "white"
                                            }
                                        }
                                    },
                                    scales: {
                                        x: {
                                            ticks: {
                                                color: "white"
                                            },
                                            grid: {
                                                color: "white"
                                            }
                                        },
                                        y: {
                                            beginAtZero: true,
                                            ticks: {
                                                stepSize: 1,
                                                color: "white",
                                            },
                                            grid: {
                                                color: "white"
                                            }
                                        }
                                    }
                                }
                            });
                            Swal.fire({
                                title: "Success !",
                                text: "Monthly Report Loaded Success",
                                icon: 'success'
                            });
                        }


                    },
                    error: function (xhr) {
                        console.log(xhr);
                        Swal.fire({
                            title: "Error !",
                            text: "not report error",
                            icon: 'error'
                        });
                    },
                });
            });
            $('#student-select').select2({
                placeholder: "Select the Students",
                closeOnSelect: false
            });
            $("#student-select").on('select2:select', function (event) {
                if (event.params.data.id === "all") {
                    const allOptions = $("#student-select option").map(function () {
                        return this.value !== "all" ? this.value : null;
                    }).get();
                    $("#student-select").val(allOptions).trigger('change');
                }
            });
            $("#student-select").on('select2:unselect', function (event) {
                if (event.params.id === "all") {
                    $("#student-select").val(null).trigger('change');
                }
            });
            $('#student-class').on('change', function () {
                let classId = $(this).val();

                if (classId) {
                    $('#student-select').html('<option>Loading...</option>');

                    $.ajax({
                        url: "teacher/get-students/" + classId,
                        type: "GET",
                        success: function (res) {
                            if (res.status === 200) {
                                let options = '<option value="all">Select the Students All</option>';
                                res.students.forEach(function (student) {
                                    options += `<option value="${student.id}">${student.name}</option>`;
                                });
                                $('#student-select').html(options);
                            } else {
                                $('#student-select').html('<option disabled>No students found</option>');
                            }
                        },
                        error: function () {
                            $('#student-select').html('<option disabled>Error loading students</option>');
                        }
                    });
                } else {
                    $('#student-select').html('<option disabled selected>Select Student Name</option>');
                }
            });
        });
    </script>
@endsection