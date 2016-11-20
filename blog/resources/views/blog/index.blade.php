@extends('main')
@section('title', 'Blog')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Latest Blog Posts</h1>
            <hr><br>
        </div>
    </div>

    <div class="row">   
        <div class="col-md-12">
        @foreach ($posts as $post)
                    <div class="post">
                    <div class="row">
                        @if (strlen($post->image)>0)
                            <div class="col-md-3">
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
        @endforeach
        </div>
    </div>
            <div class="text-center">
            {!!  $posts->links("ui.pagination");   !!}
            </div>

@endsection