@extends('main')
@section('title','Create New Post')

@section('stylesheets')
    {!!    Html::style('css/parsley.css')    !!}
    {!!    Html::style('css/select2.min.css')    !!}
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create new post</h1>
        <hr>
        {!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'']) !!}
            {{ Form::label('title', 'Title :') }}
            {{ Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>"255")) }}

            {{ Form::label('slug', 'URL Slug:') }}
            {{ Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>"5",'maxlength'=>"255")) }}

            {{ Form::label('category_id', 'Category:') }}
            {{ Form::select('category_id',$categories,null, ["class" => 'form-control input-lg']) }}      

            {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
            {{ Form::select('tags[]',$tags,null, ["class" => 'form-control input-lg js-example-basic-multiple',"multiple"=>"multiple"]) }} 

            {{ Form::label('body', 'Post Body :', ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body',null,array('class'=>'form-control','required'=>'')) }}

            {{ Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px' )) }}
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('scripts')
    {!!    Html::script('js/parsley.min.js')    !!}
    {!!    Html::script('js/select2.full.min.js')    !!}

    <script type="text/javascript">
    $(".js-example-basic-multiple").select2();
    </script>  

@endsection
