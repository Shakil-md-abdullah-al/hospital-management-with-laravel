@extends('admin.master')
@section('title')
    Manage Food
@endsection

@section('content')
    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Food

                <div class="d-flex justify-content-end" style="margin-top: -25px;"><a href="{{route('food.create')}}" class="btn btn-primary">Add Food</a></div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Food Name</th>
                        <th>SKU</th>
                        <th>Price </th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($foods as $food)
                        <tr>
                            <td>{{$food->name}}</td>
                            <td>{{$food->sku}}</td>
                            <td>{{$food->price}}</td>
                            <td>{{$food->quantity}}</td>
                            <td>
                                <img src="{{asset($food->image)}}" alt="" class="img-fluid" width="50px" height="50px">
                            </td>
                            <td class="d-flex">
                                <div class="btn-group">
                                    <a href="{{ route('food.edit', $food->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('food.destroy', $food->id) }}" method="post">
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
