@extends('main')
@section('title','Tags')

@section('stylesheets')
    {!!    Html::style('css/parsley.css')    !!}
@endsection

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>Tags</h1>
        <table class='table'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            
            <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <th>{{ $tag->name }}</th>
                    <td>
                    <a href="{{route('tags.show',$tag->id)}}" class="btn btn-default pull-right">View Posts</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
    <div class="well">
    {!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
    <h2>New Tag</h2>
    {{Form::label('name','Name:')}}
    {{Form::text('name',null,['class'=>'form-control'])}}

    {{Form::submit('Create New Tag',['class'=>'btn btn-primary btn-block btn-h1-spacing'])}}    
    {{ Form::close() }}
    </div>
    </div>
</div>

@endsection


@section('scripts')
    {!!    Html::script('js/parsley.min.js')    !!}       
@endsection
