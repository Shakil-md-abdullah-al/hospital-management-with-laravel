@extends('user.master')
@include('user.appointment.table-component')
@section('title')
   Bill
@endsection
@include('admin.include.printap')


@section('content')
    <div class="card mb-4" style="background: #e6ffff;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Details
        </div>

    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{ $prescrib->current_datetime }}" readonly />
                    <label for="age">Date and Time</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{ $prescrib->appointmenthistory_id }}" readonly />
                    <label for="sex">Appointment No</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{ $prescrib->doctor_id }}" readonly />
                    <label for="time">Doctor Id</label>
                </div>
            </div>
        </div>


        <div class="row mb-1">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{ $prescrib->p_name }}" readonly />
                    <label for="age">Name</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{ $prescrib->sex }}" readonly />
                    <label for="sex">Sex</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{ $prescrib->age }}" readonly />
                    <label for="time">Age</label>
                </div>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-9">
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{ $prescrib->d_name }}" readonly />
                    <label for="age">Name</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{ $prescrib->fee }}" readonly />
                    <label for="sex">Fee</label>
                </div>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input class="form-control" style="height: 100px;width: 100% !important;" value="{{ $prescrib->medicines }}" readonly />
                    <label for="age">Medicine</label>
                </div>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input class="form-control" style="height: 100px;width: 100% !important;" value="{{ $prescrib->tests }}" readonly />
                    <label for="age">Test</label>
                </div>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input class="form-control" style="height: 100px;width: 100% !important;" value="{{ $prescrib->advice }}" readonly />
                    <label for="age">Advice</label>
                </div>
            </div>
        </div>


        <div class="row mb-2">
            <div class="col-md-12">
{{--                <a herf="{{route('print-presc',$prescrib->id)}}" class="btn btn-primary">Print</a>--}}
                <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
            </div>
        </div>

        <script>
            function printContent() {
                window.print();
            }
        </script>




    </div>
@endsection
