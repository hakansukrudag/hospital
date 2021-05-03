@extends('../layouts.appadmin')

@section('content')
<div class="container">
    <div class="row text-center">
        <h1 class="textMargin">User Dashboard</h1>
    </div>
    <div class="row" style="margin-bottom: 100px;">
        <div class="col-md-2">
            <button type="button" class="btn btn-secondary">Profile</button>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-secondary">Department</button>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-secondary">Procedure</button>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-secondary">Medicine</button>
        </div>
    </div>
</div>
@endsection
@push('css')
@endpush
@push('js')

@endpush

