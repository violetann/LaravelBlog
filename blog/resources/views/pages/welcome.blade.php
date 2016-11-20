@extends('main')

@section('title','Welcome')


@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-front">
                @if (count($posts) > 0)
                    @if (count($posts[0]->image)>0)
                        <div class="col-md-3">
                        <img src="{{ asset('images/'.$posts[0]->image) }}" alt="{{ $posts[0]->title }} Featured image" class="front-feature-image">
                        </div>
                    @endif
                    <div class="col-md">
                        <h2>{{   substr($posts[0]->title,0,50)   }}{{strlen($posts[0]->title) > 50 ? "..." : ""   }}</h1>
                        <p class="lead">{!!   substr($posts[0]->body,0,1500)   !!}{{strlen($posts[0]->body) > 1500 ? "..." : ""   }}</p>
                        <p class="lead">
                            <a class="btn btn-primary" href="{{ url('blog/'.$posts[0]->slug) }}" role="button">Read More</a>
                        </p>
                    </div>
                @endif               
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-8">
        @foreach ($posts as $post)
            @if($posts[0]->id != $post->id)
                    <div class="post">
                    <div class="row">
                        @if (strlen($post->image)>0)
                            <div class="col-md-4">
                                <img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }} Featured image" class="front-feature-image">
                            </div>
                        @endif

                        <div class="col-md">
                            <h3>{{   substr($post->title,0,50)   }}{{strlen($post->title) > 50 ? "..." : ""   }}</h3>
                                <p>{{   substr(strip_tags($post->body),0,300)   }}{{strlen(strip_tags($post->body)) > 300 ? "..." : ""   }}</p>
                                <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>


                    </div>
                    <hr>
            @endif
        @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1">
            @foreach ($categories as $category)
                <h3>{{  $category->name  }}</h3>
                <hr>
                @foreach ($categoryposts[$category->id] as $categorypost)
                    <a href="{{ url('blog/'.$categorypost->slug) }}">{{   substr($categorypost->title,0,50)   }}{{strlen($categorypost->title) > 50 ? "..." : ""   }}</a>
                    <br>
                @endforeach
                <br>
             @endforeach
        </div>
    </div>
@endsection
