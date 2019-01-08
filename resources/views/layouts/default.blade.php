<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">

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
</body>
</html>
