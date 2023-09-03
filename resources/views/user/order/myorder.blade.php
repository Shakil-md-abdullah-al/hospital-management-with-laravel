@extends('user.master')
@extends('user.appointment.table-component')

@section('title')
    My Order
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
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Cancel order</th>
                </tr>
                </thead>

                <tbody>
                @foreach($order as $orders)
                    <tr>
                        <td>{{$orders->food_name}}</td>
                        <td>{{$orders->quantity}}</td>
                        <td style="width: 28.537265% !important;">{{$orders->food_price}}</td>
                        <td>{{$orders->status}}</td>
                        <td><a onclick="return confirm('Are You Sure to  delete it?')" class="btn btn-danger" href="{{route('cancel_order', $orders->id )}}">Cancel</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
