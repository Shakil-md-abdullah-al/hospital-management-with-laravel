@extends('user.master')
@section('title')
    Medicine Details
@endsection

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button data-dismiss="alert" type="button" class="close">&times;</button>
            {{session()->get('message')}}
        </div>
    @endif

    <section class="doctor-details">
        <div class="row mt-2">
            <div class="col-md-10 offset-md-1">
                <h4 class="text-center my-2" style="font-size: 30px;font-weight: 500;color: #00D9A5;">Medicine Details</h4>
                <div class="row justify-content-center"> <!-- Center-align the inner row content -->
                    <div class="col-md-4">
                        <img src="{{ asset($data->image) }}" alt="Medicine Image" height="300px" width="300px">
                    </div>
                    <div class="col-md-8 mt-4">
                        <h3>Name: {{ $data->name }}</h3>
                        <h4 style="color: #00D9A5">Vendor: {{ $data->vendor }}</h4>
                        <h5 class="my-3">Unit Price: {{ $data->price }}</h5>
                        <h5>Code: {{ $data->code }}</h5>
                        <div class="my-2"><h3>Quantity: {{ $data->quantity }}/=</h3></div>
                        <form action="{{ route('add-medicice', $data->id) }}" method="POST" id="add-to-cart-form">
                            @csrf
                            <input type="submit" class="btn btn-primary" style="background-color: cornflowerblue; margin-top: 10px;" value="Add to Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-12">
                        <p style="color: #0b2e13;line-height: 36px;word-spacing: 2px; font-size: 22px;font-family: Roboto;margin-bottom: 10px;">{{$data->description}}</p>
                    </div>
                </div>
            </div>
        </div>



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
    </section>
@endsection
