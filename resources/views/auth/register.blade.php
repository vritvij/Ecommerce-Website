@extends('master')

@section('title')
    Register | Myst
@endsection

@section('body')
    <div class="outer-container register">
        <div class="page-title white-text">Register</div>
        <div class="card white form-container container">
            <form id="register" method="POST" action="/auth/register" class="card-content">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input id="fname" type="text" class="validate" name="fname" value="{{ old('fname') }}">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="input-field col m6 s12">
                        <input id="lname" type="text" class="validate" name="lname" value="{{ old('lname') }}">
                        <label for="lname">Last Name</label>
                    </div>
                </div>
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
                        <input id="password_confirmation" type="password" name="password_confirmation" class="validate">
                        <label for="password_confirmation">Confirm Password</label>
                    </div>
                </div>
                <div class="row switch center-align">
                    <label>
                        Customer
                        <input type="checkbox" name="seller">
                        <span class="lever"></span>
                        Seller
                    </label>
                </div>
            </form>
            <div class="card-action center-align">
                <button form="register" class="btn-large btn-flat white teal-text" type="submit" name="action">Submit</button>
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