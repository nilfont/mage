@extends('mage::layout.auth')
@section('web-title', __('mage.auth.login.web-title'))
@section('page-title', __('mage.auth.login.page-title'))
@section('page-description', __('mage.auth.login.page-description'))
@section('page-subdescription', __('mage.auth.login.page-subdescription'))

@section('content')
    <div class=" auth-content text-center">
        <div class="mb-4">
            <i class="fa fa-unlock icon-login"></i>
        </div>
        <h3 class="mb-5">@lang('mage.auth.login.login')</h3>

        @if(session()->has('status') && session()->get('status') == 'send')
        <div class="alert alert-success">
            @lang('mage.auth.login.send')
        </div>
        @endif

        @if(session()->has('status') && session()->get('status') == 'unauthorized')
        <div class="alert alert-error">
            @lang('mage.auth.login.unauthorized')
        </div>
        @endif

        <form action="{{route('mage.auth.login')}}" method="POST" class="social-auth-links text-center mb-4">
            {{ csrf_field() }}
            @method('POST')
            @if($errors->count())
                <div class="input-group mb-3">
                    <p class="text-danger" style="margin:0 auto;"><span>@lang('mage.auth.login.invalid-credentials')</span></p>
                </div>
            @endif
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @if($errors->count()) is-invalid @endif" placeholder="@lang('mage.auth.login.email')">
                <div class="input-group-append">
                    <span class="fa fa-envelope input-group-text"></span>
                </div>
            </div>
            <div class="input-group mb-4">
                <input type="password" name="password" class="form-control @if($errors->count()) is-invalid @endif" placeholder="@lang('mage.auth.login.password')">
                <div class="input-group-append">
                    <span class="fas fa-key input-group-text"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">@lang('mage.auth.login.signin')</button>
                </div>
            </div>
        </form>
        <p class="mb-2 text-muted"><a href="{{ route('mage.auth.password.request') }}">@lang('mage.auth.login.forgot-password')</a></p>
        @if(config('mage.enable_register_route'))
        <hr />
        <p class="mb-2 text-muted"><a href="{{ route('mage.auth.register.index') }}">@lang('mage.auth.login.register')</a></p>
        @endif
    </div>
@endsection
