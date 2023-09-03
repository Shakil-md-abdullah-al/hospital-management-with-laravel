@extends('user.master')
@extends('user.contact.table-view')

@section('title')
    My Query
@endsection

@section('content')

    <div class="card mb-4" style="background: #e6ffff;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            My Query
        </div>
        <div class="card-body">
            <table id="datatablesSimple" border="2px" class="table-bordered">
                <thead>
                <tr>
                    <th>Subject</th>
                    <th style="width: 28.537265% !important;">Message</th>
                    <th>Status</th>
                    <th>Cancel Query</th>
                </tr>
                </thead>

                <tbody>
                @foreach($query as $querys)
                    <tr>
                        <td>{{$querys->subject}}</td>
                        <td style="width: 28.537265% !important;">{{$querys->message}}</td>
                        <td>{{$querys->status}}</td>
                        <td><a onclick="return confirm('Are You Sure to  delete it?')" class="btn btn-danger" href="{{route('cancel_query',$querys->id)}}">Cancel</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
