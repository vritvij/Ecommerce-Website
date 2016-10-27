@extends('master')

@section('title')
    Customer Dashboard | Myst
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
                        <div class="items-sold">Items Bought: 10</div>
                        <div class="earnings">Total Spendings: &#x20b9;8000</div>
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
                    <a href="/dashboard/crm" class="action">
                        <div class="card-panel wrapper">
                            <div class="img crm valign-wrapper">
                                <i class="large material-icons white-text valign">hearing</i>
                            </div>
                            <div class="blue-grey-text center-align desc">Chat Center<br/>Get your voice across</div>
                        </div>
                    </a>
                </div>
                <div class="col l4 s12">
                    <a href="" class="action">
                        <div class="card-panel wrapper">
                            <div class="img sales valign-wrapper">
                                <i class="large material-icons white-text valign">trending_up</i>
                            </div>
                            <div class="blue-grey-text center-align desc">Purchase History<br/>See the past to plan for the future</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection