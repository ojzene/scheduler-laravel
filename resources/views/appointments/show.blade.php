@extends('layout.mainlayout')

@section('content')
    <br><br>
    <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-6">
            <h2>Showing Appointment for {{ $appointment->name }}</h2>

            <div class="jumbotron text-center">
                <p>
                    <strong>Email:</strong> {{ $appointment->email }}<br>
                    <strong>Phone Number:</strong> {{ $appointment->phone }} <br>
                    <strong>Slot Time:</strong> {{ $appointment->slot_time }} <br>
                    <strong>Slot Date:</strong> {{ $appointment->slot_date }} <br>
                </p>
            </div>
        </div>
    </div>
@endsection