<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ URL::asset('/css/app.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Admin
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/manage-member') }}">Thành viên</a></li>
                    <li><a href="{{ url('/duyet-member') }}">Duyệt thành viên</a></li>
                    <li><a href="{{ url('/manage-confession') }}">Confessions</a></li>
                    <li><a href="{{ url('/duyet-confession') }}">Duyệt Confessions</a></li>
                    <li><a href="{{ url('/events') }}">Sự kiện</a></li>
                    <li><a href="{{ url('/check-lienhe') }}">Liên hệ</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <!-- <li><a href="{{ url('caohoangthien/login') }}">Login</a></li>
                        <li><a href="{{ url('caohoangthien/register') }}">Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
    <script type="text/javascript" src="{{URL::asset('js/jquery-3.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
