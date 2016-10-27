@extends('master')

@section('title')
    Login | Myst
@endsection

@section('body')
    <div class="outer-container login">
        <div class="page-title white-text">Login</div>
        <div class="card white form-container container">
            <form id="login" method="POST" action="/auth/login" class="card-content">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="otp" type="password" name="otp" class="validate">
                        <label for="otp">Secret Key</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <input type="checkbox" name="remember" id="remember" />
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
            </form>
            <div class="card-action center-align">
                <button form="login" class="btn-large btn-flat white teal-text" type="submit" name="action">Submit</button>
            </div>
        </div>
        @if (count($errors) > 0)
            <ul class="error collection">
                @foreach ($errors->all() as $error)
                    <li class="collection-item white-text red lighten-1">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection