@extends('admin.master')
@section('title')
    Add Food
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button data-dismiss="alert" type="button" class="close">&times;</button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Food</h3></div>
                    <div class="card-body">
                        <form action="{{route('food.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="name" type="text" placeholder="Enter Food Name" value="{{old('name')}}" />
                                        <label for="doctorname">Food Name</label>
                                        <span class="text-danger">
                                         @error('name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="sku" type="text" placeholder="SKU"value="{{old('sku')}}" />
                                        <label for="phone">SKU</label>
                                        <span class="text-danger">
                                         @error('sku')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="price" type="number" placeholder="Price" value="{{old('price')}}" />
                                        <label for="price">Price </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="quantity" type="number" placeholder="Quantity" value="{{old('quantity')}}" />
                                        <label for="quantity">Quantity</label>
                                        <span class="text-danger">
                                         @error('time')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" value="{{old('description')}}" name="description" type="text" placeholder="Tagline" />
                                        <label for="description">Tagline</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <input type="file" value="{{old('image')}}" class="form-control" name="image">
                                <span class="text-danger">
                                         @error('image')
                                    {{$message}}
                                    @enderror
                                        </span>
                            </div>

                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Add Food">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
