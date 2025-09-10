@extends('layouts.admin-layout')
@section('title', 'Admin Class Add')
@section('bg-color', 'admin-page-bg')
@section('content')
    <p class="display-6 mt-3">Class Add</p>
    <div class="mt-3" id="parent-class-add">
        <div>
            <form action="{{route('store.class')}}" method="post" id="class-form">
                @csrf
                <input type="text" class="form-control input input-class" name="class_name" placeholder="Class" id="class-name">
                <span id="class-name-error" class="text-danger d-block"></span>
                <button type="submit" name="class_submit" class="btn btn-info mt-3 text-light">Add Class</button>
            </form>
        </div>
        <div class="table-responsive"  id="table-overflow">
            <table class="table table-bordered table-info overflow-auto h-25">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Class</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;?>
                    @foreach ($class as $name)
                        <?php    $i++; ?>
                        <tr>
                            <td><?php    echo $i; ?></td>
                            <td>{{$name->class_name}}</td>
                            
                            <td>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <a href="" class="text-decoration-none btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#classEditModal{{$name->id}}"><i class="bi bi-pen"></i></a>
                                        <div class="modal fade" id="classEditModal{{$name->id}}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Class Edit</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('update.class', ['id' => $name->id])}}"
                                                            method="post" class="class-form-update">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" class="form-control input" name="class_id"
                                                                value="{{$name->id}}" id="class-id">
                                                            <input type="text" class="form-control input" name="class_name"
                                                                placeholder="Class" id="class-update-name-{{$name->id}}"
                                                                value="{{old('class_name', $name->class_name)}}">
                                                            <span id="class-name-error" class="text-danger d-block"></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-info text-light"
                                                            name="class_update_submit">Update Class</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="" class="text-decoration-none btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteClassModal{{$name->id}}"><i class="bi bi-trash"></i></a>
                                        <div class="modal fade" id="deleteClassModal{{$name->id}}" tabindex="-1"
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
                                                        <form action="{{route('delete.class', ['id' => $name->id])}}"
                                                            method="post" class="class-form-delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <p class="display-6">Are you conform the Delete Class ?🤔</p>
                                                            <input type="hidden" class="form-control input"
                                                                name="class_delete_id" value="{{$name->id}}"
                                                                id="class-delete-id">
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
