<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>產品資料管理</title>
	<script>var url = "{{ url('/') }}";</script>
	@include('layouts.css')
	@include('layouts.js')
</head>
<body>
	<div class="container">
		<div class="content">
			@yield('content')
		</div>
	</div>
</body>
</html>