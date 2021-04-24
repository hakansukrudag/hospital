@extends('../layouts.appadmin')

@section('content')
<div class="container">
    <div class="row text-center">
        <h1 class="textMargin">Admin Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-info">
                       <div class="panel-heading">User</div>
                       <div class="panel-body">
                           <button onclick="resetUserDataValues(event)" class="btn btn-sm btn-secondary">Add New</button>
                           <hr>
                           <div class="table-responsive">
                               <table class="table table-condensed">
                                    <tr>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Age</td>
                                        <td>Image Path</td>
                                        <td>Is Admin?</td>
                                        <td>Action</td>
                                    </tr>
                                   @foreach($users as $user)
                                       <tr>
                                           <td>{{ $user->name }}</td>
                                           <td>{{ $user->email }}</td>
                                           <td>{{ $user->age }}</td>
                                           <td>{{ $user->image_path }}</td>
                                           @if($user->admin)
                                               <td><span class="badge badge-dark">Admin</span></td>
                                           @else
                                               <td>User</td>
                                           @endif
                                           <td>
                                              <span><a href="" onclick="del({{ $user->id }}, event)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
                                               <span><a href="" onclick="resetEditUserDataValues({{ $user->id }}, event)"><i class="fa fa-edit" aria-hidden="true"></i></a></span>
                                           </td>
                                       </tr>
                                   @endforeach
                               </table>
                           </div>
                       </div>
                   </div>
        </div>
        <div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Appointment</div>
                <div class="panel-body">
                    <button onclick="showAppointmentModalBox(event)" class="btn btn-sm btn-secondary">Add New</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                             <tr>
                                 <td>Date Time</td>
                                 <td>User</td>
                                 <td>Department</td>
                                 <td>Procedure</td>
                                 <td>Action</td>
                             </tr>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->date_time->format('d-m-Y H:m') }}</td>
                                    <td>{{ $appointment->user->name }}</td>
                                    <td>{{ $appointment->department->name }}</td>
                                    <td>{{ $appointment->procedure->name }}</td>
                                    <td><a href="" onclick="delAppointment({{ $appointment->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="panel panel-info">
                    <div class="panel-heading">Consultant</div>
                    <div class="panel-body">
                        <button onclick="resetConsultantValues()" class="btn btn-sm btn-secondary">Add New</button>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                 <tr>
                                     <td>Name</td>
                                     <td>Action</td>
                                 </tr>
                                @foreach($consultants as $consultant)
                                    <tr>
                                        <td>{{ $consultant->name }}</td>
                                        <td><a href="" onclick="delConsultant({{ $consultant->id }}, event)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
        </div>

            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Medicine</div>
                    <div class="panel-body">
                        <button onclick="resetConsultantValues()" class="btn btn-sm btn-secondary">Add New</button>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tr>
                                    <td>Name</td>
                                    <td>Action</td>
                                </tr>
                                @foreach($medicines as $medicine)
                                    <tr>
                                        <td>{{ $medicine->name }}</td>
                                        <td><a href="" onclick="delConsultant({{ $medicine->id }}, event)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <!-- Add User Modal  -->
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

    <!-- Edit User Modal -->
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

    <!-- Add Appointment Modal -->
    <div class="modal fade" id="addAppointment" tabindex="-1" role="dialog" aria-labelledby="myAppointmentModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myAppointmentModal">Add Appointment</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="appointmentForm" method="post" action="{{ route('appointmentAdd') }}">
                    @csrf
                    <div class="form-group">
                        <label for="appointmentUser" class="col-sm-2 control-label">Users</label>
                        <div class="col-sm-10">
                            <select type="text" class="form-control" name="appointmentUser" id="appointmentUser">
                                @foreach($usersAppointment as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <small style="color:red" id="appointmentUserError"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="appointmentDatetime" class="col-sm-2 control-label">DateTime</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" name="appointmentDatetime" id="appointmentDatetime" placeholder="Appointment Date Time">
                            <small style="color:red" id="appointmentDatetimeError"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="appointmentDepartment" class="col-sm-2 control-label">Departments</label>
                        <div class="col-sm-10">
                            <select type="text" class="form-control" name="appointmentDepartment" id="appointmentDepartment">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            <small style="color:red" id="appointmentDepartmentError"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="appointmentProcedure" class="col-sm-2 control-label">Procedures</label>
                        <div class="col-sm-10">
                            <select type="text" class="form-control" name="appointmentProcedure" id="appointmentProcedure">
                                @foreach($procedures as $procedure)
                                    <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                                @endforeach
                            </select>
                            <small style="color:red" id="appointmentProcedureError"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  onclick="storeAppointmentData(event)">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Consultant Modal -->
<div class="modal fade" id="addConsultantModal" tabindex="-1" role="dialog" aria-labelledby="myAddConsultantModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myAddConsultantModalLabel">Add Consultant</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" id="consultantForm" method="post" action="{{ route('consultantAdd') }}">
                @csrf

                <div class="form-group">
                    <label for="consultantName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="consultantName" id="consultantName" placeholder="Consultant Name">
                        <small style="color:red" id="consultantNameError"></small>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  onclick="storeConsultantData(event)">
                Save changes
            </button>
        </div>
    </div>
</div>
</div>

<!-- Add Medicine Modal -->
<div class="modal fade" id="addMedicineModal" tabindex="-1" role="dialog" aria-labelledby="myAddMedicineModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myAddMedicineModalLabel">Add Medicine</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="medicineForm" method="post" action="{{ route('medicineAdd') }}">
                    @csrf

                    <div class="form-group">
                        <label for="medicineName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="medicineName" id="medicineName" placeholder="Medicine Name">
                            <small style="color:red" id="medicineNameError"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  onclick="storeMedicineData(event)">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
@push('css')
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
@endpush
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
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
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
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
              Swal.fire(
                'Deleted!',
                'Your record has been deleted.',
                'success'
              );
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

        function showAppointmentModalBox(event)
        {
          $('#addAppointment').modal('show')
        }

        function delAppointment( id)
        {
          event.preventDefault();
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                  type: 'POST',
                  url: '{{ route('appointmentDelete') }}',
                  dataType: "JSON",
                  data: {id: id, _token:'{{ @csrf_token() }}'},
                  success(returnData) {
                      window.location.reload();
                  },
                  error(res) {

                  }
              });
              Swal.fire(
                'Deleted!',
                'Your record has been deleted.',
                'success'
              );
            }
          });
        }

        function storeAppointmentData()
        {
          resetAppointmentErrors();
          let form = $('#appointmentForm');
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

                  if (obj.errors.appointmentUser) {
                      $('#appointmentUserError').html(obj.errors.appointmentUser);

                  }
                  if (obj.errors.appointmentDatetime) {
                      $('#appointmentDatetimeError').html(obj.errors.appointmentDatetime);
                  }

                  if (obj.errors.appointmentDepartment) {
                      $('#appointmentDepartmentError').html(obj.errors.appointmentDepartment);
                  }

                  if (obj.errors.appointmentProcedure) {
                      $('#appointmentProcedureError').html(obj.errors.appointmentProcedure);
                  }
                }
            });
        }
        function resetAppointmentErrors() {
            $('#appointmentUserError').empty('');
            $('#appointmentDatetimeError').empty('');
            $('#appointmentDepartmentError').empty();
            $('#appointmentProcedureError').empty('');
        }

        function resetConsultantErrors() {
            $('#consultantNameError').empty('');
        }

        function delConsultant(id, event)
        {
          event.preventDefault();
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                  type: 'POST',
                  url: '{{ route('consultantDelete') }}',
                  dataType: "JSON",
                  data: {id: id, _token:'{{ @csrf_token() }}'},
                  success(returnData) {
                      window.location.reload();
                  },

                  error(res) {

                  }
              });
              Swal.fire(
                'Deleted!',
                'Your record has been deleted.',
                'success'
              );
            }
          });
        }

        function storeConsultantData()
        {
          resetConsultantErrors();
          let form = $('#consultantForm');
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

                  if (obj.errors.consultantName) {
                      $('#consultantNameError').html(obj.errors.consultantName);

                  }
                }
            });
        }

        function resetConsultantValues() {
            event.preventDefault();
            $('#consultantName').val('');
            $('#addConsultantModal').modal('show');
        }



        <!-- Medicine -->

            function resetMedicineErrors() {
                $('#medicineNameError').empty('');
            }

        function delMedicine(id, event)
        {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('medicineDelete') }}',
                        dataType: "JSON",
                        data: {id: id, _token:'{{ @csrf_token() }}'},
                        success(returnData) {
                            window.location.reload();
                        },

                        error(res) {

                        }
                    });
                    Swal.fire(
                        'Deleted!',
                        'Your record has been deleted.',
                        'success'
                    );
                }
            });
        }

        function storeMedicineData()
        {
            resetMedicineErrors();
            let form = $('#medicineForm');
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

                    if (obj.errors.medicineName) {
                        $('#medicineNameError').html(obj.errors.medicineName);

                    }
                }
            });
        }

        function resetMedicineValues() {
            event.preventDefault();
            $('#medicineName').val('');
            $('#addMedicineModal').modal('show');
        }

    </script>
@endpush

