<nav class="groups-nav" style="padding:0px;font-family: cursive; font-size:13px;" >
	@if (Auth::user()->role == 'teacher')
		<section class="groups-nav-section">
			{{-- <div class="group-header input-group">
				<h4 class="groups-nav-section-title">LỚP ĐANG SỞ HỮU</h4>
				<span class="input-group-btn">
					<button class="btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
				</span>
			</div> --}}
			<div class="mot-hang" >                
                <span class="chu-class">
                    Tài khoản
                </span>              
            </div>

			<div class="group-list">
				<ul class="menu-class">
                <!--21/11/15-->
                <!--LH-->
                <!--Hien thi class-->
                    <a href="" name="classid" id="classid">
                    <li class="menu-class-child class-selected">
                        <font>
                        	Thiết lập	
                        </font>
                    </li>
                    </a>

                    <a href="" name="classid" id="classid"> 
                     <li class="menu-class-child">
                        <font>
                            Thông báo
                        </font>
                    </li>        
                    </a>
                    <a href="" name="classid" id="classid"> 
                     <li class="menu-class-child">
                        <font>
                            Nhắn tin
                        </font>
                    </li>        
                    </a>
                     <a href="" name="classid" id="classid"> 
                     <li class="menu-class-child">
                        <font>
                            Widgets
                        </font>
                    </li>        
                    </a>
                     <a href="" name="classid" id="classid"> 
                     <li class="menu-class-child">
                        <font>
                            In
                        </font>
                    </li>        
                    </a>
                </ul>
                
			</div>
		</section>
	@endif
	<section class="groups-nav-section">
		<div class="class-ow-jo" style="margin-top:50px;">
            <div class="mot-hang" >
                <span class="chu-class">
                    LỚP HIỆN ĐANG THAM GIA
                </span>
            </div>
            <ul class="menu-class">
                <li class="menu-class-child" data-toggle="modal" data-target="#joinClassModal" aria-haspopup="true">
                    <div class="button-add" >
                     +
                    </div>
                    <span style="float:left;padding-top:8px;color: #3373b8;">
                        Tham gia lớp khác
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