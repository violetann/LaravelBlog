@extends('main')
@section('title','view post')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
        <hr>
        <div class="tags">
            @foreach ($post->tags as $tag)
                <span class="label label-default">{{  $tag->name  }}</span>
            @endforeach
        </div>

    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <label>Created at:</label>
                <p>{{   date('g:i a j M o',strtotime($post->created_at))   }}</p>
            </dl>
            <dl class="dl-horizontal">
                <label>Last updated:</label>
                <p>{{   date('g:i a j M o',strtotime($post->updated_at))   }}</p>
            </dl>
            <dl class="dl-horizontal">
                <label>URL:</label>
                <p><a href="{{ url('/blog/'.$post->slug) }}">{{ url('/blog/'.$post->slug) }}</a></p>
            </dl>
            <dl class="dl-horizontal">
                <label>Category:</label>
                <p>{{$post->category->name}}</p>
            </dl>

            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::LinkRoute('posts.edit','Edit', array($post->id),array('class'=>"btn btn-primary btn-block")) !!}
                </div>
                <div class="col-sm-6">
                     {!!  Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])  !!}
                     {!!  Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])  !!}
                     {!!  Form::close()  !!}
                </div>
                <div class="col-sm-12">
                     {!! Html::LinkRoute('posts.index','See All Posts', array(),array('class'=>"btn btn-default btn-block btn-h1-spacing")) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
