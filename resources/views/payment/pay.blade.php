@extends('master')

@section('title')
    Payment Gateway
@endsection

@section('body')
    <div class="container">
        <div class="row">
            @foreach($info as $key=>$value)
                {{$key}} {{$value}} <br/>
            @endforeach
        </div>
    </div>
@endsection