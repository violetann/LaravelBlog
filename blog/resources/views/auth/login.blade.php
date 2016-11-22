@extends('main')

@section('title','Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
               <h1>Login</h1>
        {!! Form::open(['url' => url('login'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

        @include('includes.status')
        {{  Form::label('email','Email:',['class'=>'form-spacing-top']) }}
        {{ Form::email('email', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Email address',
            'required',
            'id'                            => 'inputEmail',
            'data-parsley-required-message' => 'Email is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-type'             => 'email'
        ]) }}

        {{  Form::label('password','Password:',['class'=>'form-spacing-top']) }}
        {{ Form::password('password', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Password',
            'required',
            'id'                            => 'inputPassword',
            'data-parsley-required-message' => 'Password is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-minlength'        => '6',
            'data-parsley-maxlength'        => '20'
        ]) }}

        <div style="height:15px;"></div>
        <div class="row">
            <div class="col-md-12">
                <fieldset class="form-group">
                    {!! Form::checkbox('remember', 1, null, ['id' => 'remember-me']) !!}
                    <label for="remember-me">Remember me</label>
                </fieldset>
            </div>
        </div>

        <button class="btn btn-lg btn-primary btn-block login-btn" type="submit">Sign in</button>
        <p><a href="{{ url('password/reset') }}">Forgot password?</a></p>

        {!! Form::close() !!}
                
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!!    Html::script('js/parsley.min.js')    !!}
    {!!    Html::script('js/select2.full.min.js')    !!}

    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script>

@endsection

