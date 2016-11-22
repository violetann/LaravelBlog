@if(defined('className::Session'))
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
        <strong>Success</strong>
            {{ Session::get('success') }}
        </div>
    @endif
@endif

@if(defined('className::Session'))
    @if (Session::has('errors'))
        <div class="alert alert-danger" role="alert">
        <strong>Success</strong>
            {{ Session::get('errors') }}
        </div>
    @endif
@endif

@if(defined('className::Session'))
    @if (Session::has('info'))
        <div class="alert alert-info" role="alert">
        <strong>Success</strong>
            {{ Session::get('info') }}
        </div>
    @endif
@endif


@if( ! empty($errors))
    @if (count($errors)>0)
        <div class="alert alert-danger" role="alert">
        <strong>Errors</strong>
            <lu>
                <li>{{ $errors }}</li>
            </lu>
        </div>
    @endif
@endif


@if( ! empty($info))
    @if (count($info)>0)
        <div class="alert alert-info" role="alert">
        <strong>info</strong>
            <lu>
                <li>{{ $info }}</li>
            </lu>
        </div>
    @endif
@endif