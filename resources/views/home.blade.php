@extends('master')

@section('title')
    Myst
@endsection

@section('body')
    <div id="products" xmlns="http://www.w3.org/1999/html">
        <div class="outer-container parallax-container blue-grey lighten-5">
            <div class="parallax valign-wrapper">
                <img src="/img/parallax1.jpg">
                <div class="container valign">
                    <div class="page-title white-text">Games</div>
                    <div class="page-body white-text">
                        <b>You love games?</b><br>
                        We love games too!!<br>
                        So here's an assortment for all tastes
                    </div>
                </div>
            </div>
        </div>
        <div class="outer-container product-wrapper">
            <div class="container">
                <div class="ads">
                    <div class="row center">
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($games)>0)
                    @foreach($games as $game)
                        <a href="/product/{{$game->id}}">
                            <figure class="product z-depth-1">
                                <div class="image" style="background-image: url({!! $game->image !!})"></div>
                                <div class="name white-text">{{ $game->name }}</div>
                                <figcaption class="row">
                                    <div class="col s6 price light-green-text left-align">&#x20b9;{{ $game->price }}</div>
                                    <div class="col s6 quantity right-align blue-grey-text">{{ $game->quantity - $game->sold }} left</div>
                                </figcaption>
                            </figure>
                        </a>
                    @endforeach
                @else
                    <figure class="product nothing">
                        <img src="/img/nothing.jpg" alt="Nothing Here">
                        <figcaption class="row">
                            <div class="col s12 blue-grey-text">Seems, We ran out of products!</div>
                        </figcaption>
                    </figure>
                @endif
            </div>
        </div>
        <div class="outer-container parallax-container blue-grey lighten-5">
            <div class="parallax valign-wrapper">
                <img src="/img/parallax2.jpg">
                <div class="container valign">
                    <div class="page-title white-text">Graphics Cards</div>
                    <div class="page-body white-text">
                        <b>Scotty, I need more power!</b><br>
                        Aye Aye Captain!!<br>
                        Put your graphics in overdrive with these badboys
                    </div>
                </div>
            </div>
        </div>
        <div class="outer-container product-wrapper">
            <div class="container">
                <div class="ads">
                    <div class="row center">
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($cards)>0)
                    @foreach($cards as $card)
                        <a href="/product/{{$card->id}}">
                            <figure class="product z-depth-1">
                                <div class="image" style="background-image: url({!! $card->image !!})"></div>
                                <div class="name white-text">{{ $card->name }}</div>
                                <figcaption class="row">
                                    <div class="col s6 price light-green-text left-align">&#x20b9;{{ $card->price }}</div>
                                    <div class="col s6 quantity right-align blue-grey-text">{{ $card->quantity - $card->sold }} left</div>
                                </figcaption>
                            </figure>
                        </a>
                    @endforeach
                @else
                    <figure class="product nothing">
                        <img src="/img/nothing.jpg" alt="Nothing Here">
                        <figcaption class="row">
                            <div class="col s12 blue-grey-text">Seems, We ran out of products!</div>
                        </figcaption>
                    </figure>
                @endif
            </div>
        </div>
        <div class="outer-container parallax-container blue-grey lighten-5">
            <div class="parallax valign-wrapper">
                <img src="/img/parallax3.jpg">
                <div class="container valign">
                    <div class="page-title white-text">Accessories</div>
                    <div class="page-body white-text">
                        <b>Want to be a pro?</b><br>
                        You'll definitely need these<br>
                        HQ Audio, Precision Mice, Backlit keyboards and much more
                    </div>
                </div>
            </div>
        </div>
        <div class="outer-container product-wrapper">
            <div class="container">
                <div class="ads">
                    <div class="row center">
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($accessories)>0)
                    @foreach($accessories as $accessory)
                        <a href="/product/{{$accessory->id}}">
                            <figure class="product z-depth-1">
                                <div class="image" style="background-image: url({!! $accessory->image !!})"></div>
                                <div class="name white-text">{{ $accessory->name }}</div>
                                <figcaption class="row">
                                    <div class="col s6 price light-green-text left-align">&#x20b9;{{ $accessory->price }}</div>
                                    <div class="col s6 quantity right-align blue-grey-text">{{ $accessory->quantity - $accessory->sold }} left</div>
                                </figcaption>
                            </figure>
                        </a>
                    @endforeach
                @else
                    <figure class="product nothing">
                        <img src="/img/nothing.jpg" alt="Nothing Here">
                        <figcaption class="row">
                            <div class="col s12 blue-grey-text">Seems, We ran out of products!</div>
                        </figcaption>
                    </figure>
                @endif
            </div>
        </div>
        <div class="outer-container parallax-container blue-grey lighten-5">
            <div class="parallax valign-wrapper">
                <img src="/img/parallax4.jpg">
                <div class="container valign">
                    <div class="page-title white-text">Gaming Chairs</div>
                    <div class="page-body white-text">
                        <b>Feel like a king of gaming?</b><br>
                        Whats a king without his Throne<br>
                        Nothing beats the level of comfort of these chairs! NOTHING!
                    </div>
                </div>
            </div>
        </div>
        <div class="outer-container product-wrapper">
            <div class="container">
                <div class="ads">
                    <div class="row center">
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                        <div class="ad col s12 m6 l3">
                            <div class="card-panel grey lighten-5 z-depth-0 grey-text text-darken-1">
                                Random ad
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($chairs)>0)
                    @foreach($chairs as $chair)
                        <a href="/product/{{$chair->id}}">
                            <figure class="product z-depth-1">
                                <div class="image" style="background-image: url({!! $chair->image !!})"></div>
                                <div class="name white-text">{{ $chair->name }}</div>
                                <figcaption class="row">
                                    <div class="col s6 price light-green-text left-align">&#x20b9;{{ $chair->price }}</div>
                                    <div class="col s6 quantity right-align blue-grey-text">{{ $chair->quantity - $chair->sold }} left</div>
                                </figcaption>
                            </figure>
                        </a>
                    @endforeach
                @else
                    <figure class="product nothing">
                        <img src="/img/nothing.jpg" alt="Nothing Here">
                        <figcaption class="row">
                            <div class="col s12 blue-grey-text">Seems, We ran out of products!</div>
                        </figcaption>
                    </figure>
                @endif
            </div>
        </div>
    </div>
@endsection