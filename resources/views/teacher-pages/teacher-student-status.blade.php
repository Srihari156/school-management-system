@extends('layouts.teacher-layout')
@section('title','Teacher Student Status Attendance')
@section('bg-color','teacher-page-bg')
@section('content')
    <p class="display-6">Teacher Student Status Attendance</p>
        <div class="mt-3">

            <form action="" method="post" id="status-form">
                <select class="form-select input mb-3" aria-label="Default select example" name="student_class"
                    id="student-class">
                    <option selected>Select Class</option>
                    @foreach ($student as $item)
                        <option value="{{$item->class_id}}">{{$item->class_id}}</option>
                    @endforeach
                </select>
                <span class="text-danger" id="error"></span>
                <select class="form-select input mb-3" aria-label="Default select example" name="student_name"
                    id="student-name">
                    <option selected>Select Student Name</option>
                    <option value="name">name</option>
                </select>
                <span class="text-danger" id="error"></span>
                <div class="d-flex justify-content-between">
                    <div>
                        <label for="date" class="form-label">From</label>
                        <input type="date" class="form-control input mb-3" name="from_date" placeholder="date"
                            id="from-date">
                            <span class="text-danger" id="error"></span>
                    </div>
                    <div>
                        <label for="date" class="form-label">To</label>
                        <input type="date" class="form-control input mb-3" name="to_date" placeholder="date"
                            id="to-date">
                            <span class="text-danger" id="error"></span>
                    </div>
                </div>
                <select class="form-select input mb-3" aria-label="Default select example" name="student_status"
                    id="student-status">
                    <option selected>Select Status</option>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                </select>
                <span class="text-danger" id="error"></span>
                <button type="submit" name="student_status_attendance_submit"
                    class="btn btn-info mt-3 text-light">Submit</button>
            </form>
            {{-- <div class="table-responsive">
                <table class="table table-bordered table-info mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Student</th>
                            <th>Class</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div> --}}
            <div id="student-status"></div>
        </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#status-form').submit(function (e) { 
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '',
                    type: 'post',
                    data: $(this).serialize(),
                    success:function (data) {
                        console.log(data);
                        
                    },
                    error: function (xhr) {

                    }
                });
            });
        });
    </script>
@endsection