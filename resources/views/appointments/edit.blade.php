@extends('layout.mainlayout')

@section('content')
    <br><br>
    <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-6">
            <h1>Edit Appointment</h1>
            <hr>
            <form action="{{url('appointments', [$appointment->id])}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" value="{{$appointment->name}}" class="form-control" id="appointmentTitle"  name="name" >
                </div>
                <div class="form-group">
                    <label for="description">Email</label>
                    <input type="text" value="{{$appointment->email}}" class="form-control" id="appointmentDescription" name="email" >
                </div>
                <div class="form-group">
                    <label for="description">Phone</label>
                    <input type="text" value="{{$appointment->phone}}" class="form-control" id="appointmentDescription" name="phone" >
                </div>
                <div class="form-group">
                    <label for="description">Choose your appointment day</label>
                    <input type="text" value="{{$appointment->slot_date}}" class="form-control" id="appointmentDescription" name="phone" >
                </div>
                <div class="form-group">
                    <label for="description">Choose your appointment time</label>
                    <input type="text" value="{{$appointment->slot_time}}" class="form-control" id="appointmentDescription" name="phone" >
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection