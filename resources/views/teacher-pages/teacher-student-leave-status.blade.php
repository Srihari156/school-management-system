@extends('layouts.teacher-layout')
@section('title', 'Teacher Student Attendance')
@section('bg-color', 'teacher-page-bg')
@section('content')
    <p class="display-6"> Student Leave Status</p>
    <div class="mt-3">

        <form action="" method="post" id="leave-status-form">
            @csrf
            <select class="form-select input mb-3" aria-label="Default select example" name="student_class"
                id="student-class">
                <option disabled selected>Select Class</option>
                @foreach ($class as $item)
                    <option value="{{$item->id}}">{{$item->class_name}}</option>
                @endforeach
            </select>
            <span class="text-danger" id="class-error"></span>
            <select name="student_name" id="student-name" class="form-select input mt-2 mb-3"
                aria-label="Default select example">
                <option disabled selected>Select Student Name</option>

            </select>
            <span class="text-danger" id="student-name-error"></span>
            <input type="date" class="form-control input mt-2 mb-3" name="date" placeholder="date" id="date">
            <span class="text-danger mb-3 d-block" id="date-error"></span>
            <textarea name="reason_status" id="reason-status" class="form-control textarea mt-2 mb-3"
                placeholder="Fill the reason form.."></textarea>
            <span class="text-danger mb-3 d-block" id="reason-status-error"></span>
            <button type="submit" name="student_leave_status_submit" class="btn btn-info mt-3 text-light">Submit</button>
        </form>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#student-class').on('change', function () {
                let classId = $(this).val();

                if (classId) {
                    $('#student-name').html('<option>Loading...</option>');

                    $.ajax({
                        url: "teacher/get-students/" + classId,
                        type: "GET",
                        success: function (res) {
                            if (res.status === 200) {
                                let options = '<option disabled selected>Select Student Name</option>';
                                res.students.forEach(function (student) {
                                    options += `<option value="${student.id}">${student.name}</option>`;
                                });
                                $('#student-name').html(options);
                            } else {
                                $('#student-name').html('<option disabled>No students found</option>');
                            }
                        },
                        error: function () {
                            $('#student-name').html('<option disabled>Error loading students</option>');
                        }
                    });
                } else {
                    $('#student-name').html('<option disabled selected>Select Student Name</option>');
                }
            });
            $('#leave-status-form').submit(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('store.leave-status') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function (data) {
                        console.log(data)
                        if (data.code === 422) {
                            if (data.error.student_class) {
                                $('#class-error').html(data.error.student_class[0]);
                            }
                            if (data.error.student_name) {
                                $('#student-name-error').html(data.error.student_name[0]);
                            }
                            if (data.error.date) {
                                $('#date-error').html(data.error.date[0]);
                            }
                            if (data.error.reason_status) {
                                $('#reason-status-error').html(data.error.reason_status[0]);
                            }
                        } else if (data.code === 200) {
                            Swal.fire({
                                title: "Good Job !",
                                text: data.message,
                                icon: 'success'
                            });
                            // $("#leave-status-form")[0].reset();
                        }

                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: "Error !",
                            text: "not class add error",
                            icon: 'error'
                        });
                    }
                });
            });

        });
    </script>
@endsection