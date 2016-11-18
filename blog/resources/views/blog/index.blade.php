@extends('main')
@section('title', 'Blog')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Blog</h1>
    </div>
</div>

@foreach ($posts as $post)
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>{{$post->title}}</h2>
        <h5>Published {{ date('g:i a j M o',strtotime($post->created_at)) }}</h5>
        <p>{{   substr($post->body,0,500)   }}{{strlen($post->body) > 500 ? "..." : ""}}</p>
        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
    </div>
</div>
<hr>
@endforeach

<div class="row">
    <div class="col-md-12">
    <div class="text-center">
    {!! $posts->links() !!}
    </div>
    </div>
</div>

@endsection
