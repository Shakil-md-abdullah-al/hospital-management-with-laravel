@extends('user.master')
@section('title')
    Blog Details
@endsection

@section('content')

    <section class="blog-details">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h2 style="color: #00D9A5;font-weight: 500;font-size: 30px;" class="text-center mt-3 mb-5">Blog Details</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h3 class="text-center mb-4" style="color: blue;font-weight: 500; font-size: 40px">{{$blog->title}}</h3>
                        <img src="{{asset($blog->image)}}" alt="Blog Image" class="img-fluid mb-5">
                        <h3 class="text-center mb-4" style="color: #00D9A5;font-weight: 500; font-size: 35px">{{$blog->title}}</h3>
                        <p class="mb-4" style="color: #0b2e13;line-height: 36px;word-spacing: 2px; font-size: 22px;font-family: Roboto;">{{$blog->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 style="color: #00D9A5;font-weight: 500;font-size: 30px;" class="text-center mt-1 mb-2">Related Blog</h2>

                    <div class="row">


                        @foreach($relatedBlogs as $blogs)
                            <div class="col-md-4 col-lg-4 py-3 wow zoomIn">
                                <div class="card-doctor">
                                    <div class="header">
                                        <img src="{{asset($blogs->image)}}" alt="" height="300px">
                                        <div class="meta">
                                            <a href="#"><span class=""></span></a>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <h5><a href="{{route('blog-details',['id'=>$blogs->id])}}">{{$blogs->title}}</a></h5>
                                        <span class="text-sm text-grey">{{$blogs->date}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    <!-- New section for related blogs -->


@endsection
