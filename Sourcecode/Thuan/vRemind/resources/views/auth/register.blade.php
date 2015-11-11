@extends('layout.default')
<html>
    <head>
        <meta charset="UTF-8">
        <title>vRemind</title>
        <link rel="shortcut icon" href="{!! asset('resources/assets/img/ico-tab.png') !!}">
		{!! Html::style('resources/assets/css/main.css') !!}
        {!! Html::script('resources/assets/js/jquery.min.js') !!}
		
    </head>
	<body>
        <div class="mot-hang-gan-tren" style="padding:10px 0px 10px 0px; background-color:#4a89dc;">
			{!! Html::image('resources/assets/img/logo.svg','image',array('height' => '25px')) !!}
            <a href="../auth/login" class="button-login" style="text-decoration:none; float:right;margin-right:20px;">
                Log in
            </a>
        </div>
@section('content')
<div class="mot-hang">
	<div class="mot-hang-register">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Sign up</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Thông tin bạn nhập vào không đúng. Vui lòng kiểm tra lại.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">First name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Email address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Re-Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Sign up
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
    </body>
	
</html>

