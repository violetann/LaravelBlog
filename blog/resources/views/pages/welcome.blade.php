@extends('main')

@section('title','Welcome')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                    <h1>Hello to the garden</h1>
                    <p class="lead">Thank you for visiting</p>                   
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-8">
        @foreach ($posts as $post)

       
            <div class="post">
            <h3>{{   substr($post->title,0,50)   }}{{strlen($post->title) > 50 ? "..." : ""   }}</h3>
                <p>{{   substr($post->body,0,300)   }}{{strlen($post->body) > 300 ? "..." : ""   }}</p>
                <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
            </div>
            <hr>
       

        @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h3>Sidebar</h3>
        </div>
    </div>
@endsection
