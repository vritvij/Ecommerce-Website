@extends('master')

@section('title')
    New Product | Myst
@endsection

@section('body')
    <div id="sell" class="outer-container blue-grey lighten-5">
        <div class="container">
            <form class="row" method="post" action="/dashboard/sell" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col l4 s12">
                    <div class="row">
                        <div class="img-wrapper card-panel col s12">
                            <div class="img"></div>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image</span>
                                    <input id="product-image" type="file" name="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="row card-panel">
                                <div class="input-field col s12">
                                    <input id="title" type="text" name="name" class="validate" value="{{old('name')}}">
                                    <label for="title">Product Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <select name="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category}}">{{$category}}</option>
                                        @endforeach
                                    </select>
                                    <label>Product Category</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l8 s12 details">
                    <div class="row card-panel">
                        <div class="col s6">
                            <label for="from" class="">Available from</label>
                            <input id="from" type="date" name="from" class="datepicker" value="{{old('from')}}">
                        </div>
                        <div class="col s6">
                            <label for="to" class="">Available till</label>
                            <input id="to" type="date" name="to" class="datepicker" value="{{old('to')}}">
                        </div>
                        <div class="input-field col s6">
                            <input id="price" type="text" name="price" class="validate" value="{{old('price')}}">
                            <label for="price" class="">Price in &#x20b9;</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="quantity" type="text" name="quantity" class="validate" value="{{old('quantity')}}">
                            <label for="quantity" class="">Quantity</label>
                        </div>
                    </div>
                    <div class="row card-panel">
                        <div class="input-field col s12">
                            <textarea id="description" name="description" class="materialize-textarea limited" length="1000" >{{old('description')}}</textarea>
                            <label for="description">Product Description</label>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <button class="btn-large waves-effect waves-light right" type="submit">Submit</button>
                </div>
            </form>
            @if (count($errors) > 0)
                <ul class="error collection">
                    @foreach ($errors->all() as $error)
                        <li class="collection-item white-text red lighten-1">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection