@extends('main')
@section('title', 'Delete Comment')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <a href="{{ route('posts.show',$comment->post->id) }}" class='btn btn-default btn-h1-spacing' style="float:right">Back</a>
        <h1>Delete this Comment?</h1>
        <strong>Name</strong> {{  $comment->name  }}<br>
        <strong>Email</strong> {{  $comment->email  }}<br>
        <strong>Comment</strong> {{  $comment->comment  }}<br>
        {{  Form::model($comment,['route'=>['comments.destroy',$comment->id],'method'=>'DELETE'])    }}
        
        {{  Form::submit('YES DELETE THIS COMMENT',['class'=>'btn btn-block btn-danger btn-h1-spacing'])    }}
        {{  Form::close() }}
    </div>
</div>
@endsection
