@extends('admin.master')
@section('title')
    Add Blog
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Blog</h3></div>
                    <div class="card-body">
                        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="col-12 mb-2">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
{{--                            <div class="col-12">--}}
{{--                                <label class="form-label">Slug</label>--}}
{{--                                <input type="text" name="slug" class="form-control">--}}
{{--                            </div>--}}
                            <div class="col-12">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Blog Type</label>
                                <select name="blog_type"  class="form-control">
                                    <option value="">Select Blog Type</option>
                                    <option value="latest">Latest</option>
                                    <option value="trending">Trending</option>
                                    <option value="popular">Popular</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>

                            <div class="col-12 d-flex mt-2">
                                <p class="ml-2 mr-2">Status</p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{$category->status == '1' ? 'checked':null}}>
                                    <label class="form-check-label" for="inlineRadio1" >Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{$category->status == '0' ? 'checked':null}}>
                                    <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                </div>
                            </div>


                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Add Blog">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
