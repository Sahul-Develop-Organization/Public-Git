<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping cart</title>
    {{ HTML::style('resources/assets/css/common.css') }}
    {{ HTML::style('resources/assets/css/bootstrap.min.css') }}
    
    {{ HTML::script('resources/assets/js/jquery.min.js') }}
    {{ HTML::script('resources/assets/js/bootstrap.min.js') }}
    <style>
        body {
            font-family: 'Lato';
            font-size: 16px;
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <SCRIPT LANGUAGE="javascript">
    </SCRIPT>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="col-xs-12" style="background-color: #3C8DBC;">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar" style="height:50px;">
                </ul>
                <div class="pull-left" style="padding-top: 10px;">
                        <a href="{{ url('/') }}" class="btn btn-info">Home</a>
                    </div>
                    @if(Session::has('userid'))
                    <div class="pull-right" style="padding-top: 10px;">
                        <a href="{{ url('logout') }}" class="btn btn-info">Sign out</a>
                    </div>
                    @endif
            </div>
        </div>
    </nav>
    <div align="center">
    @yield('content')
    </div>
</body>
</html>
