@extends('main')

@section('title','Register')

@section('content')

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h1>Register</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label form-spacing-top">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control form-spacing-top" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label form-spacing-top">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control form-spacing-top" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label form-spacing-top">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control form-spacing-top" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label form-spacing-top">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control form-spacing-top" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block form-spacing-top">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
