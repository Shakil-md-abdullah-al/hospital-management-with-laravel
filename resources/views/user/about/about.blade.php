@extends('user.master')
@section('title')
    About Us
@endsection

@section('content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('assets')}}/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">About Us</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 py-3 wow zoomIn">
                    <div class="card-service">
                        <div class="circle-shape bg-secondary text-white">
                            <span class="mai-chatbubbles-outline"></span>
                        </div>
                        <p><span>Chat</span> with a doctors</p>
                    </div>
                </div>
                <div class="col-md-4 py-3 wow zoomIn">
                    <div class="card-service">
                        <div class="circle-shape bg-primary text-white">
                            <span class="mai-shield-checkmark"></span>
                        </div>
                        <p><span>MediCare</span>-Health Protection</p>
                    </div>
                </div>
                <div class="col-md-4 py-3 wow zoomIn">
                    <div class="card-service">
                        <div class="circle-shape bg-accent text-white">
                            <span class="mai-basket"></span>
                        </div>
                        <p><span>MediCare</span>-Health Pharmacy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp">
                    <h1 class="text-center mb-3">Welcome to Your Health Center</h1>
                    <div class="text-lg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt neque sit, explicabo vero nulla animi nemo quae cumque, eaque pariatur eum ut maxime! Tenetur aperiam maxime iure explicabo aut consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt neque sit, explicabo vero nulla animi nemo quae cumque, eaque pariatur eum ut maxime! Tenetur aperiam maxime iure explicabo aut consequuntur.</p>
                        <p>Expedita iusto sunt beatae esse id nihil voluptates magni, excepturi distinctio impedit illo, incidunt iure facilis atque, inventore reprehenderit quidem aliquid recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quod ad sequi atque accusamus deleniti placeat dignissimos illum nulla voluptatibus vel optio, molestiae dolore velit iste maxime, nobis odio molestias!</p>
                    </div>
                </div>

                <div class="col-lg-10 mt-5">
                    <h1 class="text-center mb-5 wow fadeInUp" style="font-size: 30px;font-weight: 500;">Our Doctors</h1>
                    <div class="row justify-content-center">
                        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
                            @foreach($doctor as $doctors)
                                <div class="item">
                                    <div class="card-doctor">
                                        <div class="header">
                                            <img  src="{{$doctors->image}}" alt="" style="height: 250px !important;">
                                            <div class="meta">
                                                <a href="#"><span class="mai-call"></span></a>
                                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <p class="text-xl mb-0">{{$doctors->name}}</p>
                                            <span class="text-sm text-grey">{{$doctors->speciality}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
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
