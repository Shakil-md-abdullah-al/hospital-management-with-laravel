@extends('admin.master')
@section('title')
    Add Users
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(session()->has('message'))
                <div class="alert alert-{{ session()->has('success') ? 'success' : 'danger' }}">
                    <button data-dismiss="alert" type="button" class="close">&times;</button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add User</h3></div>
                    <div class="card-body">
                        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{--Usertype--}}
                            <div class="col-12 mb-3">
                                <label class="form-label">User Type</label>
                                <select name="usertype" id="usertype" class="form-control" required>
                                    <option value="">Select User Role</option>
                                    <option value="1">Super Admin</option>
                                    <option value="0">Regular User</option>
                                    <option value="2">Doctor</option>
                                    <option value="3">Food</option>
                                    <option value="4">Receptionist</option>
                                    <option value="5">Lab and Medicine</option>
                                </select>
                                <div class="alert alert-danger usertype-error" style="display: none;">User Type is required.</div>
                            </div>

                            <div class="col-12 mb-3" id="doctorFields" style="display: none;">
                                <label class="form-label">Doctor ID</label>
                                <input type="text" name="doctor_id" class="form-control">
                                <div class="alert alert-danger doctor-id-error" style="display: none;">Doctor ID is required.</div>
                            </div>

                            <!-- Other fields ... -->

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#usertype').change(function() {
                                        var selectedUserType = $(this).val();

                                        // Hide all additional fields by default
                                        $('#doctorFields').hide();
                                        // Hide other fields as needed
                                        // Add similar logic for other user types

                                        if (selectedUserType === '2') { // Doctor
                                            $('#doctorFields').show();
                                        } else {
                                            // Hide doctor_id field for other user types
                                            $('#doctorFields input[name="doctor_id"]').val('');
                                        }
                                    });
                                });
                            </script>





                            {{--End of usertype--}}
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="name" type="text" placeholder="Enter User's Name" required/>
                                        <label for="inputFirstName">Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="email" type="email" placeholder="Product Price" required/>
                                        <label for="username">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="phone" type="number" placeholder="Phone" required/>
                                        <label for="phone">Phone</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="address" type="text" placeholder="Address" required/>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Enter Password" required/>
                                        <label for="categoryName">Password</label>
                                    </div>
                                </div>
                            </div>



                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Create User">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
