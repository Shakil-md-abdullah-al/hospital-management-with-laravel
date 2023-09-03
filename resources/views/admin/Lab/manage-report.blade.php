@extends('admin.master')
@section('title')
    Manage Lab Tests
@endsection

@section('content')
    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Food

                <div class="d-flex justify-content-end" style="margin-top: -25px;"><a href="{{route('lab.create')}}" class="btn btn-primary">Add Tests</a></div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Test Name</th>
                        <th>Code</th>
                        <th>Price </th>
                        <th>Description</th>
                        <th>Room No</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach($lab as $food)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{$food->name}}</td>
                            <td>{{$food->code}}</td>
                            <td>{{$food->price}}</td>
                            <td>{{$food->description}}</td>
                            <td>{{$food->room}}</td>
                            <td class="d-flex">
                                <div class="btn-group">
                                    <a href="{{ route('lab.edit', $food->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('lab.destroy', $food->id) }}" method="post">
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
