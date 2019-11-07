<!DOCTYPE html>
<html>
<head>
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
	<div class="pull-right">
        <a href="{{ url('login/logout') }}" class="btn btn-default btn-flat">Sign out</a>
    </div>
        <div class="content-wrapper bg_white">
            @yield('content')
        </div>
</body>
</html>
