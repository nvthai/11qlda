<nav class="groups-nav" style="padding:0px;font-family: cursive; font-size:13px;" >
	@if (Auth::user()->role == 'teacher')
		<section class="groups-nav-section">
			{{-- <div class="group-header input-group">
				<h4 class="groups-nav-section-title">CLASSES OWNED</h4>
				<span class="input-group-btn">
					<button class="btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
				</span>
			</div> --}}
			<div class="mot-hang" >                
                <span class="chu-class">
                    CLASSES OWNED
                </span>              
            </div>

			<div class="group-list">
				<ul class="menu-class">
                <!--21/11/15-->
                <!--LH-->
                <!--Hien thi class-->
                    <li class="menu-class-child" data-toggle="modal" data-target="#addClassModal" aria-haspopup="true">
                        <div class="button-add" >
                            +
                        </div>
                         <span style="float:left;padding-top:8px;color: #3373b8;;">
                        Add a Class
                        </span>
                    </li>
                    @foreach ($classes as $class)
                        @if (Session::get('sesClassId')->class_id === $class->id)
                    <a href="/classes/{{$class->id}}" name="classid" id="classid">
                    <li class="menu-class-child class-selected">
                        <img alt="avatarclass"  src="../{!! $class->icon !!}"/>
                        <font>
                            {{ $class->class_name }}
                        </font>
                    </li>
                    </a>
                        @endif
                        @if (Session::get('sesClassId')->class_id !== $class->id)
                    <a href="/classes/{{$class->id}}" name="classid" id="classid"> 
                     <li class="menu-class-child">
                        <img alt="avatarclass"  src="../{!! $class->icon !!}"/>
                        <font>
                            {{ $class->class_name }}
                        </font>
                    </li>        
                    </a>
                        @endif
                    @endforeach
                </ul>
                
			</div>
		</section>
	@endif
	<section class="groups-nav-section">
		<div class="class-ow-jo" style="margin-top:50px;">
            <div class="mot-hang" >
                <span class="chu-class">
                    CLASSES JOINED
                </span>
            </div>
            <ul class="menu-class">
                <li class="menu-class-child" data-toggle="modal" data-target="#joinClassModal" aria-haspopup="true">
                    <div class="button-add" >
                     +
                    </div>
                    <span style="float:left;padding-top:8px;color: #3373b8;">
                        Join a Class
                    </span>

                </li>
                <li class="menu-class-child class-selected">
                    <img alt="avatarclass"  src="../resources/assets/img/classesAvatar/avatar_baseball.png"/>
                    <font>
                        Cơ sở dữ liệu nâng cao
                    </font>                        
                </li>
            </ul>
        </div>
	</section>	
</nav>
