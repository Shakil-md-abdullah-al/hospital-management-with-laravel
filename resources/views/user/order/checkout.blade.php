@extends('user.master')
@extends('user.appointment.table-component')
@section('title')
    Checklist
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Checklist</h3></div>
                    <div class="card-body">
                        <form action="{{route('order')}}" method="post">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Food Name</label>
                                <input type="text" name="food_name" value="{{$food->name}}" class="form-control" readonly>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Food Price</label>
                                <input type="text" value="{{$food->price}}" name="food_price" class="form-control" readonly>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Quantity</label>
                                <input type="text" name="quantity" class="form-control" id="quantityInput">
                                <span class="text-warning" id="quantityWarning"></span>
                                <span class="text-danger">
                                @error('quantity')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>


                            <div class="col-12">
                                <label class="form-label">Your Name</label>
                                <input type="text" name="person_name" value="{{old('person_name')}}" class="form-control">
                                <span class="text-danger">
                                    @error('person_name')
                                    {{$message}}
                                    @enderror
                                 </span>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
                                <span class="text-danger">
                                    @error('phone')
                                    {{$message}}
                                    @enderror
                                 </span>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Room No</label>
                                <input type="text" name="room" value="{{old('room')}}" class="form-control">
                                <span class="text-danger">
                                    @error('room')
                                    {{$message}}
                                    @enderror
                                 </span>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <label class="form-label" style="font-size: 25px;font-family: Roboto;font-weight: 500;">Total Price</label>
                                        <input type="text" name="total_price" id="totalPriceInput" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <script>
                                // Get references to the input fields
                                var quantityInput = document.getElementById("quantityInput");
                                var totalPriceInput = document.getElementById("totalPriceInput");

                                // Add an event listener to the quantity input
                                quantityInput.addEventListener("input", function() {
                                    var quantity = parseFloat(quantityInput.value);
                                    var foodPrice = {{$food->price}}; // Replace with actual food price
                                    var totalPrice = quantity * foodPrice;
                                    totalPriceInput.value = totalPrice.toFixed(2); // Format to two decimal places
                                });
                            </script>


                            <div class="mt-4 mb-0">
                                <input type="submit" style="width: 95%;background-color: #00D9A5" class="btn btn-success text-center ml-3 btn-home mb-3" value="Checkout">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--Check Quantity On page--}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const quantityInput = document.getElementById("quantityInput");
            const warningMessage = document.getElementById("quantityWarning");
            const availableQuantity = 100; // Replace with your actual available quantity

            quantityInput.addEventListener("input", function() {
                const enteredQuantity = parseInt(quantityInput.value, 10);

                if (isNaN(enteredQuantity)) {
                    warningMessage.textContent = ""; // Clear warning if not a number
                } else if (enteredQuantity > availableQuantity) {
                    warningMessage.textContent = "Warning: Quantity exceeds available quantity.";
                } else {
                    warningMessage.textContent = "";
                }
            });
        });
    </script>

@endsection
