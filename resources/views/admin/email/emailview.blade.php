@extends('admin.master')
@section('title')
    Sent Mail
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
{{--                    @if(session()->has('message'))--}}
{{--                        <div class="alert alert-success">--}}
{{--                            <button data-dismiss="alert" type="button" class="close">&times;</button>--}}
{{--                            {{session()->get('message')}}--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Sent Email</h3></div>
                    <div class="card-body">
                        <form action="{{url('sendemail',$data->id)}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="gretting" type="text" placeholder="Enter Gretting" />
                                        <label for="doctorname">Greeting</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="body" type="text" placeholder="Mail Body" style="height: 200px;"/>
                                        <label for="phone">Body</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="actiontext" type="text" placeholder="Action Text" />
                                        <label for="room">Action Text</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="actionurl" type="text" placeholder="Action URL" />
                                        <label for="room">Action URL</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="endpart" type="text" placeholder="End PartL" />
                                        <label for="room">End Part</label>
                                    </div>
                                </div>
                            </div>



                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Sent Mail">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
