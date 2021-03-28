@extends('../layouts.app')

@section('content')
    <div class="container ">
    <div class="container dashboardPanel">
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
                                    <button type="button"  class="btn btn-danger hlt_btn" onclick="edit({{ $user->id }}, event)">Edit</button>
                                </div>
                                <span>------------------------------ </span>

                            @endforeach
                        </ul>



                    </div>
                </div>
            </div>
        </div>
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
    <!-- Modal -->
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

        function resetErrorMessages() {
            $('#nameError').empty('');
            $('#emailError').empty('');
            $('#ageError').empty();
            $('#imagePathError').empty('');
            $('#passwordError').empty('');
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

        function edit(id, event)
        {
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('userEdit') }}',
                dataType: "JSON",
                data: {id: id, _token:'{{ @csrf_token() }}'},
                success(returnData) {
                    window.location.reload();
                },

                error(res) {

                }

            });

        }


    </script>
@endpush

