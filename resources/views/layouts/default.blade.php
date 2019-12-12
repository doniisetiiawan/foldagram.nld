<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $title }}</title>
    <link rel='stylesheet' type='text/css'
          href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Droid+Sans:400,700'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css"/>

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body class="{{ $class }}">
<div class="container">
    <div class="row-fluid header">
        <div class="span4 logo">
            <a href="{{ URL::to('/') }}"><img class="logo" src="{{ asset('img/logo.png') }}" alt="logo"/></a>
        </div>
        <div class="span6 menu">
            <ul>
                <li><a href="#popup" data-toggle="modal">Create Foldagram</a></li>
                {{--                <li>{{ link_to_route('pcredit', 'Purchase Credits') }}</li>--}}
                {{--                <li>{{ link_to_route('cart', 'Cart') }}</li>--}}
                {{--                <li>{{ link_to_route('contact', 'Contact') }}</li>--}}
                {{--                <li>{{ link_to_route('userlogin', 'Login') }}</li>--}}
                                <li>{{ link_to_route('register', 'Register') }}</li>
            </ul>
        </div>
        <div class="span2 social">
            <a href="https://www.facebook.com/TheFoldagram" target="_blank">
                <img class="facebook" src="{{ asset('img/img_trans.png') }}" alt="facebook"/>
            </a>
            <a href="https://twitter.com/thefoldagram" target="_blank">
                <img class="twit" src="{{ asset('img/img_trans.png') }}" alt="twitter"/>
            </a>
            <a href="https://pinterest.com/thefoldagram/" target="_blank">
                <img class="ping" src="{{ asset('img/img_trans.png') }}" alt="ping"/>
            </a>
        </div>
    </div>

    @yield('inner-banner')

    <div class="row-fluid content">

        @yield('content')

    </div>
    <div class="row-fluid subcribe-form">

        @if ($errors->any())
            <div class="span6 alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="error_message alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <div class="span12 subscribe-content">
            {{ Form::open(['url' => 'subscribe']) }}
            {{ Form::label('something', 'Sign Up for Our Newsletter and Updates!') }}
            {{ Form::text('email', null, array('class' => 'input-large', 'placeholder' => 'example@gmail.com', 'required' => 'required')) }}
            {{ Form::submit('Subscribe', ['class' => 'btn']) }}
            {{ Form::close() }}
        </div>
    </div>
    <div class="row-fluid footer">
        <div class="span8 footer-menu">
            <ul>
                {{--                <li>{{ link_to_route('contact', 'Contact') }}</li>--}}
                                <li>{{ link_to_route('about', 'About Us') }}</li>
                {{--                <li>{{ link_to_route('login', 'Log In') }}</li>--}}
                                <li>{{ link_to_route('register', 'Register') }}</li>
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
