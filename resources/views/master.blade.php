<!DOCTYPE HTML>
<html>
    <head>
        <title>@yield('title')</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <link rel="stylesheet" href="/css/materialize.min.css">
        <link rel="stylesheet" href="/css/main.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        @yield('meta')
    </head>
    <body>
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="/" class="brand-logo">
                    <img src="/img/logo.png">
                    <span class="light-blue-text text-darken-4">Myst</span>
                </a>
                <ul class="right">
                    @if (Auth::check())
                        <li><a href="/">Home</a></li>
                        @if(!Auth::user()->seller)
                            <li class="cart"><a href="/cart">
                                    <span>Cart</span>
                                    @if(count(Session::get('cart'))>0)
                                        <span class="cbadge indigo white-text z-depth-1">{{count(Session::get('cart'))}}</span>
                                    @endif
                                </a></li>
                        @endif
                        <li><a href="/dashboard">Dashboard</a></li>
                    @else
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Signup</a></li>
                    @endif
                </ul>
            </div>
        </nav>

        <main>
            @yield('body')
        </main>

        <footer class="page-footer blue">
            <div class="container">
                <div class="row">
                    <div class="col m9 s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                    </div>
                    <div class="col m3 s12">
                        <h5 class="white-text">Connect</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Contact</a></li>
                            <li><a class="white-text" href="#!">Facebook</a></li>
                            <li><a class="white-text" href="#!">Twitter</a></li>
                            <li><a class="white-text" href="#!">Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Designed by <a class="teal-text text-lighten-3" target="_blank" href="https://vritvij.github.io/">Vritvij Kadam</a>
                </div>
            </div>
        </footer>
        <script src="/js/jquery-2.1.4.min.js"></script>
        <script src="/js/materialize.min.js"></script>
        <script src="/js/main.min.js"></script>
        @yield('scripts')
    </body>
</html>