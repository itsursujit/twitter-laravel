<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{ URL::to('/vendor/font-awesome/css/font-awesome.css') }}" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="{{ URL::to('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/assets/css/bootstrap-toggle.min.css') }}">

    <!-- DataTable Bootstrap -->
    <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href="{{ URL::to('/assets/css/simple-sidebar.css') }}"
          rel="stylesheet">
    @yield('styles')
    <style type="text/css">
        .sidebar-nav li.active > a,
        .sidebar-nav li > a:focus {
            text-decoration: none;
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
        }

        .header {
            width: 100%;
            background: #1e9448;/*#fd761e;*/
            color: #fff;
            height: 50px;

        }
        #sidebar-wrapper{
            background-color: #fd761e !important;
        }
        .sidebar-nav li a{color: #fff !important;}
    </style>
</head>
<body id="app-layout">

@if (Auth::guest())
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ URL::to('/') }}">
                    United Gold Mart
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ URL::to('/login') }}">Login</a></li>
                        <li><a href="{{ URL::to('/register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@else
    <div id="wrapper" class="">
        <!-- Sidebar -->
            @include('layouts.sidebar')
        <!-- /#sidebar-wrapper -->
        <header class="header">
            <a href="#menu-toggle"
               style="margin-top: 8px;margin-left: 5px;background-color: #E7E7E7;border-color: #E7E7E7"
               class="btn btn-default" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>

            @if (!Auth::guest())
                <span class="pull-right" style="margin-right: 10px;margin-top: 15px"><a href="{{ URL::to('/logout') }}" style="color: #fff;"><i
                                class="fa fa-btn fa-sign-out"></i>Logout</a></span>
            @endif
        </header>
    </div>
    @endif

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="container-fluid">

            <div class="row">
            @if (Config::has('infyom.laravel_generator.add_on.menu.enabled')) 
                <div class="col-md-9 col-md-offset-3">
                    @yield('content')
                </div>
            @else
                <div class="col-md-12">
                    @yield('content')
                </div>
            @endif
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <!-- JavaScripts -->
    <script src="{{ URL::to('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::to('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('/assets/js/bootstrap-toggle.min.js') }}"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

    <script>

        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(target).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    @yield('scripts')

</body>
</html>
