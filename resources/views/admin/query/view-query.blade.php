@extends('admin.master')
@section('title')
    User's Query
@endsection

@section('content')
    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage User's Query

                {{--                <div class="d-flex justify-content-end" style="margin-top: -20px;"><a href="" class="btn btn-primary">Add Doctor</a></div>--}}
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Subject </th>
                        <th>Messagee</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $query)
                        <tr>
                            <td>{{$query->name}}</td>
                            <td>{{$query->email}}</td>
                            <td>{{$query->subject}}</td>
                            <td>{{$query->message}}</td>
                            <td>{{$query->status}}</td>

                            <td class="d-flex">
                                <div class="btn-group">
                                    <a href="{{ route('approvequery', $query->id) }}" class="btn btn-primary">Action Taken</a>
                                    <form action="{{route('contact.destroy',$query->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger" style="background-color: deeppink;color: white;margin-left: 5px;">
                                    </form>
{{--                                    <form action="{{ route('contact.destroy', $query->id) }}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <input type="submit" class="btn" value="Delete" style="background-color: deeppink;color: white;margin-left: 5px;">--}}
{{--                                    </form>--}}
{{--                                    <a href="{{ route('deletequery', $query->id) }}" class="btn btn-danger">Delete</a>--}}

                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
