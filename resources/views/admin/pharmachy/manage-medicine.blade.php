@extends('admin.master')
@section('title')
    Manage Pharmachy
@endsection

@section('content')
    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Food

                <div class="d-flex justify-content-end" style="margin-top: -25px;"><a href="{{route('pharmachy.create')}}" class="btn btn-primary">Add Medicine</a></div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Code</th>
                        <th>Price </th>
                        <th>Quantity</th>
                        <th>description</th>
                        <th>date</th>
                        <th>Image</th>
                        <th>vendor</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($medicines as $food)
                        <tr>
                            <td>{{$food->name}}</td>
                            <td>{{$food->code}}</td>
                            <td>{{$food->price}}</td>
                            <td>{{$food->quantity}}</td>
                            <td>{{$food->description}}</td>
                            <td>{{$food->date}}</td>
                            <td>
                                <img src="{{asset($food->image)}}" alt="" class="img-fluid" width="50px" height="50px">
                            </td>
                            <td>{{$food->vendor}}</td>
                            <td class="d-flex">
                                <div class="btn-group">
                                    <a href="{{ route('pharmachy.edit', $food->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('pharmachy.destroy', $food->id) }}" method="post">
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
