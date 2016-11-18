@extends('main')
@section('title','all posts')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2">
            <a href="{{   route('posts.create')  }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create new post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
           <table class="table">
               <thead>
                   <th>#</th>
                   <th>Title</th>
                   <th>Body</th>
                   <th>Created At</th>
                   <th>Category</th>
                   <th></th>
               </thead>
               <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th>{{   $post->id   }}</th>
                            <td>{{   substr($post->title,0,50)   }}{{strlen($post->title) > 50 ? "..." : ""}}</td>
                            <td>{{   substr($post->body,0,50)   }}{{strlen($post->body) > 50 ? "..." : ""}}</td>
                            <td>{{   date('g:i a j M o',strtotime($post->created_at))   }}</td>
                            <td>{{   substr($post->category->name,0,50)   }}{{strlen($post->category->name) > 50 ? "..." : ""}}</td>
                            <td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default">View</a><a href="{{ route('posts.edit',$post->id) }}" class="btn btn-default">Edit</a></td>
                        </tr>
                    @endforeach
               </tbody>
           </table>
            <div class="text-center">
            {!!  $posts->links();   !!}
            </div>

        </div>
    </div>

@endsection