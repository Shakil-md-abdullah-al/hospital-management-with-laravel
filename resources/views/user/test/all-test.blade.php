@extends('user.master')
@section('title')
    All Tests
@endsection

@section('content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('assets')}}/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tests</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Laberatory Tests</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="text-center" style="color: #00D9A5; font-family: Roboto;font-size: 25px;font-weight: 500;margin-top: -20px;">Laberatory Tests</h2>
                    <div class="row">
                        @foreach($lab as $foods)
                            <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                                <div class="card-doctor">
                                    <div class="header" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 200px; position: relative;">
                                        <img src="{{asset('assets')}}/img/medi.jpg" alt="">
                                        <h2 style="font-size: 30px">{{ $foods->name }}</h2>

                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-md-6"><h5>{{ $foods->name }}</h5>
                                                <h5 style="font-size: 28px" class="text-sm text-grey">Price: {{ $foods->price }}</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="{{route('add-lab',$foods->id)}}" method="POST" id="add-to-cart-form">
                                                    @csrf
                                                    {{--                                        <a href="{{route('add-lab',$foods->id)}}" class="btn btn-success add-to-cart">Add to Cart</a>--}}
                                                    <input type="submit" value="Add to Cart">
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <style>
                                .card-doctor .header .add-to-cart {
                                    display: none;
                                    position: absolute;
                                    bottom: 10px;
                                    right: 10px;
                                }

                                .card-doctor .header:hover .add-to-cart {
                                    display: block;
                                }
                            </style>


                        @endforeach

                    </div>

                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
@endsection
