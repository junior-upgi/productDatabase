<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>產品資料管理</title>
	<script>
		var url = "{{url('/')}}";
	</script>

	<!--<link href="/css/app.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="{{url('/')}}/css/bootstrap.css">
	<!--<link rel="stylesheet" href="{{url('/')}}/css/bootstrap-theme.css">-->
	
	<link rel="stylesheet" href="{{url('/')}}/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="{{url('/')}}/css/jquery-ui.css">
	<link rel="stylesheet" href="{{url('/')}}/css/sweetalert.css">
	<link rel="stylesheet" href="{{url('/')}}/css/fileinput.min.css">
	<!-- Fonts -->
	<!--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
	
	<script src="{{url('/')}}/script/jquery-3.1.0.min.js"></script>
	<script src="{{url('/')}}/script/jquery-ui.js?x=1"></script>
	
	
	<script src="{{url('/')}}/script/fileupload/plugins/canvas-to-blob.min.js?x=1"></script>
	<script src="{{url('/')}}/script/fileupload/plugins/sortable.min.js?x=1"></script>
	<script src="{{url('/')}}/script/fileupload/plugins/purify.min.js?x=1"></script>

	<script src="{{url('/')}}/script/fileinput.min.js?x=1"></script>

	<script src="{{url('/')}}/script/fileupload/themes/fa/theme.js?x=1"></script>

	<script src="{{url('/')}}/script/sweetalert.js"></script>
	<script src="{{url('/')}}/script/bootstrap.js"></script>
	<script src="{{url('/')}}/script/jquery.blockUI.js"></script>
	<script src="{{url('/')}}/script/jquery.form.min.js"></script>
	<script src="{{url('/')}}/script/bootstrap-datetimepicker.min.js"></script>
	<script src="{{url('/')}}/script/bootstrap-datetimepicker.zh-TW.js"></script>
	<script src="{{url('/')}}/script/fileupload/locales/zh-TW.js?x=1"></script>
	<script src="{{url('/')}}/script/master.js?x=1"></script>
</head>
<body>
	<div class="container">
		<div class="content">
			@yield('content')
		</div>
	</div>
</body>
</html>