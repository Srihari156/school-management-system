@extends('layouts.admin-layout')
@section('title', 'Admin Teacher Add')
@section('bg-color', 'admin-page-bg')
@section('content')
    <p class="display-6">Teacher Add</p>
    <div class="mt-3">

        <form action="{{route('store.teacher')}}" method="post" id="teacher-form-add">
            <input type="text" class="form-control input " name="name" placeholder="Teacher Name" id="teacher-name">
            <span class="text-danger" id="teacher-name-error"></span>
            <input type="number" class="form-control input mt-3 " name="age" placeholder="Age" id="teacher-age">
            <span class="text-danger" id="teacher-age-error"></span>
            <input type="date" class="form-control input mt-3 " name="dob" placeholder="DOB" id="teacher-dob">
            <span class="text-danger" id="teacher-dob-error"></span>
            <input type="text" class="form-control input mt-3" name="email" placeholder="Email Id" id="teacher-email">
            <span class="text-danger" id="teacher-email-error"></span>
            <input type="text" class="form-control input mt-3 " name="father_name" placeholder="Father Name"
                id="teacher-father-name">
            <span class="text-danger" id="teacher-father-name-error"></span>
            <input type="text" class="form-control input mt-3 " name="mother_name" placeholder="Mother Name"
                id="teacher-mother-name">
            <span class="text-danger" id="teacher-mother-name-error"></span>
            <input type="text" class="form-control input mt-3 " name="degree" placeholder="Degree" id="teacher-degree">
            <span class="text-danger" id="teacher-degree-error"></span>
            <input type="text" class="form-control input mt-3 " name="experience" placeholder="Experience"
                id="teacher-experience">
            <span class="text-danger" id="teacher-experience-error"></span>
            <select class="form-select input mt-3 " aria-label="Default select example" name="subject_id"
                id="teacher-subject-knowledge">
                <option disabled selected>Select Subjects</option>
                @foreach ($subject as $items)
                    <option value="{{$items->id}}">{{$items->subject}}</option>
                @endforeach
            </select>
            <span class="text-danger" id="teacher-subject-id-error"></span>
            <input type="number" class="form-control input mt-3 " name="mobile_no" placeholder="Mobile No"
                id="teacher-mobile-no">
            <span class="text-danger" id="teacher-mobile-no-error"></span>
            <input type="text" class="form-control input mt-3 " name="blood_group" placeholder="Blood Group"
                id="teacher-blood-group">
            <span class="text-danger" id="teacher-blood-group-error"></span>
            <textarea class="form-control textarea mt-3 mb-3" name="address" placeholder="Address"
                id="teacher-address"></textarea>
            <span class="text-danger" id="teacher-address-error"></span>
            <input type="password" class="form-control input mt-3 " name="password" placeholder="Password"
                id="teacher-password">
            <span class="text-danger d-block" id="teacher-password-error"></span>
            <button type="submit" name="teacher_submit" class="btn btn-info mt-3 text-light">Add Teacher</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-info mt-3 table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Date Of Birth</th>
                        <th>Email Id</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Degree</th>
                        <th>Experience</th>
                        <th>Subject Knowledge</th>
                        <th>Address</th>
                        <th>Mobile No</th>
                        <th>Blood Group</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;?>
                    @foreach ($teacher as $teachers)
                        <?php    $i++;?>
                        <tr>
                            <td><?php    echo $i; ?></td>
                            <td>{{$teachers->name}}</td>
                            <td>{{$teachers->age}}</td>
                            <td>{{$teachers->dob}}</td>
                            <td>{{$teachers->email}}</td>
                            <td>{{$teachers->father_name}}</td>
                            <td>{{$teachers->mother_name}}</td>
                            <td>{{$teachers->degree}}</td>
                            <td>{{$teachers->experience}}</td>
                            <td>{{$teachers->subject->subject}}</td>
                            <td>{{$teachers->address}}</td>
                            <td>{{$teachers->mobile_no}}</td>
                            <td>{{$teachers->blood_group}}</td>
                            <td>
                                <div class="d-flex">
                                    <div>
                                        <a href="" class="text-decoration-none btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#teacherEditModal{{$teachers->id}}"><i class="bi bi-pen"></i></a>
                                        <div class="modal fade" id="teacherEditModal{{$teachers->id}}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="teacherModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="teacherModalLabel">Teacher Edit</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('update.teacher', ['id' => $teachers->id])}}" method="post" class="teacher-form-update">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" class="form-control input mt-3" name="teacher_id"
                                                                value="{{$teachers->id}}" id="teacher-id-{{$teachers->id}}">
                                                            <input type="text" class="form-control input mt-3" name="name"
                                                                placeholder="Name" id="teacher-update-name-{{$teachers->id}}"
                                                                value="{{old('name', $teachers->name)}}">
                                                            <span id="teacher-name-error-{{$teachers->id}}" class="text-danger d-block"></span>
                                                            <input type="text" class="form-control input mt-3" name="age"
                                                                placeholder="Age" id="teacher-update-age-{{$teachers->id}}"
                                                                value="{{old('age', $teachers->age)}}">
                                                            <span id="teacher-age-error-{{$teachers->id}}" class="text-danger d-block"></span>
                                                            <input type="date" class="form-control input mt-3" name="dob"
                                                                placeholder="Date" id="teacher-update-dob-{{$teachers->id}}"
                                                                value="{{old('dob', $teachers->dob)}}">
                                                            <span id="teacher-dob-error-{{$teachers->id}}" class="text-danger d-block"></span>
                                                            <input type="text" class="form-control input mt-3" name="email"
                                                                placeholder="Email ID" id="teacher-update-email-{{$teachers->id}}"
                                                                value="{{old('email', $teachers->email)}}">
                                                            <span id="teacher-email-error-{{$teachers->id}}" class="text-danger d-block"></span>
                                                            <input type="text" class="form-control input mt-3" name="father_name"
                                                                placeholder="Father Name"
                                                                id="teacher-update-father-name-{{$teachers->id}}"
                                                                value="{{old('father_name', $teachers->father_name)}}">
                                                            <span id="teacher-father-name-error-{{$teachers->id}}"
                                                                class="text-danger d-block"></span>
                                                            <input type="text" class="form-control input mt-3" name="mother_name"
                                                                placeholder="Mother Name"
                                                                id="teacher-update-mother-name-{{$teachers->id}}"
                                                                value="{{old('mother_name', $teachers->mother_name)}}">
                                                            <span id="teacher-mother-name-error-{{$teachers->id}}"
                                                                class="text-danger d-block"></span>
                                                            <input type="text" class="form-control input mt-3" name="degree"
                                                                placeholder="Degree"
                                                                id="teacher-update-degree-{{$teachers->id}}"
                                                                value="{{old('degree', $teachers->degree)}}">
                                                            <span id="teacher-degree-error-{{$teachers->id}}" class="text-danger d-block"></span>
                                                            <input type="text" class="form-control input mt-3" name="experience"
                                                                placeholder="Experience"
                                                                id="teacher-update-experience-{{$teachers->id}}"
                                                                value="{{old('experience', $teachers->experience)}}">
                                                            <span id="teacher-experience-error-{{$teachers->id}}"
                                                                class="text-danger d-block"></span>
                                                            <select class="form-select input mt-3 mb-3"
                                                                aria-label="Default select example" name="subject_id"
                                                                id="teacher-update-subject-id-{{$teachers->id}}">
                                                                <option disabled selected>Select Subjects</option>
                                                                @foreach ($subject as $items)
                                                                <option value="{{$items->id}}"
                                                                    @if (old('subject_id',$teachers->subject_id) === $items->id)
                                                                        selected @endif>{{$items->subject}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span id="teacher-subject-id-error-{{$teachers->id}} "
                                                                class="text-danger d-block"></span>
                                                            <textarea class="form-control textarea mt-3 mb-3" name="address"
                                                                placeholder="Address" id="teacher-update-address-{{$teachers->id}}">{{old('address',$teachers->address)}}</textarea>
                                                            <span id="teacher-address-error-{{$teachers->id}}" class="text-danger d-block"></span>
                                                            <input type="number" class="form-control input mt-3" name="mobile_no"
                                                                placeholder="Mobile No" id="teacher-update-mobile-no-{{$teachers->id}}"
                                                                value="{{old('mobile_no', $teachers->mobile_no)}}">
                                                            <span id="teacher-mobile-no-error-{{$teachers->id}}" class="text-danger d-block"></span>
                                                            <input type="text" class="form-control input mt-3" name="blood_group"
                                                                placeholder="Blood Group" id="teacher-update-blood-group-{{$teachers->id}}"
                                                                value="{{old('blood_group', $teachers->blood_group)}}">
                                                            <span id="teacher-blood-group-error-{{$teachers->id}}" class="text-danger d-block"></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-info text-light"
                                                            name="teacher_update_submit">Update Teacher</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <a href="" class="text-decoration-none btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteTeacherModal{{$teachers->id}}"><i
                                                class="bi bi-trash"></i></a>
                                        <div class="modal fade" id="deleteTeacherModal{{$teachers->id}}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Teacher Delete</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('delete.teacher', ['id' => $teachers->id])}}" method="post" class="teacher-form-delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <p class="display-6">Are you conform the Delete {{$teachers->name}}  Teacher ?🤔</p>
                                                            <input type="hidden" class="form-control input"
                                                                name="teacher_delete_id" value="{{$teachers->id}}"
                                                                id="teacher-delete-id-{{$teachers->id}}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger text-light"
                                                            name="teacher_delete_submit">Delete Teacher</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

