@extends('admin.master')
@section('title')
    Edit User
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit User</h3></div>
                    <div class="card-body">
                        <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label class="form-label">Role</label>
                                <select name="usertype" class="form-control" required>
                                    <option value="">Select Role</option>
                                    @foreach($userRoles as $role)
                                        <option value="{{ $role }}" {{ $user->usertype == $role ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-floating my-3 mb-md-0">
                                <input class="form-control" name="name" type="text" placeholder="Enter Food Name" value="{{$user->name}}"/>
                                <label for="food">Name</label>
                                <span class="text-danger">
                                         @error('name')
                                    {{$message}}
                                    @enderror
                                        </span>
                            </div>

                            <div class="form-floating my-3 mb-md-0">
                                <input class="form-control" name="email" type="text" placeholder="Enter Food Name" value="{{$user->email}}"/>
                                <label for="food">Email</label>
                                <span class="text-danger">
                                         @error('email')
                                    {{$message}}
                                    @enderror
                                        </span>
                            </div>




                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="phone" type="number" placeholder="Phone" value="{{$user->phone}}" />
                                        <label for="price">Phone </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="address" type="text" placeholder="Quantity" value="{{$user->address}}" />
                                        <label for="quantity">Address</label>
                                        <span class="text-danger">
                                         @error('address')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Quantity" value="{{$user->password}}" />
                                        <label for="quantity">Password</label>
                                        <span class="text-danger">
                                         @error('password')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Update User">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
