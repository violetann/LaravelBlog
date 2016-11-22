@extends('main')
@section('title','403 - Permission Denied')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3>403 - Permission Denied</h3>
                <p>
                    Sorry you do not have permission to do that. Please <a href="{{ url('/') }}">click here</a> to go home.             
                </p>
            </center>
        </div>
    </div>
@endsection