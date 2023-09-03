@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Category</h3></div>
                    <div class="d-flex justify-content-end" style="margin-top: -60px;"><a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a></div>
                    <div class="card-body">
                        <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="col-12">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                            </div>

                            <div class="col-12">
                                <label class="from-label">Status</label>&nbsp;&nbsp;
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{$category->status == '1' ? 'checked':null}}>
                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{$category->status == '0' ? 'checked':null}}>
                                    <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Update Category">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
