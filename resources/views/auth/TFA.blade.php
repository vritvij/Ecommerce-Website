@extends('master')

@section('title')
    Two Factor Authentication | Myst
@endsection

@section('body')
    <div class="outer-container tfa blue-grey lighten-5">
        <div class="container center-align">
            <div class="page-title white-text">Two Factor Auth</div>
            <div class="white-text subtext">
                Do not skip this step. Otherwise, you will NOT BE ABLE TO LOG IN.<br/>
                Scan the QR Code below using any Google Authenticator compatible app.
            </div>
            <img src="{!! $imgurl !!}" alt="otp">
            <div class="white-text subtext2">
                Download the <b>Google Authenticator App</b>
                <div class="row download-options">
                    <div class="col m6 s12">
                        <a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8%22">
                            <img src="/img/appstore.png" alt="Apple Appstore Logo">
                        </a>
                    </div>
                    <div class="col m6 s12">
                        <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2">
                            <img src="/img/google.png" alt="Google Playstore Logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection