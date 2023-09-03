@extends('admin.master')
@section('title')
    Show Lab Test Order
@endsection

@section('content')
    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Laberatory Test Order

{{--                <div class="d-flex justify-content-end" style="margin-top: -25px;"><a href="{{route('lab.create')}}" class="btn btn-primary">Add Tests</a></div>--}}
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Test Name</th>
                        <th>Price </th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Delivered</th>
                        <th>Print pdf</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($lab as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$order->test_name}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                @if($order->delivery_status=='Processing')
                                <a class="btn btn-primary" href="{{route('update-laborder',$order->id)}}" onclick="return confirm('Are You Sure yo Deliver It!!')">Delivered</a>
                                @else
                                <p>Delivered</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('print-order',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
