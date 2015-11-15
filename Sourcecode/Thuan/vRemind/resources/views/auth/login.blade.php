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
            <a href="../auth/register" class="button-signup1" style="text-decoration:none; float:right;margin-right:20px;">
                Sign up
            </a>
        </div>
		
		@section('content')
        <div class="mot-hang" style="background-color:#FAFAF9;">
            <div class="mot-hang-content" style="text-align:center;height:100%;">
                <div class="mot-hang" style="    margin-top: 100px;
    font-size: 37px; font-family: sans-serif;color: #4A4A4A;">
                    Log in
                </div>
				
                <div class="mot-hang" style="margin-top:40px;">
                    <div class="mot-hang-70" style="margin-left:15%;background-color:white;
                         border:1px solid rgba(0,0,0,.15) ;border-radius:8px;text-align:left;">
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
						<form class="mot-hang" role="form" method="POST" action="{{ url('/auth/login') }}">
						{!! csrf_field() !!}

						<div class="mot-hang">
							<label class="chu-ben-trong">Email address</label>
							<div class="mot-hang">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="mot-hang">
							<label class="chu-ben-trong">Password</label>
							<div class="mot-hang">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="mot-hang">
							<div class="chu-ben-trong">
								<div>
									<label>
										<input type="checkbox" name="remember"> Stay logged in 
									</label>
								</div>
							</div>
						</div>

						<div class="mot-hang">
							<div class="mot-hang">
								<button type="submit" class="button-login1">Log in</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot password?</a>
							</div>
						</div>
					</form>
					
                        
                    </div>
                </div>
            </div>
        </div>
		@endsection
    </body>
	
</html>

	
	
	
	
	
	
	
	
	
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Đăng nhập</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Địa chỉ Email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mật khẩu</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Ghi nhớ đăng nhập
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Đăng nhập</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Bạn không nhớ mật khẩu?</a>
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
