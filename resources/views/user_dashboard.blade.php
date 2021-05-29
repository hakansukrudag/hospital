@extends('../layouts.appadmin')

@section('content')
<div class="container">
    <div class="row text-center">
        <h1 class="textMargin">User Dashboard & Profile</h1>
    </div>
    <div class="row" style="margin-bottom: 100px;">
        <div class="col-md-12">

            <!-- Account Details-->
            <div style="margin-bottom: 20px;">
                <h2>Account Details</h2>
                <ul>
                    <li>Name: {{ $user->name }}</li>
                    <li>You are {{ $user->age }}</li>
                    <li>Img: {{ $user->image_path }}</li>
                    <li>Username: {{ $user->username }}</li>
                </ul>
                <a type="button" href="{{ route('showUserProfile') }}" class="btn btn-info">Edit Profile</a>
            </div>

            <!-- Contact Details-->
            @if (!empty($contactDetails))
                <div style="margin-bottom: 20px;">
                    <h2>Contact Details</h2>
                    <ul>
                        <li>Name: {{ $contactDetails->name }}</li>
                        <li>Address: {{ $contactDetails->address }} </li>
                        <li>Tel: {{ $contactDetails->telephone }}</li>
                        <li>Email: {{ $contactDetails->email }}</li>
                    </ul>
                    <a type="button" href="{{ route('showContactDetails') }}" class="btn btn-info">Edit Contact Details</a>
                </div>
            @endif

            <!-- Medicine Details-->
            @if (!empty($medicineDetails))
                <div style="margin-bottom: 20px;">
                    <h2>Medicine Details</h2>
                    <ul>
                        <li>Name: {{ $medicineDetails->name }}</li>
                        <li>Dose: {{ $medicineDetails->dose }}</li>
                    </ul>
                </div>
            @endif

            <!-- Appointment Details-->
            @if(!$appointment->isEmpty())
                <div style="margin-bottom: 20px;">
                    <h2>Appointment Details</h2>
                    <ul>
                        <li>Date: {{ $appointment->date_time }}</li>
                        <li>Department: </li>
                        <li>Procedure:</li>
                        <li>Doctor:</li>
                        <li>Map:</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@push('css')
@endpush
@push('js')

@endpush

