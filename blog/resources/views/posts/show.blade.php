@extends('main')
@section('title','view post')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $post->title }}</h1>
        <br/>
        @if (strlen($post->image)>0)
            <img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }} Featured image" class="blog-feature-image">
        @endif

        <p class="lead">{!! $post->body !!}</p>
        <hr>
       
        <div class="tags">
            <h5>Tags:
            @foreach ($post->tags as $tag)
                <span class="tag tag-default">{{  $tag->name  }}</span>
            @endforeach
            </h5>
        </div>
        <div class="backend-comments">
            <h3>Comments <small>({{ $post->comments()->count() }})</small></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>Comment</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post->comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-xs btn-success">Edit</a>
                            <a href="{{ route('comments.delete',$comment->id) }}" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    <tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="col-md-4">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{   date('g:i a j M o',strtotime($post->created_at))   }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last updated:</dt>
                    <dd>{{   date('g:i a j M o',strtotime($post->updated_at))   }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>URL:</dt>
                    <dd><a href="{{ url('/blog/'.$post->slug) }}">{{ url('/blog/'.$post->slug) }}</a></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <dd>{{$post->category->name}}</dd>
                </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::LinkRoute('posts.edit','Edit', array($post->id),array('class'=>"btn btn-success btn-block")) !!}
                </div>
                <div class="col-sm-6">
                     {!!  Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])  !!}
                     {!!  Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])  !!}
                     {!!  Form::close()  !!}
                </div>
                <div class="col-sm-12">
                     {!! Html::LinkRoute('posts.index','See All Posts', array(),array('class'=>"btn btn-primary btn-block btn-h1-spacing")) !!}
                </div>
            </div>
        
    </div>
</div>
@endsection
