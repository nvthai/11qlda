<nav class="navbar">
	<div >
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">vRemind</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar">
			@if (Auth::user())
				<ul class="nav navbar-nav">
					<li><a href="{{ url('#') }}">Classes</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="{{ url('#') }}">Chat</a></li>
				</ul>
			@endif
			<ul class="nav navbar-nav navbar-right">
				@if(auth()->guest())
					@if(!Request::is('auth/login'))
						<li><a href="{{ url('/auth/login') }}" class="Glyph Glyph-avatar ">Đăng nhập</a></li>
					@endif
					@if(!Request::is('auth/register'))
						<li><a href="{{ url('/auth/register') }}">Đăng ký</a></li>
					@endif
				@else
					<li>
						<a class="btn btn-lg" data-toggle="modal" data-target="#helpModal" aria-haspopup="true">
						    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>								
						</a>	
					</li>
					<li>
						<a class="btn btn-lg" data-toggle="modal" data-target="#shareModal" aria-haspopup="true">
						    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>								
						</a>	
					</li>
					<li class="dropdown">
						<a class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						    <span class="caret"></span>
					  	</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/auth/logout') }}">Thoát</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>

	</div>
</nav>