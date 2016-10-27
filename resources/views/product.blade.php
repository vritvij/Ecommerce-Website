@extends('master')

@section('title')
    {{ $product->name }} | Myst
@endsection

@section('body')
    <div id="product" class="outer-container">
        <div class="container">
            <div class="row">
                <div class="image col s12 l4">
                    <div class="z-depth-1" style="background-image: url({!! $product->image !!})"></div>
                </div>
                <div class="name col s12 l8 blue-grey-text">
                    {{$product->name}}
                </div>
                <div class="col s12 l8 no-pad-top no-pad-bottom">
                    <div class="divider"></div>
                </div>
                <div class="from col s12 m6 l4 blue-grey-text">
                    Published on : {{date_format($product->from, "j F, Y")}}
                </div>
                <div class="to col s12 m6 l4 blue-grey-text">
                    Ends on : {{date_format($product->to, "j F, Y")}}
                </div>
                <div class="col s12 l8 no-pad-top no-pad-bottom">
                    <div class="divider"></div>
                </div>
                <div class="price col s12 m4 l4 light-green-text">
                    <span class="blue-grey-text">Price:</span> &#x20b9;{{$product->price}}
                </div>
                <div class="quantity col s12 m4 l2 light-green-text">
                    {{$product->quantity - $product->sold}} remaining
                </div>
                <div class="sold col s12 m4 l2 light-green-text">
                    {{$product->sold}} sold
                </div>
                <div class="col s12 l8 no-pad-top no-pad-bottom">
                    <div class="divider"></div>
                </div>
                <div class="desc col s12 l8 blue-grey-text">
                    {{$product->description}}
                </div>
                <div class="col s12 l8 no-pad-top no-pad-bottom">
                    <div class="divider"></div>
                </div>
                @if(!Auth::check() || !Auth::user()->seller)
                <div class="cart col s12 l2 blue-grey-text">
                    <form method="post" action="/cart/add/{{$product->id}}">
                        {{ csrf_field() }}
                        <button class="btn" type="submit" name="action">Add to Cart</button>
                    </form>
                </div>
                @endif
            </div>
            @if(!Auth::check() || !Auth::user()->seller)
            <div class="row message-wrapper">
                <div class="col s12 message-input">
                    <form action="/message/{{$product->id}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col s12">
                                <div class="light-green-text">Have something to say to the seller?</div>
                                <textarea id="message" class="materialize-textarea" name="message" length="500"></textarea>
                                <label for="message">Drop a message</label>
                            </div>
                            <div class="col s12">
                                <button class="btn blue" type="submit" name="action">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection