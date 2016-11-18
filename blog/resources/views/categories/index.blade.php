@extends('main')
@section('title', 'Categories')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>Categories</h1>
        <table class='table'>
            <thead>
                <tr>
                    <th>icon</th>
                    <th>#</th>
                    <th>Name</th>
                    <th>description</th>
                </tr>
            </thead>
            
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->icon }}</td>
                    <td>{{ $category->id }}</td>
                    <th>{{ $category->name }}</th>
                    <td>{{ $category->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
    <div class="well">
    {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
    <h2>New Category</h2>
    {{Form::label('name','Name:')}}
    {{Form::text('name',null,['class'=>'form-control'])}}

    {{Form::label('description','Description:')}}
    {{Form::text('description',null,['class'=>'form-control'])}}

    {{Form::label('icon','Icon:')}}
    {{Form::text('icon',null,['class'=>'form-control'])}}

    {{Form::submit('Create New Category',['class'=>'btn btn-primary btn-block btn-h1-spacing'])}}    
    {{ Form::close() }}
    </div>
    </div>
</div>


@endsection