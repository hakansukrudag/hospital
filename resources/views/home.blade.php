@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <h1 class="textMargin">Admin Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">User</div>
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn brand-primary" onclick="resetUserDataValues(event)">
                            Add New
                    </button>
                    <hr>
                    <ul>
                        @foreach($users as $user)
                            <div style="text-align: left; margin-bottom: 5px; color:red; margin-top:20px">
                            <button type="button" class="btn btn-danger " onclick="del({{ $user->id }}, event)">Delete</button>
                            </div>
                            <li>Name: {{ $user->name }} </li>
                            <li>Email: {{ $user->email }} </li>
                            <li>Age: {{ $user->age }} </li>
                            <li>Image Path: {{ $user->image_path }} </li>
                            @if($user->admin)
                                <li>Type: <span class="badge badge-dark">Admin</span></li>
                            @else
                                <li>Type: User</li>
                            @endif
                            <div style="text-align: left; margin-bottom: 5px; margin-top:20px">
                                <button type="button"  class="btn btn-danger hlt_btn" onclick="resetEditUserDataValues({{ $user->id }}, event)">Edit</button>
                            </div>
                            <hr>

                        @endforeach
                    </ul>



                </div>
            </div>
        </div>
        <div class="container">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Appointment</div>
                <div class="panel-body">Panel Content</div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Consultant</div>
                <div class="panel-body">Panel Content</div>
            </div>
        </div>
        </div>
    </div>
</div>

    <!-- Add Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="userForm" method="post" action="{{ route('storeUserData') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                <small style="color:red" id="nameError"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-sm-2 control-label">Age</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="age" id="age" placeholder="Age">
                                <small style="color:red" id="ageError"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_path" class="col-sm-2 control-label">Image Path</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="image_path" id="image_path"
                                       placeholder="Image Path">
                                <small style="color:red" id="imagePathError"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                <small style="color:red" id="emailError"></small>
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="username" class="col-sm-2 control-label">Username</label>--}}
                        {{--                            <div class="col-sm-10">--}}
                        {{--                                <input type="text" class="form-control" id="username" placeholder="Username">--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="Password">
                                <small style="color:red" id="passwordError"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="isAdmin" id="isAdmin"> Admin?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveUserDataBtn" onclick="storeUserData(event)">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myEditModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myEditModalLabel">Edit User</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="editUserForm" method="post" action="{{ route('storeChanges') }}">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="editName" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="editName" id="editName" placeholder="Name">
                                <small style="color:red" id="editNameError"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editAge" class="col-sm-2 control-label">Age</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="editAge" id="editAge" placeholder="Age">
                                <small style="color:red" id="editAgeError"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_image_path" class="col-sm-2 control-label">Image Path</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="edit_image_path" id="edit_image_path"
                                       placeholder="Image Path">
                                <small style="color:red" id="editImagePathError"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="editEmail" id="editEmail" placeholder="Email">
                                <small style="color:red" id="editEmailError"></small>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="editIsAdmin" id="editIsAdmin"> Admin?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="editUserDataBtn" onclick="saveChanges(event)">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function resetUserDataValues() {
            event.preventDefault();
            $('#name').val('');
            $('#email').val('');
            $('#age').val('');
            $('#image_path').val('');
            $('#password').val('');
            $('#addUserModal').modal('show');
        }

        function resetEditUserDataValues(id, event) {
            event.preventDefault();
            $('#editName').val('');
            $('#editEmail').val('');
            $('#editAge').val('');
            $('#edit_image_path').val('');
            $('#editPassword').val('');


            $.ajax({
              type: 'GET',
              url: '{{ route('showUserData') }}',
              dataType: "JSON",
              data: {id: id},
              success(returnData) {
                $('#editName').val(returnData.userData.name);
                $('#id').val(returnData.userData.id);
                $('#editEmail').val(returnData.userData.email);
                $('#editAge').val(returnData.dob);
                $('#edit_image_path').val(returnData.userData.image_path);
                $('#editIsAdmin').prop('checked', returnData.userData.admin);
                $('#editUserModal').modal('show');
              },
              error(res) {
                alert('Something went wrong!')
              }
            });
        }

        function resetErrorMessages() {
            $('#nameError').empty('');
            $('#emailError').empty('');
            $('#ageError').empty();
            $('#imagePathError').empty('');
            $('#passwordError').empty('');
        }
        function resetEditErrorMessages() {
            $('#editNameError').empty('');
            $('#editEmailError').empty('');
            $('#editAgeError').empty();
            $('#editImagePathError').empty('');
            $('#editPasswordError').empty('');
        }

        function storeUserData(event) {
            resetErrorMessages();
            event.preventDefault();

            let form = $('#userForm');
            let formData = form.serialize();
            let url = form.attr('action');
            $.ajax({
                type: 'POST',
                url: url,
                dataType: "JSON",
                data: formData,
                beforeSend() {
                    $('#saveUserDataBtn').prop('disabled', true);
                    $('#saveUserDataBtn').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
                },
                success(returnData) {
                    $('#saveUserDataBtn').prop('disabled', false);
                    $('#saveUserDataBtn').html('Save changes');
                    window.location.reload();
                },

                error(res) {
                    $('#saveUserDataBtn').prop('disabled', false);
                    $('#saveUserDataBtn').html('Save changes');

                    let obj = JSON.parse(res.responseText);

                    if (obj.errors.name) {
                        $('#nameError').html(obj.errors.name);

                    }
                    if (obj.errors.email) {
                        $('#emailError').html(obj.errors.email);
                    }

                    if (obj.errors.age) {
                        $('#ageError').html(obj.errors.age);
                    }

                    if (obj.errors.image_path) {
                        $('#imagePathError').html(obj.errors.image_path);
                    }

                    if (obj.errors.password) {
                        $('#passwordError').html(obj.errors.password);
                    }
                }

            });

        }

        function del(id, event)
        {
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('userDelete') }}',
                dataType: "JSON",
                data: {id: id, _token:'{{ @csrf_token() }}'},
                success(returnData) {
                    window.location.reload();
                },

                error(res) {

                }

            });

        }

        function saveChanges(event)
        {
          resetEditErrorMessages();
            event.preventDefault();
            let form = $('#editUserForm');
            let formData = form.serialize();
            let url = form.attr('action');

            $.ajax({
                type: 'POST',
                url: url,
                dataType: "JSON",
                data: formData,
                success(returnData) {
                    window.location.reload();
                },

                error(res) {
                  let obj = JSON.parse(res.responseText);

                  if (obj.errors.editName) {
                      $('#editNameError').html(obj.errors.editName);

                  }
                  if (obj.errors.editEmail) {
                      $('#editEmailError').html(obj.errors.editEmail);
                  }

                  if (obj.errors.editAge) {
                      $('#editAgeError').html(obj.errors.editAge);
                  }

                  if (obj.errors.edit_image_path) {
                      $('#editImagePathError').html(obj.errors.edit_image_path);
                  }

                }

            });

        }


    </script>
@endpush

