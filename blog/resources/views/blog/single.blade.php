@extends('main')
@section('title', $post->title)

@section('content')
<div class="row">
   <div class="col-md-12">
        <h1>{{ $post->title }}</h1>
        <br/>
        @if (strlen($post->image)>0)
            <img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }} Featured image" class="blog-feature-image">
        @endif
        <p class="lead">{!! $post->body !!}</p>
        <br/> 

        <h6><small class="text-muted">Published: {{ date('g:i A nS F, Y',strtotime($post->created_at)) }} - Category: {{  $post->category->name  }}</small></h6>

        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3><span class="glyphicon glyphicon-comment"></span> Comments ({{ $post->comments()->count() }}) </h3>
        @foreach($post->comments as $comment)
            <div class="comment">
                <div class="author-info">
                    <img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?d=mm"}}" class="author-image">
                    <div class="author-name">
                        <h4>{{ $comment->name }}</h4>
                        <p class="author-time">{{ date('g:i A nS F, Y',strtotime($comment->created_at)) }}</p>
                    </div>
                </div>
                <div class="comment-content">{{ $comment->comment }}</div>
            </div>
        @endforeach

    </div>
</div>
@if (!Auth::guest())
    <div class="row">
        <div class="col-md-10 offset-md-1">
            {{  Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])  }}
            <div class="col-md-12 ">
                <div class="col-md-12">
                    {{   Form::label('comment','Comment:')   }}
                    {{   Form::textarea('comment',null,['class'=>'form-control'])   }}
                    {{   Form::submit('Post Comment',['class'=>'btn btn-block btn-success btn-h1-spacing'])  }}
                </div>
            </div>        
            {{  Form::close()  }}
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <center>
                <h5>Please login to join the discussion</h5>
                <h6><a class="nav-link" href="{{ url('/register') }}">Click here to register</a> or <a class="nav-link" href="{{ url('/login') }}">Click here to login</a></h6>
            </center
        </div>
    </div>

@endif

@endsection
