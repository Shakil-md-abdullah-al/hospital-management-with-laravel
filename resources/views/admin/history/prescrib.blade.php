@extends('admin.master')
@section('title')
    Prescription
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button data-dismiss="alert" type="button" class="close">&times;</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Prescriptions</h3></div>
                    <div class="card-body">
                        <form action="{{route('doctor_prescrib',$prescrib->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="p_name" type="text" placeholder="Enter Patient Name" value="{{$prescrib->username}}" readonly />
                                        <label for="p_name">Patient Name</label>
                                        <span class="text-danger">
                                            @error('p_name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="age" type="number" placeholder="Enter Patient Age" value="{{old('age')}}" required min="1"/>
                                        <label for="p_name">Age</label>
                                        <span class="text-danger">
                                            @error('age')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-control" name="sex">
                                            <option value="Male" {{ old('sex') === 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('sex') === 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <label for="sex">Sex</label>
                                        <span class="text-danger">
                                        @error('sex')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="d_phone" type="number" placeholder="Enter Patient Phone" value="{{$prescrib->phone}}" readonly/>
                                        <label for="phone">Phone</label>
                                        <span class="text-danger">
                                            @error('p_phone')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="email" type="email" placeholder="Enter Patient email" value="{{$prescrib->email}}" readonly />
                                        <label for="email">Patient email</label>
                                        <span class="text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="d_name" type="text" placeholder="Doctor Name" value="{{$prescrib->doctor_name}}" readonly />
                                        <label for="p_name">Doctor Name</label>
                                        <span class="text-danger">
                                            @error('p_name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="medicines" style="height: 200px" placeholder="Enter prescribed medicines" rows="4">{{ old('medicines') }}</textarea>
                                        <label for="medicines">Prescribed Medicines</label>
                                        <span class="text-danger">
                                        @error('medicines')
                                            {{ $message }}
                                            @enderror
                                         </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="tests" style="height: 100px" placeholder="Enter prescribed tests" rows="4">{{ old('tests') }}</textarea>
                                        <label for="medicines">Prescribed Tests</label>
                                        <span class="text-danger">
                                        @error('tests')
                                            {{ $message }}
                                            @enderror
                                         </span>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="advice" style="height: 100px" placeholder="Enter advice" rows="4">{{ old('advice') }}</textarea>
                                        <label for="advice">Advice</label>
                                        <span class="text-danger">
                                        @error('advice')
                                            {{ $message }}
                                            @enderror
                                         </span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="appointment_id" value="{{ $prescrib->appointment_id }}">
                            <input type="hidden" name="doctor_id" value="{{ $prescrib->doctor_id }}">
                            <input type="hidden" name="appointmenthistory_id" value="{{ $prescrib->id }}">
                            <input type="hidden" name="user_id" value="{{ $prescrib->user_id }}">
                            <input type="hidden" name="current_datetime" value="{{ now() }}">
                            <input type="hidden" name="fee" value="{{ $prescrib->fee }}">
                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Add Prescription">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
