@extends('admin.master')
@section('title')
    Manage Doctor
@endsection
@section('content')

    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Doctor

                <div class="d-flex justify-content-end" style="margin-top: -20px;"><a href="{{route('doctor.create')}}" class="btn btn-primary">Add Doctor</a></div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Phone</th>
                        <th>Speciality </th>
                        <th>Room No</th>
                        <th>Fees</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->speciality}}</td>
                            <td>{{$doctor->room}}</td>
                            <td>{{$doctor->fee}}/=</td>
                            <td>
                                <img src="{{asset($doctor->image)}}" alt="" class="img-fluid" width="50px" height="50px">
                            </td>
                            <td class="d-flex">
                                <div class="btn-group">
                                    <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn" value="Delete" style="background-color: deeppink;color: white;margin-left: 5px;">
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
