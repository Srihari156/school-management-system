@extends('layouts.admin-layout')
@section('title', 'Admin Assign Teacher Class')
@section('bg-color', 'admin-page-bg')
@section('content')

    <p class="display-6">Teacher Assign Class Add</p>
    <div class="mt-3">

        <form action="{{route('store.teacher-assign-class')}}" method="post" id="teacher-assign-class-form">
            @csrf
            <select class="form-select input " aria-label="Default select example" name="teacher_id" id="teacher-name">
                <option disabled selected>Select Teacher Name</option>
                @foreach ($teacher as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach

            </select>
            <span class="text-danger mb-3" id="teacher-name-error"></span>
            <select class="form-select input  mt-2" aria-label="Default select example" name="subject_id"
                id="teacher-subject">
                <option disabled selected>Select Subjects</option>
                @foreach ($subject as $item)
                    <option value="{{$item->id}}">{{$item->subject}}</option>
                @endforeach
            </select>
            <span class="text-danger mb-3" id="teacher-subject-error"></span>
            <select class="form-select input  mt-2" aria-label="Default select example" name="class_id" id="student-class">
                <option disabled selected>Select Class</option>
                @foreach ($class as $item)
                    <option value="{{$item->id}}">{{$item->class_name}}</option>
                @endforeach
            </select>
            <span class="text-danger d-block mb-3" id="teacher-class-error"></span>
            <button type="submit" name="assign_class_teacher_submit" class="btn btn-info mt-3 text-light ">Add Assign Class
                Teacher</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-info mt-3 table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Teacher Name</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;?>
                    @foreach ($teacherAssign as $assign)
                        <?php    $i++; ?>
                        <tr>
                            <td><?php    echo $i;?></td>
                            <td>{{$assign->teacher->name ?? 'N/A'}}</td>
                            <td>{{$assign->subject->subject ?? 'N/A'}}</td>
                            <td>{{$assign->classes->class_name ?? 'N/A'}}</td>
                            <td>
                                <div class="d-flex ">
                                    <div>
                                        <a href="" class="text-decoration-none btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#teacherAssignEditModal{{$assign->id}}"><i class="bi bi-pen"></i></a>
                                        <div class="modal fade" id="teacherAssignEditModal{{$assign->id}}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Teacher Assign Class
                                                            Edit</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('update.teacher-assign-class',['id' => $assign->id])}}" method="post" class="teacher-assign-class-form-update">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" class="form-control input" name="teacher_assign_class_id"
                                                                value="{{$assign->id}}" id="teacher-assign-class-id-{{$assign->id}}">
                                                            <select class="form-select input mb-3"
                                                                aria-label="Default select example" name="teacher_id"
                                                                id="teacher-name-{{$assign->id}}">
                                                                <option disabled selected>Select Teacher Name</option>
                                                                @foreach ($teacher as $item)
                                                                    <option value="{{$item->id}}" @if (old('teacher_id', $assign->teacher_id) === $item->id)
                                                                        selected
                                                                    @endif>{{$item->name}}</option>
                                                                @endforeach

                                                            </select>
                                                            <span class="text-danger" id="teacher-name-error-{{$assign->id}}"></span>
                                                            <select class="form-select input mb-3"
                                                                aria-label="Default select example" name="subject_id"
                                                                id="teacher-subject-{{$assign->id}}">
                                                                <option disabled selected>Select Subjects</option>
                                                                @foreach ($subject as $item)
                                                                    <option value="{{$item->id}}" @if (old('subject_id', $assign->subject_id) === $item->id)
                                                                        selected
                                                                    @endif>{{$item->subject}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger" id="teacher-subject-error-{{$assign->id}}"></span>
                                                            <select class="form-select input mb-3"
                                                                aria-label="Default select example" name="class_id"
                                                                id="student-class-{{$assign->id}}">
                                                                <option disabled selected>Select Class</option>
                                                                @foreach ($class as $item)
                                                                    <option value="{{$item->id}}" @if (old('class_id', $assign->class_id) === $item->id)
                                                                        selected
                                                                    @endif>{{$item->class_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger" id="teacher-class-error-{{$assign->id}}"></span>
                                                            
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-info text-light"
                                                            name="teacher_assign_update_submit">Update Teacher Assign</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <a href="" class="text-decoration-none btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#teacherAssignDeleteModal{{$item->id}}"><i
                                                class="bi bi-trash"></i></a>
                                        <div class="modal fade" id="teacherAssignDeleteModal{{$item->id}}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Teacher Assign Delete
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('delete.teacher-assign-class', ['id' => $assign->id])}}" method="post" class="teacher-assign-class-form-delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <p class="display-6">Are you conform the Delete Teacher Assign ?🤔
                                                            </p>
                                                            <input type="hidden" class="form-control input"
                                                                name="teacher_assign_delete_id" value="{{$assign->id}}"
                                                                id="teacher-assign-delete-id">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger text-light"
                                                            name="class_delete_submit">Delete Class</button>
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

{{-- @section('script')
    <script>
        
    </script>
@endsection --}}