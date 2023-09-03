@extends('admin.master')
@section('title')
    Manage Blog
@endsection
@section('content')

    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Blogs

                <div class="d-flex justify-content-end" style="margin-top: -20px;"><a href="{{route('blog.create')}}" class="btn btn-primary">Add Blog</a></div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$blog->category_name}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->slug}}</td>
                                <td>
                                    <img src="{{asset($blog->image)}}" width="120px" height="150px" alt="" class="img-fluid">
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($blog->description, $limit = 60, $end = '...')}}</td>
                                <td class="d-flex">
                                    <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('blog.destroy',$blog->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger" style="background-color: red;color: white;margin-left: 2px;">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


        </div>
    </div>
@endsection
