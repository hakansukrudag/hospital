@extends('../layouts.appadmin')

@section('content')
<div class="container">
    <div class="row text-center">
        <h1 class="textMargin">User Dashboard & Profile</h1>
    </div>
    <div class="row" style="margin-bottom: 100px;">
        <div class="col-md-2">
            <a type="button" href="{{ route('showUserProfile') }}" class="btn btn-secondary">Profile</a>
        </div>
        <div class="col-md-2">
            <a type="button" class="btn btn-secondary">Department</a>
        </div>
        <div class="col-md-2">
            <a type="button" class="btn btn-secondary">Procedure</a>
        </div>
        <div class="col-md-2">
            <a type="button" class="btn btn-secondary">Medicine</a>
        </div>
    </div>
</div>
@endsection
@push('css')
@endpush
@push('js')

@endpush

