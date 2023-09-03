@extends('admin.master')
@section('title')
    Edit Doctor
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Doctor</h3></div>
                    <div class="card-body">
                        <form action="{{route('doctor.update',$doctor->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="name" type="text" placeholder="Enter Doctor Name" value="{{$doctor->name}}"/>
                                        <label for="name">Doctor Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="{{$doctor->phone}}" id="inputPassword" name="phone" type="text" placeholder="Phone No" />
                                        <label for="phone">Pnone No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name="speciality" id="inputSpeciality" class="form-select" style="width: 100%;">
                                            <option value="">Select Specialization</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->speciality }}">{{ $doctor->speciality }}</option>
                                            @endforeach
                                        </select>
                                        <label for="inputSpeciality">Specialization</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$doctor->room}}" id="inputPassword" name="room" type="text" placeholder="Room No" />
                                        <label for="room">Room No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$doctor->time}}" id="inputPassword" name="time" type="text" placeholder="Schedule Time" />
                                        <label for="time">Schedule Time</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$doctor->day}}" id="inputPassword" name="day" type="text" placeholder="Schedule Day" />
                                        <label for="day">Schedule Day</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <!-- Use the 'description' value from the $doctor model -->
                                        <textarea class="form-control" id="inputDescription" name="description" placeholder="Description">{{ $doctor->description }}</textarea>
                                        <label for="inputDescription">Description</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$doctor->fee}}" id="inputPassword" name="fee" type="number" placeholder="Fee" />
                                        <label for="fee">Consultant Fee</label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 text-center">
                                <img src="{{asset($doctor->image)}}" alt=""height="150px" width="150px">
                            </div>

                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Update Info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
