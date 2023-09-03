@extends('user.master')

@section('title')
    Home
@endsection

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="page-hero bg-image overlay-dark" style="background-image: url({{asset('assets')}}/img/bg_image_1.jpg);">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">Let's make your life happier</span>
                <h1 class="display-4">Healthy Living</h1>
                <a href="#" class="btn btn-primary">Let's Consult</a>
            </div>
        </div>
    </div>


    <div class="bg-light">
        <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-secondary text-white">
                                <span class="mai-chatbubbles-outline"></span>
                            </div>
                            <p><span>Chat</span> with a doctors</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-primary text-white">
                                <span class="mai-shield-checkmark"></span>
                            </div>
                            <p><span>MediCare</span>-Health Protection</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="mai-basket"></span>
                            </div>
                            <p><span>Medi</span>-Care Pharmacy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .page-section -->

        <div class="page-section pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>Welcome to Your Health <br> Center</h1>
                        <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
                        <a href="{{route('about')}}" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1">
                            <img src="{{asset('assets')}}/img/bg-doctor.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

            <div class="owl-carousel wow fadeInUp justify-content-center" id="doctorSlideshow">
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
                            <h5><a href="{{route('doctor-details',['id'=>$doctors->id])}}">{{$doctors->name}}</a></h5>
                            <span class="text-sm text-grey" style="color: red;">{{$doctors->speciality}}</span>
                            <div><h3>Consultant Fee: {{$doctors->fee}}/=</h3></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="page-section bg-light">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Latest News</h1>
            <div class="row mt-5">
                @foreach($blog as $blogs)
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">Covid19</a>
                            </div>
                            <a href="blog-details.html" class="post-thumb">
                                <img src="{{$blogs->image}}" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="{{route('blog-details',['id'=>$blogs->id])}}">{{$blogs->title}}</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="{{$blogs->image}}" alt="">
                                    </div>
                                    <span>Roger Adams</span>
                                </div>
                                <span class="mai-time"></span> 1 week ago
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


                <div class="col-12 text-center mt-4 wow zoomIn">
                    <a href="{{route('allblog')}}" class="btn btn-primary">Read More</a>
                </div>

            </div>
        </div>
    </div> <!-- .page-section -->

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

            <form class="main-form" action="{{route('appointment')}}" method="post">
                @csrf
                <div class="row mt-5 ">
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="Full name" name="name"value="{{old('name')}}">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="email" class="form-control" placeholder="Email address.."value="{{old('email')}}">
                        <span class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <input type="date" class="form-control" name="date" id="appointmentDate">
                        <span class="text-danger">
                         @error('date')
                            {{ $message }}
                            @enderror
                        </span>
                        <span class="text-warning" id="dateWarning" style="display: none;">Please select a future date.</span>
                    </div>


                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="doctor" id="doctorDropdown" class="custom-select">
                            <option value="">-- Select Doctors --</option>
                            @foreach($doctor as $doctors)
                                <option value="{{ $doctors->id }}" doc_id="{{ $doctors->id }}" data-fee="{{ $doctors->fee }}">{{ $doctors->name }} -- Speciality -- {{ $doctors->speciality }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <input type="text" name="fee" id="feeInput" class="form-control" placeholder="Fee.." value="{{ old('fee') }}" readonly>
                        <input type="hidden" value="{{old('doctor_id')}}" name="doctor_id" id="doctorIdInput" readonly>
                        <span class="text-danger">
                        @error('fee')
                            {{ $message }}
                            @enderror
                     </span>
                    </div>


                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <input type="text" name="phone" class="form-control" placeholder="Number.." value="{{old('phone')}}">
                        <span class="text-danger">
                            @error('phone')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 wow zoomIn btn-home" style="background-color: #00D9A5 ;">Submit Request</button>
            </form>
        </div>
    </div> <!-- .page-section -->

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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const doctorDropdown = document.getElementById("doctorDropdown");
            const feeInput = document.getElementById("feeInput");
            const doctorIdInput = document.getElementById("doctorIdInput");

            doctorDropdown.addEventListener("change", function () {
                const selectedOption = doctorDropdown.options[doctorDropdown.selectedIndex];
                const selectedFee = selectedOption.getAttribute("data-fee");
                const selectedDoctorId = selectedOption.value;

                feeInput.value = selectedFee || ""; // Set the fee input value
                doctorIdInput.value = selectedDoctorId; // Set the selected doctor's ID
            });
        });
    </script>


@endsection
