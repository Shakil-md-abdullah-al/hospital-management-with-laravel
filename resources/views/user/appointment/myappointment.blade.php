@extends('user.master')
@extends('user.appointment.table-component')

@section('title')
    My Appointment
@endsection

@section('content')

    <div class="card mb-4" style="background: #e6ffff;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            My Appointments
        </div>
        <div class="card-body">
            <table id="datatablesSimple" border="2px" class="table-bordered">
                <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th style="width: 28.537265% !important;">Message</th>
                    <th>Consultant Fee</th>
                    <th>Status</th>
                    <th>Cancel Appointment</th>
                </tr>
                </thead>

                <tbody>
                @foreach($appoint as $appoints)
                <tr>
                    <td>{{$appoints->doctor}}</td>
                    <td>{{$appoints->date}}</td>
                    <td style="width: 28.537265% !important;">{{$appoints->message}}</td>
                    <td>{{$appoints->fee}}</td>
                    <td>{{$appoints->status}}</td>
                    <td><a onclick="return confirm('Are You Sure to  delete it?')" class="btn btn-danger" href="{{route('cancel_appointment',$appoints->id)}}">Cancel</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
