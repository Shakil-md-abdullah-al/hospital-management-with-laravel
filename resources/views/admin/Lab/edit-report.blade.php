@extends('admin.master')
@section('title')
    Edit Lab Test
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Lab Test</h3></div>
                    <div class="card-body">
                        <form action="{{route('lab.update',$lab->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="name" type="text" placeholder="Enter Food Name" value="{{$lab->name}}"/>
                                <label for="food">Food Name</label>
                                <span class="text-danger">
                                         @error('name')
                                    {{$message}}
                                    @enderror
                                        </span>
                            </div>

                            <div class="form-floating my-3 mb-md-0">
                                <input class="form-control" name="code" type="text" placeholder="Enter Food Name" value="{{$lab->code}}"/>
                                <label for="food">Food Name</label>
                                <span class="text-danger">
                                         @error('code')
                                    {{$message}}
                                    @enderror
                                        </span>
                            </div>


                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="price" type="number" placeholder="Price" value="{{$lab->price}}" />
                                        <label for="price">Price </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="room" type="number" placeholder="Quantity" value="{{$lab->room}}" />
                                        <label for="quantity">Room No</label>
                                        <span class="text-danger">
                                         @error('room')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="description" type="text" value="{{$lab->description}}" placeholder="Tagline" />
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Update Tests">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
