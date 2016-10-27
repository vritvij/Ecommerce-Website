@extends('master')

@section('title')
    Seller Dashboard | Myst
@endsection

@section('body')
    <div id="dashboard" class="outer-container blue-grey lighten-5">
        <div class="container">
            <div id="seller-details" class="row">
                <div class="col l4 s12">
                    <div class="card-panel blue white-text">
                        <div class="name">{{$user->fname}} {{$user->lname}}</div>
                        <div class="email">{{$user->email}}</div>
                    </div>
                </div>
                <div class="col l4 s12">
                    <div class="card-panel green white-text">
                        <div class="items-sold">Items Sold: 2</div>
                        <div class="earnings">Total Earnings: &#x20b9;1000</div>
                    </div>
                </div>
                <div class="col l4 s12">
                    <div class="card-panel teal white-text">
                        <div class="tfa"><a class="light-blue-text text-accent-1" href="/auth/tfa">Rescan Two Factor Auth Code</a></div>
                        <a class="logout light-blue-text text-lighten-5" href="/auth/logout">Logout</a>
                    </div>
                </div>
            </div>
            <div id="actions" class="row">
                <div class="col l4 s12">
                    <a href="/dashboard/sell" class="action">
                        <div class="card-panel wrapper">
                            <div class="img add valign-wrapper">
                                <i class="large material-icons white-text valign">add_circle</i>
                            </div>
                            <div class="blue-grey-text center-align desc">Have something to sell?<br/>We'll Help you sell it</div>
                        </div>
                    </a>
                </div>
                <div class="col l4 s12">
                    <a href="/dashboard/crm" class="action">
                        <div class="card-panel wrapper">
                            <div class="img crm valign-wrapper">
                                <i class="large material-icons white-text valign">hearing</i>
                            </div>
                            <div class="blue-grey-text center-align desc">Your customers want to be heard<br/>Check out what they have said</div>
                        </div>
                    </a>
                </div>
                <div class="col l4 s12">
                    <a href="" class="action">
                        <div class="card-panel wrapper">
                            <div class="img sales valign-wrapper">
                                <i class="large material-icons white-text valign">trending_up</i>
                            </div>
                            <div class="blue-grey-text center-align desc">Sales Reports<br/>See the past to plan for the future</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection