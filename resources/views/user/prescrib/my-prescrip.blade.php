@extends('user.master')
@include('user.appointment.table-component')
@section('title')
    My Prescription
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
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Doctor Name</th>
                    <th>Date and Time</th>
                    <th>Fee</th>
                    <th>Cancel order</th>
                    <th>Print</th>
                </tr>
                </thead>

                <tbody>
                @foreach($prescrib as $orders)
                    <tr>
                        <td>{{$orders->p_name}}</td>
                        <td>{{$orders->age}}</td>
                        <td>{{$orders->sex}}</td>
                        <td>{{$orders->d_name}}</td>
                        <td>{{$orders->current_datetime}}</td>
                        <td>{{$orders->fee}}</td>
                        <td><a  class="btn btn-danger" href="{{route('appoint_bill', $orders->id )}}">Details</a></td>
                        <td><a  class="btn btn-danger" href="{{route('print-presc',$orders->id)}}">Print</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
