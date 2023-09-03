@extends('user.master')
@section('title')
    All Foods
@endsection

@section('content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('assets')}}/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Foods</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Our Foods</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="text-center" style="color: #00D9A5; font-family: Roboto;font-size: 25px;font-weight: 500;margin-top: -20px;">ALL Foods</h2>
                    <div class="row">
                        @foreach($food as $foods)
                            <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                                <div class="card-doctor">
                                    <div class="header">
                                        <img src="{{$foods->image}}" alt="" width="300px">
                                        <div class="meta">
                                            <a href="#"><span class=""></span></a>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <h5><a href="{{route('checkout',['id'=>$foods->id])}}">{{$foods->name}}</a></h5>
                                        <span class="text-sm text-grey">Price: {{$foods->price}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
@endsection
