@extends('layouts.teacher-layout')
@section('title', 'Teacher Student Attendance')
@section('bg-color', 'teacher-page-bg')
@section('content')
    <p class="display-6"> Student Leave Status</p>
    <div class="mt-3">

        <form action="" method="post" id="leave-status-form">
            @csrf
            <select class="form-select input mt-3" aria-label="Default select example" name="student_class"
                id="student-class">
                <option disabled selected>Select Class</option>
                @foreach ($class as $item)
                    <option value="{{$item->id}}">{{$item->class_name}}</option>
                @endforeach
            </select>
            <span class="text-danger" id="class-error"></span>
            <select name="student_name" id="student-name" class="form-select input mt-2 "
                aria-label="Default select example">
                <option disabled selected>Select Student Name</option>

            </select>
            <span class="text-danger" id="student-name-error"></span>
            <input type="date" class="form-control input mt-2 " name="date" placeholder="date" id="date">
            <span class="text-danger mb-3 d-block" id="date-error"></span>
            <textarea name="reason_status" id="reason-status" class="form-control textarea mt-2 "
                placeholder="Fill the reason form.."></textarea>
            <span class="text-danger mb-3 d-block" id="reason-status-error"></span>
            <button type="submit" name="student_leave_status_submit" class="btn btn-info mt-3 text-light">Submit</button>
        </form>

    </div>
@endsection

