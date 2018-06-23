@extends('layout.mainlayout')

@section('content')
    <br>
    <form action="/appointments" method="post">
    <div class="row">
        <div class="col-md-3">&nbsp;</div>
            <div class="col-md-6">
                @if (Session::has('message'))
                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif
                <h3>Make An Appointment</h3>
                <hr>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="description">Choose your appointment day</label>
                    <input type="date" class="form-control" min='<?php echo date('Y-m-d'); ?>' id="taskDescription" name="slot_date">
                </div>
                <div class="form-group">
                    <label for="description">Choose your appointment time</label>
                    <input type="time" class="form-control" id="taskDescription" name="slot_time">
                </div>
                <p> Share your contact info and we'll remind you </p>
                <hr>
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" id="taskTitle"  name="name">
                </div>
                <div class="form-group">
                    <label for="description">Email</label>
                    <input type="text" class="form-control" id="taskDescription" name="email">
                </div>
                <div class="form-group">
                    <label for="description">Phone</label>
                    <input type="text" class="form-control" id="taskDescription" name="phone">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
                <div class="col-md-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
        </div>
    </form>
@endsection