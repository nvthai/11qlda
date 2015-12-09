
@extends('layout.defaultLogin')
@section('titlePage')
	Log in
@endsection
@section('content')



<div class="mot-hang" style="background-color:#FAFAF9;">
            <div class="mot-hang-content" style="text-align:center;height:100%;">
                <div class="mot-hang" style="    margin-top: 20px;
    font-size: 37px; font-family: sans-serif;color: #4A4A4A;">
                    Log in
                </div>
                <div class="mot-hang" style="margin-top:40px;">
                    <div class="mot-hang-70" style="    margin-bottom: 400px;margin-left:15%;background-color:white;
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

                        <form role="form" method="POST" action="{{ url('/auth/login') }}">
                        	{!! csrf_field() !!}
                            <div class="mot-hang" style="margin-top:10px;">
                                <font class="chu-ben-trong">
                                    Email address
                                </font>
                                
                            </div>
                            <div class="mot-hang">
                                
                                <input  type="text" name="email" value="{{ old('email') }}" placeholder="Email address" class="input-ben-trong"/>
                           
                            </div>
                            <div class="mot-hang">
                                <font class="chu-ben-trong">
                                    Password
                                </font>
                                
                            </div>
                            <div class="mot-hang">
                                    
                               		<input type="passworld" class="input-ben-trong" placeholder="Password" name="password">
                            </div>
                            <div class="mot-hang" style="margin:20px 0px 20px 0px;">
                                <input name="remember" style="margin: 0px 12px 12px 4%;" type="checkbox" class="input-ben-trong-check" />
                                <font style="font-size:16px;color:#3E3E3E;">
                                    Stay logged in
                                </font>
                                
                                
                            </div>

                            <div class="mot-hang">
                            	<button type="submit" style="width:90%;margin-left:4%;padding:15px 0px 15px 0px;" class="btn btn-primary">Đăng nhập</button>
                            </div>
                            <div class="mot-hang" style="margin:20px 0px 20px 0px;">
                                <span class="font-or">
                                </span>
                            </div>
                            <div class="mot-hang">
                                <button style="width:90%;margin-left:4%;padding:15px 0px 15px 0px;" class="btn btn-primary butonGoogle">
                                    Log in with Google
                                </button>
                            </div>
                            <a class="btn btn-link" href="{{ url('/password/email') }}">
                                <div class="mot-hang" style="text-align:center;color:gray;">
                                    Bạn không nhớ mật khẩu?
                                <div>
                           </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
