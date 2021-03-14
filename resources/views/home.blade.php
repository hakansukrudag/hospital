@extends('layouts.app')

@section('content')
<div class="container dashboardPanel">
    <div class="row text-center">
        <h1 class="textMargin">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
              <div class="panel-heading">User</div>
              <div class="panel-body">Panel Content</div>
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
@endsection
