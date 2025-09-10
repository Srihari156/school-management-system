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


