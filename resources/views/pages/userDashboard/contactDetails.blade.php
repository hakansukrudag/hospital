@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row text-center">
        <h1 class="textMargin">User Profile</h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    @if(count($errors) > 0 )
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <div class="row text-left">
       <a href="{{ route('userDashboard') }}">< Back</a>
    </div>
    <div class="row" style="margin-bottom: 100px;">
        <form class="form-horizontal" id="userForm" method="post" action="{{ route('storeContactDetails') }}">
                   @csrf
            <input type="hidden" name="id" value="{{ $contactDetails->id }}">
                   <div class="form-group">
                       <label for="name" class="col-sm-2 control-label">Name</label>
                       <div class="col-sm-10">
                           <input type="text" class="form-control" name="name" value="{{ $contactDetails->name }}" id="name" placeholder="Name">
                           <small style="color:red" id="nameError"></small>
                       </div>
                   </div>
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="{{ $contactDetails->address }}" id="address" placeholder="Address">
                        <small style="color:red" id="addressError"></small>
                    </div>
                </div>
            <div class="form-group">
                <label for="telephone" class="col-sm-2 control-label">Telephone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telephone" value="{{ $contactDetails->telephone }}" id="telephone" placeholder="Telephone">
                    <small style="color:red" id="telephoneError"></small>
                </div>
            </div>

                   <div class="form-group">
                       <label for="email" class="col-sm-2 control-label">Email</label>
                       <div class="col-sm-10">
                           <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $contactDetails->email }}">
                           <small style="color:red" id="emailError"></small>
                       </div>
                   </div>
            <button type="submit" class="btn btn-info">Save</button>
               </form>
    </div>
</div>
@endsection
@push('css')
@endpush
@push('js')

@endpush

