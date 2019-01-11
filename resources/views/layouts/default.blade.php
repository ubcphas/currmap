<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div id="app" class="container">
	<h1>Curriculum Map Project</h1><br />
	<header class="row">
        @include('includes.header')
    </header>

	<div id="main" class="row">
<!--        <div id="content" class="col-lg-12"> -->
            @yield('content')
<!--	    </div> -->
	</div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
<!-- Load library of js code, then yield to view for more -->
<script src="{{ mix('js/app.js') }}"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

@yield('js')
</body>
</html>
