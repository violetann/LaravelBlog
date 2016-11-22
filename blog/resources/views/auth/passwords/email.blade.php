@extends('main')

@section('title','Reset Password')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                {!! Form::open(['url' => url('/password/email'), 'class' => 'form-signin' ] ) !!}

                @include('includes.status')

                <h2 class="form-signin-heading">Password Reset</h2>
                <label for="inputEmail" class="sr-only">Email address</label>
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus', 'id' => 'inputEmail' ]) !!}

                <br />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Send me a reset link</button>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
