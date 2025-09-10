    @extends('layouts.admin-layout')
    @section('title','Admin Subject Add')
    @section('bg-color', 'admin-page-bg')
    @section('content')
        <p class="display-6">Subject Add</p>
            <div class="mt-3">

                <form action="{{route('store.subject')}}" method="post" id="subject-form-add">
                    @csrf
                    <input type="text" class="form-control input " name="subject" placeholder="Subject Name"
                        id="subject-name">
                    <span class="d-block text-danger" id="subject-name-error"></span>
                    <button type="submit" name="subject_submit" class="btn btn-info mt-3 text-light">Add Subject</button>
                </form>
                <div class="table-responsive">
                <table class="table table-bordered table-info mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Subject Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($subject as $subj)
                            <?php $i++;?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>{{$subj->subject}}</td>
                                <td>
                                    <div class="d-flex ">
                                        <div>
                                            <a href="" class="text-decoration-none btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#subjectEditModal{{$subj->id}}"><i class="bi bi-pen"></i></a>
                                            <div class="modal fade" id="subjectEditModal{{$subj->id}}" tabindex="-1"
                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="subjectModalLabel">Subject Edit</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('update.subject',["id" => $subj->id])}}"
                                                                method="post" class="subject-form-update">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" class="form-control input" name="subject_id"
                                                                    value="{{$subj->id}}" id="subject-id">
                                                                <input type="text" class="form-control input" name="subject"
                                                                    placeholder="Subject" id="subject-update-name {{$subj->id}}"
                                                                    value="{{old('subject', $subj->subject)}}">
                                                                <span id="subject-name-error" class="text-danger d-block"></span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-info text-light"
                                                                name="subject_update_submit">Update Subject</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <a href="" class="text-decoration-none btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#subjectDeleteModal{{$subj->id}}"><i class="bi bi-trash"></i></a>
                                            <div class="modal fade" id="subjectDeleteModal{{$subj->id}}" tabindex="-1"
                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Subject Delete</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('delete.subject', ['id' => $subj->id])}}"
                                                                method="post" class="subject-form-delete">
                                                                @csrf
                                                                @method('DELETE')
                                                                <p class="display-6">Are you conform the Delete Subject ?🤔</p>
                                                                <input type="hidden" class="form-control input"
                                                                    name="subject_delete_id" value="{{$subj->id}}"
                                                                    id="subject-delete-id-{{$subj->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger text-light"
                                                                name="subject_delete_submit">Delete Class</button>
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
            
        </script>
    @endsection