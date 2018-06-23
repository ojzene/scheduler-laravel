@extends('layout.mainlayout')

@section('content')
    <br><br>
    <div class="row">
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-7">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Time</th>
                    <th scope="col">Day</th>
                    {{--<th scope="col">Created At</th>--}}
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <th scope="row">{{$appointment->id}}</th>
                        <td><a href="/appointments/{{$appointment->id}}">{{$appointment->name}}</a></td>
                        <td>{{$appointment->email}}</td>
                        <td>{{$appointment->phone}}</td>
                        <td>{{$appointment->slot_time}}</td>
                        <td>{{$appointment->slot_date}}</td>
{{--                        <td>{{$appointment->created_at->toFormattedDateString()}}</td>--}}
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ URL::to('appointments/' . $appointment->id . '/edit') }}">
                                    <button type="button" class="btn btn-info">Edit</button>
                                </a>&nbsp;
                                <form action="{{url('appointments', [$appointment->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
 