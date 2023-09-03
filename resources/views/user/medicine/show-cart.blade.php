@extends('user.master')
@include('user.include.table-component')
@section('title')
    Cart Page Medicine
@endsection

@section('content')
    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Cart Page


                <div class="d-flex justify-content-end" style="margin-top: -25px;">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" style="background-color: blue; margin-right: 10px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Proceed To Order
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('order-Med')}}">Cash on Delivery</a>
                            <a class="dropdown-item" href="">Pay with Card</a>
                        </div>
                    </div>
                    {{--                    <a href="" class="btn btn-primary">Shop More</a>--}}
                </div>


            </div>
            <div class="card-body">
                <table id="datatablesSimple" id="datatablesSimple" class="custom-table">
                    <thead>
                    <tr>
                        <th style="width: 20%;">Name</th>
                        <th style="width: 10%;">Price</th>
                        <th style="width: 10%;">Medicine Name</th>
                        <th style="width: 10%;">Quantity</th>
                        <th style="width: 10%;">Vendor</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $product)
                        <tr>
                            <td style="width: 20%;">{{$product->u_name}}</td>
                            <td style="width: 10%;">{{$product->price}}</td>
                            <td style="width: 10%;">{{$product->m_name}}</td>
                            <td style="width: 10%;">{{$product->quantity}}</td>
                            <td style="width: 10%;">{{$product->vendor}}</td>
                            <td class="d-flex">
                                <div class="btn-group">
                                    {{--                                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>--}}
                                    <form action="{{ route('pharmachy.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @if($product)
                                            <input type="submit" onclick="return confirm('Are you sure you want to remove this product from the cart?')" value="Remove From Cart" class="btn btn-danger" style="background-color: deeppink; color: white; margin-left: 5px;">
                                        @endif
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
