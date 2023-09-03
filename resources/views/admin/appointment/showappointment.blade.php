@extends('admin.master')
@section('title')
    Manage Appointment
@endsection

@section('content')
    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Appointment

{{--                <div class="d-flex justify-content-end" style="margin-top: -20px;"><a href="" class="btn btn-primary">Add Doctor</a></div>--}}
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Doctor Name </th>
                        <th>Messagee</th>
                        <th>fee</th>
                        <th>Status</th>
                        <th>Doctor ID</th>
{{--                        <th>User ID</th>--}}
                        <th>Action</th>
                        <th>Complete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $appoint)
                        <tr>
                            <td>{{$appoint->name}}</td>
                            <td>{{$appoint->email}}</td>
                            <td>{{$appoint->phone}}</td>
                            <td>{{$appoint->doctor}}</td>
                            <td>{{$appoint->message}}</td>
                            <td>{{$appoint->fee}}</td>
                            <td>{{$appoint->status}}</td>
                            <td>{{$appoint->doctor_id}}</td>
{{--                            <td>{{$appoint->user_id}}</td>--}}


                            <td class="d-flex">
                                <div class="btn-group">
                                    <a href="{{ route('approve', $appoint->id) }}" class="btn btn-primary">Approve</a>
                                    <a href="{{route('cancel',$appoint->id)}}" class="btn btn-accent" style="margin-left: 3px; background-color: #b1dfbb;">Cancel</a>
{{--                                    <a action="{{route('cancel',$appoint->id)}}" class="btn btn-accent">Cancel</a>--}}
                                    <form action="{{ route('deleteappointment', $appoint->id) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <input type="submit" class="btn" value="Delete" style="background-color: deeppink;color: white;margin-left: 5px;">
                                    </form>

                                </div>
                            </td>
                            <td>
                                <a href="{{route('history',$appoint->id)}}" class="btn btn-primary">Done</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
