@extends('user.master')
@include('user.appointment.table-component')
@section('title')
    Order Lab
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
                        <th>Medicine Name</th>
                        <th>Price </th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Delivered</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($dataa as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$order->m_name}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                @if($order->delivery_status=='Processing')
                                    <a class="btn btn-primary" href="{{route('cancel-lab-order',$order->id)}}" onclick="return confirm('Are You Sure to Cancel Order!!')">Cancel</a>
                                @else
                                    <p>Delivered</p>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
