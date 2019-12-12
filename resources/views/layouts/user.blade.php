<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ '$title' }}</title>
    <link rel='stylesheet' type='text/css'
          href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Droid+Sans:400,700'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css"/>

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body class="{{ '$class' }}">
<div class="container">
    <div class="row-fluid header">

        @if(Auth::check())
            <p class="userlink"> {{ link_to_route('myaccount', 'My Account') }} | Welcome !</p>
        @endif

        <div class="span4 logo">
            <a href="{{ URL::to('/') }}"><img class="logo" src="{{ asset('img/logo.png') }}" alt="logo"/></a>
        </div>
        <div class="span6 menu">
            <ul>
                <li><a href="#popup" data-toggle="modal">Create Foldagram</a></li>

                @if(Auth::check())
                    <li></li>
                    <li>{{ link_to_route('frontlogout', 'Logout') }}</li>
                @else
                    <li>{{ link_to_route('login', 'Login') }}</li>
                    <li>{{ link_to_route('register', 'Register') }}</li>
                @endif
            </ul>
        </div>
        <div class="span2 social">
            <a href="https://www.facebook.com/TheFoldagram" target="_blank"><img class="facebook"
                                                                                 src="{{ URL::to('/') }}/img/img_trans.png"/></a>
            <a href="https://twitter.com/thefoldagram" target="_blank"><img class="twit"
                                                                            src="{{ URL::to('/') }}/img/img_trans.png"/></a>
            <a href="https://pinterest.com/thefoldagram/" target="_blank"><img class="ping"
                                                                               src="{{ URL::to('/') }}/img/img_trans.png"/></a>
        </div>
    </div>

    @yield('inner-banner')

    <div class="row-fluid content">

        @yield('content')

    </div>
    <div class="row-fluid footer">
        <div class="span8 footer-menu">
            <ul>
                {{--                <li>{{ link_to_route('contact', 'Contact') }}</li>--}}
                <li>{{ link_to_route('about', 'About Us') }}</li>
                {{--                <li>{{ link_to_route('login', 'Log In') }}</li>--}}
                {{--                <li>{{ link_to_route('register', 'Register') }}</li>--}}
            </ul>
        </div>
        <div class="span4 copyright">
            <h4>Foldagram is patent pending</h4>
            <p>&copy;Copyright All Encompassing Productions llc, 2012</p>
        </div>
    </div>
</div><!-- End Container -->

@include('foldagram')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>

<script src="{{ asset('js/jquery.limit.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>

</body>
</html>
