@extends('admin.master')
@section('title')
    Edit Food
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Food</h3></div>
                    <div class="card-body">
                        <form action="{{route('food.update',$food->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            <button data-dismiss="alert" type="button" class="close">&times;</button>
                                            {{session()->get('message')}}
                                        </div>
                                    @endif
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="name" type="text" placeholder="Enter Food Name" value="{{$food->name}}"/>
                                        <label for="food">Food Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="{{$food->sku}}" id="inputPassword" name="sku" type="text" placeholder="sku" />
                                        <label for="sku">SKU</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$food->price}}" id="inputPassword" name="price" type="number" placeholder="Price" />
                                        <label for="price">Price</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$food->quantity}}" id="inputPassword" name="quantity" type="number" placeholder="Quantity" />
                                        <label for="quantity">Quantity</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$food->description}}" id="inputPassword" name="description" type="text" placeholder="Tagline" />
                                        <label for="description">Tagline</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <img src="{{asset($food->image)}}" alt=""height="150px" width="150px">
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
