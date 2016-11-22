@extends('main')

@section('title','Register')

@section('content')

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Register</h1>

            {!! Form::open(['url' => url('register'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

            @include('includes.errors')
            <dl class="row">
                <dt class="col-sm-4">{{  Form::label('username','Username:',['class'=>'form-spacing-top']) }}</dt>
                <dd class="col-sm-8">
                                    {{ Form::text('username', null, [
                                        'class'                         => 'form-control',
                                        'placeholder'                   => 'Username',
                                        'required',
                                        'id'                            => 'inputUsername',
                                        'data-parsley-required-message' => 'Username is required',
                                        'data-parsley-trigger'          => 'change focusout',
                                        'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                                        'data-parsley-minlength'        => '2',
                                        'data-parsley-maxlength'        => '32'
                                    ]) }}
                </dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-4">{{  Form::label('email','Email:',['class'=>'form-spacing-top']) }}</dt>
                <dd class="col-sm-8">
                                    {{ Form::email('email', null, [
                                        'class'                         => 'form-control',
                                        'placeholder'                   => 'Email address',
                                        'required',
                                        'id'                            => 'inputEmail',
                                        'data-parsley-required-message' => 'Email is required',
                                        'data-parsley-trigger'          => 'change focusout',
                                        'data-parsley-type'             => 'email'
                                    ]) }}
                </dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-4">{{  Form::label('first_name','First name:',['class'=>'form-spacing-top']) }}</dt>
                <dd class="col-sm-8">
                                    {{ Form::text('first_name', null, [
                                        'class'                         => 'form-control',
                                        'placeholder'                   => 'First name',
                                        'required',
                                        'id'                            => 'inputFirstName',
                                        'data-parsley-required-message' => 'First Name is required',
                                        'data-parsley-trigger'          => 'change focusout',
                                        'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                                        'data-parsley-minlength'        => '2',
                                        'data-parsley-maxlength'        => '32'
                                    ]) }}
                </dd>
            </dl>

            <dl class="row">
            <dt class="col-sm-4">{{  Form::label('last_name','Last name:',['class'=>'form-spacing-top']) }}</dt>
                <dd class="col-sm-8">
                                {{ Form::text('last_name', null, [
                                    'class'                         => 'form-control',
                                    'placeholder'                   => 'Last name',
                                    'required',
                                    'id'                            => 'inputLastName',
                                    'data-parsley-required-message' => 'Last Name is required',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                                    'data-parsley-minlength'        => '2',
                                    'data-parsley-maxlength'        => '32'
                                ]) }}
                </dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-4">{{  Form::label('password','Password:',['class'=>'form-spacing-top']) }}</dt>
                <dd class="col-sm-8">
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
                </dd>
            </dl>
            
            <dl class="row">
                <dt class="col-sm-4">{{  Form::label('password_confirmation','Confirm password:',['class'=>'form-spacing-top']) }}</dt>
                <dd class="col-sm-8">
                                    {{ Form::password('password_confirmation', [
                                        'class'                         => 'form-control',
                                        'placeholder'                   => 'Password confirmation',
                                        'required',
                                        'id'                            => 'inputPasswordConfirm',
                                        'data-parsley-required-message' => 'Password confirmation is required',
                                        'data-parsley-trigger'          => 'change focusout',
                                        'data-parsley-equalto'          => '#inputPassword',
                                        'data-parsley-equalto-message'  => 'Not same as Password',
                                    ]) }}
                </dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-4"></dd>
                <dd class="col-sm-8"><div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div></dd>
            </dl>

            <button class="btn btn-lg btn-primary btn-block register-btn form-spacing-top" type="submit">Register</button>

            {!! Form::close() !!}
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
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection