@extends('main')
@section('title','Edit Tag')

@section('stylesheets')
    {!!    Html::style('css/parsley.css')    !!}
@endsection

@section('content')
<div class="col-md-8">
	{{  Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => "PUT"])  }}
		{{  Form::label('name', "Title:")  }}
		{{  Form::text('name', null, ['class' => 'form-control'])  }}

		{{  Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;'])  }}
	{{  Form::close()  }}
</div>

<div class="col-md-4">
        <dl class="dl-horizontal">
            <dt>Posts using this tag:</dt>
            <dd>{{  $tag->posts()->count()  }}</dd>
        </dl>
        <hr>
        <center>
            <a href="{{route('tags.show',$tag->id)}}" class="btn btn-secondary">View Tag</a>
            <a href="{{route('tags.index')}}" class="btn btn-secondary">View  all Tags</a>
        </center>

</div>
@endsection

@section('scripts')
    {!!    Html::script('js/parsley.min.js')    !!}  
@endsection
