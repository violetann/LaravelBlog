@extends('main')
@section('title','404 - Page not found')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3>404 - Page not found</h3>
                <p>
                    Sorry we are unable to find the page you were looking for <a href="{{ url('/') }}">click here</a> to go home.             
                </p>
            </center>
        </div>
    </div>
@endsection