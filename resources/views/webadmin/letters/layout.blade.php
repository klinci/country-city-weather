<!DOCTYPE html>
<html>
	<head>
		@include('webadmin.letters.includes.meta')
		@include('webadmin.letters.includes.css')
	</head>
	<body class="body-style">
		@include('webadmin.letters.includes.preheader')
		@yield('content')
	</body>
</html>