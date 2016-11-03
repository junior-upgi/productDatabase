<html lang="zh">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>系統登入</title>
	<script>var url = "{{ url('/') }}";</script>

	<link rel="stylesheet" href="{{ url('/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">

    <script src="{{ url('/script/jquery-3.1.0.min.js') }}"></script>
	<script src="{{ url('/script/jquery-ui.js') }}"></script>

	<script src="{{ url('/script/sweetalert.js') }}"></script>
	<script src="{{ url('/script/bootstrap.js') }}"></script>
	<script src="{{ url('/script/jquery.blockUI.js') }}"></script>
	<script src="{{ url('/script/jquery.form.min.js') }}"></script>
</head>
<body style="padding-top:40px;padding-bottom:40px;background-color:#eee;">
    <div class="container">
        <form class="form-signin" role="form" action="login" method="POST" style="max-width:330px;padding:15px;margin:auto;">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
            <h2 class="form-signin-heading">請輸入帳號密碼</h2>
			<label for="account" class="sr-only">帳號</label>
			<input type="text" id="account" name="account" class="form-control" placeholder="帳號(員工編號)" required="" autofocus="">
			<label for="password" class="sr-only">密碼</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="密碼" required="">
			@if ($errors->has('fail'))
				<div class="fail">{{ $errors->first('fail') }}</div>
			@endif
			<button class="btn btn-lg btn-primary btn-block" style="margin-top:20px;" type="submit">登入</button>
		</form>
    </div>
</body>
</html>