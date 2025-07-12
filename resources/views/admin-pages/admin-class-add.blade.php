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
                                                                placeholder="Class" id="class-update-name {{$name->id}}"
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
@section('script')
    <script>
        $(document).ready(function () {
            $('#class-form').on('submit', function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('store.class')}}',
                    data: $(this).serialize(),
                    type: 'post',
                    success: function (data) {
                        if (data.code === 422) {
                            console.log(data);
                            $('#class-name-error').html(data.error.class_name[0]);
                        } else if (data.status === 200) {
                            //alert(data.message);
                            Swal.fire({
                                title: "Good Job !",
                                text: data.message,
                                icon: 'success'
                            });
                            $('#class-form')[0].reset();
                            $('#class-name-error').html('');
                            setTimeout(() => {
                                location.reload();
                            }, 5000);
                            
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        // $('#saveBtn').html('Save Changes');

                    },
                });
            });
            $('.class-form-update').on('submit', function (event) {
                event.preventDefault();
                const id = $(this).find('#class-id').val();
                const data = {
                    'class_name': $(this).find(`#class-update-name\\ ${id}`).val()
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'put',
                    url: '/update-class/' + id,
                    data: data,
                    success: function (data) {
                        if (data.code === 422) {
                            console.log(data);
                            $(this).find('#class-name-error').html(data.error.class_name[0]);
                        } else if (data.status === 200) {
                            // alert(data.message);
                            Swal.fire({
                                title: "Good Job !",
                                text: data.message,
                                icon: 'success'
                        });
                            // $('#class-form-update')[0].reset();
                            $('#class-name-error').html('');
                            $(`#classEditModal${id}`).modal('hide');
                            setTimeout(() => {
                                location.reload();
                            }, 5000);
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        // alert('not update');
                        Swal.fire({
                                title: "Error !",
                                text: 'not update',
                                icon: 'error'
                        });
                    }
                });
            });
            $('.class-form-delete').on('submit', function (event) {
                event.preventDefault();
                const id = $(this).find('#class-delete-id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'delete',
                    url: '/delete-class/' + id,
                    success: function (data) {
                        if (data.code === 200) {
                            console.log(data);
                            // alert(data.message);
                             Swal.fire({
                                title: "Good Job !",
                                text: data.message,
                                icon: 'success'
                            });
                            $(`#deleteClassModal${id}`).modal('hide');
                            setTimeout(() => {
                                location.reload();
                            }, 5000);
                        } 
                    },
                    error: function (xhr) {
                        console.log('Delete Error:', xhr.responseText);
                        // alert('Delete failed.');
                         Swal.fire({
                                title: "Error !",
                                text: 'Delete failed',
                                icon: 'error'
                        });
                    }
                });
            });
        });
    </script>
@endsection