@extends('main')

@section('title','Welcome')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                    <h1>Hello to the garden</h1>
                    <p class="lead">Thank you for visiting</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="post">
            <h3>Header</h3>
                <p>test...</p>
                <a class="btn btn-primary"></a>
            </div>
            <hr>
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h3>Sidebar</h3>
        </div>
    </div>
@endsection
