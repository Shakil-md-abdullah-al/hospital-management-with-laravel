@extends('admin.master')
@section('title')
    Manage Order
@endsection

@section('content')
    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Order

{{--                <div class="d-flex justify-content-end" style="margin-top: -25px;"><a href="{{route('food.create')}}" class="btn btn-primary">Add Food</a></div>--}}
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Food Name</th>
                        <th>Person Name</th>
                        <th>Phone</th>
                        <th>Price </th>
                        <th>Quantity</th>
                        <th>Room No.</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $food)
                        <tr>
                            <td>{{$food->food_name}}</td>
                            <td>{{$food->person_name}}</td>
                            <td>{{$food->phone}}</td>
                            <td>{{$food->food_price}}</td>
                            <td>{{$food->quantity}}</td>
                            <td>{{$food->room}}</td>
                            <td>{{$food->status}}</td>
                            <td class="d-flex">
                                <div class="btn-group">
                                    <a href="{{ route('approve-order', $food->id) }}" class="btn btn-primary">Approve</a>
                                    <a href="{{ route('cancel-order', $food->id) }}" class="btn btn-danger" style="margin-left: 4px">Cancel</a>
{{--                                    <a href="{{ route('food.edit', $food->id) }}" class="btn btn-primary">Edit</a>--}}
                                    <form action="{{ route('order-delete', $food->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: deeppink; color: white; margin-left: 5px;">
                                            Delete
                                        </button>
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
