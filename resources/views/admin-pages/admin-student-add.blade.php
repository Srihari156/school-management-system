@extends('layouts.admin-layout')
@section('title', 'Admin Student Add')
@section('bg-color', 'admin-page-bg')
@section('content')
    <p class="display-6">Student Add</p>
    <div class="mt-3">

        <form action="{{route('store.student')}}" method="post" id="student-form-add">
            <input type="text" class="form-control input " name="name" placeholder="Student Name" id="student-name">
            <span class="text-danger" id="student-name-error"></span>
            <input type="number" class="form-control input mt-3 " name="age" placeholder="Age" id="student-age">
            <span class="text-danger" id="student-age-error"></span>
            <input type="date" class="form-control input mt-3 " name="dob" placeholder="DOB" id="student-dob">
            <span class="text-danger" id="student-dob-error"></span>
            <input type="text" class="form-control input mt-3" name="email" placeholder="Email Id" id="student-email">
            <span class="text-danger" id="student-email-error"></span>
            <input type="text" class="form-control input mt-3 " name="father_name" placeholder="Father Name"
                id="student-father-name">
            <span class="text-danger" id="student-father-name-error"></span>
            <input type="text" class="form-control input mt-3 " name="mother_name" placeholder="Mother Name"
                id="student-mother-name">
            <span class="text-danger" id="student-mother-name-error"></span>
            <input type="text" class="form-control input mt-3 " name="district" placeholder="District"
                id="student-district">
            <span class="text-danger" id="student-district-error"></span>
            <input type="text" class="form-control input mt-3 " name="city" placeholder="City" id="student-city">
            <span class="text-danger" id="student-city-error"></span>
            <select class="form-select input mt-3 " aria-label="Default select example" name="state" id="student-state">
                <option disabled selected>Select State</option>
                <option value="Tamilnadu">Tamilnadu</option>
                <option value="Kerala">Kerala</option>
                <option value="Andra Pradesh">Andra Pradesh</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Delhi">Delhi</option>
                <option value="Bihar">Bihar</option>
                <option value="Punjab">Punjab</option>
                <option value="Goa">Goa</option>
                <option value="Manipur">Manipur</option>
                <option value="Uttar pradesh">Uttar pradesh</option>
            </select>
            <span class="text-danger" id="student-state-error"></span>
            <input type="text" class="form-control input mt-3 " name="nationality" placeholder="Nationality"
                id="student-nationality">
            <span class="text-danger" id="student-nationality-error"></span>
            <input type="text" class="form-control input mt-3 " name="father_occupation" placeholder="Father Occupation"
                id="student-father-occupation">
            <span class="text-danger" id="student-father-occupation-error"></span>
            <input type="text" class="form-control input mt-3 " name="mother_occupation" placeholder="Mother Occupation"
                id="student-mother-occupation">
            <span class="text-danger" id="student-mother-occupation-error"></span>
            <input type="number" class="form-control input mt-3 " name="mobile_no" placeholder="Mobile No"
                id="student-mobile-no">
            <span class="text-danger" id="student-mobile-no-error"></span>
            <textarea class="form-control textarea mt-3 " name="address" placeholder="Address"
                id="student-address"></textarea>
            <span class="text-danger" id="student-address-error"></span>
            <input type="text" class="form-control input mt-3 " name="bloodgroup" placeholder="Blood Group"
                id="student-blood-group">
            <span class="text-danger" id="student-blood-group-error"></span>
            <select class="form-select input mt-3 " aria-label="Default select example" name="class_id"
                id="student-class">
                <option disabled selected>Select Class</option>
                @foreach ($class as $clname)
                    <option value="{{$clname->id}}">{{$clname->class_name}}</option>
                @endforeach

            </select>
            <span class="text-danger d-block" id="student-class-error"></span>
            <button type="submit" name="student_submit" class="btn btn-info mt-3 text-light">Add Student</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-info mt-3 table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Date Of Birth</th>
                        <th>Email ID</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>District</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Nationality</th>
                        <th>Father Occupation</th>
                        <th>Mother Occupation</th>
                        <th>Mobile No</th>
                        <th>Address</th>
                        <th>Blood Group</th>
                        <th>Class</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;?>
                    @foreach ($student as $studentDetails)
                        <?php    $i++; ?>
                        <tr>
                            <td><?php    echo $i; ?></td>
                            <td>{{$studentDetails->name}}</td>
                            <td>{{$studentDetails->age}}</td>
                            <td>{{$studentDetails->dob}}</td>
                            <td>{{$studentDetails->email}}</td>
                            <td>{{$studentDetails->father_name}}</td>
                            <td>{{$studentDetails->mother_name}}</td>
                            <td>{{$studentDetails->district}}</td>
                            <td>{{$studentDetails->city}}</td>
                            <td>{{$studentDetails->state}}</td>
                            <td>{{$studentDetails->nationality}}</td>
                            <td>{{$studentDetails->father_occupation}}</td>
                            <td>{{$studentDetails->mother_occupation}}</td>
                            <th>{{$studentDetails->mobile_no}}</th>
                            <td>{{$studentDetails->address}}</td>
                            <td>{{$studentDetails->bloodgroup}}</td>
                            <td>{{$studentDetails->classModel->class_name ?? 'N/A'}}</td>
                            <td>
                                <div class="d-flex">
                                    <div>
                                        <a href="" class="text-decoration-none btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#studentEditModal{{$studentDetails->id}}"><i
                                                class="bi bi-pen"></i></a>
                                        <div class="modal fade" id="studentEditModal{{$studentDetails->id}}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Class Edit</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('update.student', ['id' => $studentDetails->id])}}" method="post" class="student-form-update">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" class="form-control input" name="student_id"
                                                                value="{{$studentDetails->id}}" id="student-id">
                                                            <input type="text" class="form-control input" name="name"
                                                                placeholder="Student"
                                                                id="student-update-name-{{$studentDetails->id}}"
                                                                value="{{old('name', $studentDetails->name)}}">
                                                            <span id="student-name-error-{{$studentDetails->id}}"
                                                                class="text-danger d-block"></span>
                                                            <input type="number" class="form-control input mt-2 mb-3" name="age"
                                                                placeholder="Age" id="student-update-age-{{$studentDetails->id}}" value="{{ old('age', $studentDetails->age) }}">
                                                            <span class="text-danger"
                                                                id="student-age-error-{{$studentDetails->id}}"></span>
                                                            <input type="date" class="form-control input mt-2 mb-3" name="dob"
                                                                placeholder="DOB" id="student-update-dob-{{$studentDetails->id}}" value="{{ old('dob', $studentDetails->dob) }}">
                                                            <span class="text-danger" id="student-dob-error-{{$studentDetails->id}}"></span>
                                                            <input type="text" class="form-control input mt-2 mb-3" name="email"
                                                                placeholder="email" id="student-update-email-{{$studentDetails->id}}" value="{{ old('email', $studentDetails->email) }}">
                                                            <span class="text-danger" id="student-email-error-{{$studentDetails->id}}"></span>
                                                            <input type="text" class="form-control input mt-2 mb-3"
                                                                name="father_name" placeholder="Father Name"
                                                                id="student-update-father-name-{{$studentDetails->id}}" value="{{ old('father_name', $studentDetails->father_name) }}">
                                                            <span class="text-danger" id="student-father-name-error-{{$studentDetails->id}}"></span>
                                                            <input type="text" class="form-control input mt-2 mb-3"
                                                                name="mother_name" placeholder="Mother Name"
                                                                id="student-update-mother-name-{{$studentDetails->id}}" value="{{ old('mother_name', $studentDetails->mother_name) }}">
                                                            <span class="text-danger" id="student-mother-name-error-{{$studentDetails->id}}"></span>
                                                            <input type="text" class="form-control input mt-2 mb-3"
                                                                name="district" placeholder="District" id="student-update-district-{{$studentDetails->id}}" 
                                                                value="{{ old('district', $studentDetails->district) }}">
                                                            <span class="text-danger" id="student-district-error-{{$studentDetails->id}}"></span>
                                                            <input type="text" class="form-control input mt-2 mb-3" name="city"
                                                                placeholder="City" id="student-update-city-{{$studentDetails->id}}" value="{{ old('city', $studentDetails->city) }}">
                                                            <span class="text-danger" id="student-city-error-{{$studentDetails->id}}"></span>
                                                            <select class="form-select input mt-2 mb-3"
                                                                aria-label="Default select example" name="state"
                                                                id="student-update-state-{{$studentDetails->id}}">
                                                                <option disabled selected>Select State</option>
                                                                <option value="Tamilnadu" @if (old('state', $studentDetails->state) === "Tamilnadu")
                                                                selected @endif>Tamilnadu</option>
                                                                <option value="Kerala" @if (old('state', $studentDetails->state) === "Kerala")
                                                                selected @endif>Kerala</option>
                                                                <option value="Andra Pradesh" @if (old('state', $studentDetails->state) === "Andra Pradesh")
                                                                selected @endif>Andra Pradesh</option>
                                                                <option value="Karnataka" @if (old('state', $studentDetails->state) === "Karnataka")
                                                                selected @endif>Karnataka</option>
                                                                <option value="Delhi" @if (old('state', $studentDetails->state) === "Delhi")
                                                                selected @endif>Delhi</option>
                                                                <option value="Bihar" @if (old('state', $studentDetails->state) === "Bihar")
                                                                selected @endif>Bihar</option>
                                                                <option value="Punjab" @if (old('state', $studentDetails->state) === "Punjab")
                                                                selected @endif>Punjab</option>
                                                                <option value="Goa" @if (old('state', $studentDetails->state) === "Goa")
                                                                selected @endif>Goa</option>
                                                                <option value="Manipur" @if (old('state', $studentDetails->state) === "Manipur")
                                                                selected @endif>Manipur</option>
                                                                <option value="Uttar pradesh" @if (old('state', $studentDetails->state) === "Uttar pradesh")
                                                                selected @endif>Uttar pradesh</option>
                                                            </select>
                                                            <span class="text-danger-{{$studentDetails->id}}" id="student-state-error"></span>
                                                            <input type="text" class="form-control input mt-2 mb-3"
                                                                name="nationality" placeholder="Nationality"
                                                                id="student-update-nationality-{{$studentDetails->id}}" value="{{ old('nationality', $studentDetails->nationality) }}">
                                                            <span class="text-danger" id="student-nationality-error-{{$studentDetails->id}}"></span>
                                                            <input type="text" class="form-control input mt-2 mb-3"
                                                                name="father_occupation" placeholder="Father Occupation"
                                                                id="student-update-father-occupation-{{$studentDetails->id}}" value="{{ old('father_occupation', $studentDetails->father_occupation) }}">
                                                            <span class="text-danger"
                                                                id="student-father-occupation-error-{{$studentDetails->id}}"></span>
                                                            <input type="text" class="form-control input mt-2 mb-3"
                                                                name="mother_occupation" placeholder="Mother Occupation"
                                                                id="student-update-mother-occupation-{{$studentDetails->id}}" value="{{ old('mother_occupation', $studentDetails->mother_occupation) }}">
                                                            <span class="text-danger"
                                                                id="student-mother-occupation-error-{{$studentDetails->id}}"></span>
                                                            <input type="number" class="form-control input mt-2 mb-3"
                                                                name="mobile_no" placeholder="Mobile No" id="student-update-mobile-no-{{$studentDetails->id}}" 
                                                                value="{{ old('mobile_no', $studentDetails->mobile_no) }}">
                                                            <span class="text-danger" id="student-mobile-no-error-{{$studentDetails->id}}"></span>
                                                            <textarea class="form-control textarea mt-2 mb-3" name="address"
                                                                placeholder="Address" id="student-update-address-{{$studentDetails->id}}">{{ old('address', $studentDetails->address) }}</textarea>
                                                            <span class="text-danger" id="student-address-error-{{$studentDetails->id}}"></span>
                                                            <input type="text" class="form-control input mt-2 mb-3"
                                                                name="bloodgroup" placeholder="Blood Group"
                                                                id="student-update-blood-group-{{$studentDetails->id}}" value="{{ old('bloodgroup', $studentDetails->bloodgroup) }}">
                                                            <span class="text-danger" id="student-blood-group-error-{{$studentDetails->id}}"></span>
                                                            <select class="form-select input mt-2 mb-3"
                                                                aria-label="Default select example" name="class_id"
                                                                id="student-update-class-id-{{$studentDetails->id}}">
                                                                <option disabled selected>Select Class</option>
                                                                @foreach ($class as $clname)
                                                                    <option value="{{$clname->id}}" @if (old('class_id', $studentDetails->class_id) === $clname->id)
                                                                    selected
                                                                    @endif>{{$clname->class_name}}</option>
                                                                @endforeach

                                                            </select>
                                                            <span class="text-danger d-block" id="student-class-error-{{$studentDetails->id}}"></span>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-info text-light"
                                                            name="student_update_submit">Update Student</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms-2">
                                        <a href="" class="text-decoration-none btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteStudentModal{{$studentDetails->id}}"><i
                                                class="bi bi-trash"></i></a>
                                        <div class="modal fade" id="deleteStudentModal{{$studentDetails->id}}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Class Delete</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('delete.student', ['id' => $studentDetails->id])}}" method="post" class="student-form-delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <p class="display-6">Are you conform the Delete Class ?🤔</p>
                                                            <input type="hidden" class="form-control input"
                                                                name="student_delete_id" value="{{$studentDetails->id}}"
                                                                id="student-delete-id">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger text-light"
                                                            name="student_delete_submit">Delete Student</button>
                                                        </form>
                                                    </div>
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

