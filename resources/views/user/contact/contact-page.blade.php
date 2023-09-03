@extends('user.master')
@section('title')
    Contact Us
@endsection

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button data-dismiss="alert" type="button" class="close">&times;</button>
            {{session()->get('message')}}
        </div>
    @endif

    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('assets')}}/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Contact</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Get in Touch</h1>

            <form class="contact-form mt-5" action="{{route('contact.store')}}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6 py-2 wow fadeInLeft">
                        <label for="fullName">Name</label>
                        <input type="text" name="name" id="fullName" value="{{old('name')}}" class="form-control" placeholder="Full name..">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-sm-6 py-2 wow fadeInRight">
                        <label for="emailAddress">Email</label>
                        <input type="text" value="{{old('email')}}" name="email" id="emailAddress" class="form-control" placeholder="Email address..">
                        <span class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="subject">Subject</label>
                        <input type="text" value="{{old('subject')}}" name="subject" id="subject" class="form-control" placeholder="Enter subject..">
                        <span class="text-danger">
                            @error('subject')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="message">Message</label>
                        <textarea id="message" value="{{old('message')}}" name="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
                        <span class="text-danger">
                            @error('message')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary wow zoomIn btn-home" style="background-color: #00D9A5 ;">Send Message</button>
            </form>
        </div>
    </div>


    <div class="maps-container wow fadeInUp mb-5">
        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                    var setting = {"query":"Green University Of Bangladesh, Begum Rokeya Avenue, Dhaka, Bangladesh","width":1200,"height":400,"satellite":false,"zoom":12,"placeId":"ChIJdU6phjXHVTcR-vflRqyD76k","cid":"0xa9ef83ac46e5f7fa","coords":[23.7869074,90.37754869999999],"lang":"en","queryString":"Green University Of Bangladesh, Begum Rokeya Avenue, Dhaka, Bangladesh","centerCoord":[23.7869074,90.37754869999999],"id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"979992"};
                    var d = document;
                    var s = d.createElement('script');
                    s.src = 'https://1map.com/js/script-for-user.js?embed_id=979992';
                    s.async = true;
                    s.onload = function (e) {
                        window.OneMap.initMap(setting)
                    };
                    var to = d.getElementsByTagName('script')[0];
                    to.parentNode.insertBefore(s, to);
                })();</script><a href="https://1map.com/map-embed">1 Map</a></div>
    </div>



    <div class="page-section banner-home bg-image" style="background-image: url({{asset('assets')}}/img/banner-pattern.svg);">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                    <div class="img-banner d-none d-lg-block">
                        <img src="{{asset('assets')}}/img/mobile_app.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                    <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                    <a href="#"><img src="{{asset('assets')}}/img/google_play.svg" alt=""></a>
                    <a href="#" class="ml-2"><img src="{{asset('assets')}}/img/app_store.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div> <!-- .banner-home -->
@endsection
