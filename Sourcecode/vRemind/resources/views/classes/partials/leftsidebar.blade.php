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
                    LỚP ĐANG SỞ HỮU
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
                        Tạo lớp mới
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
                    LỚP HIỆN ĐANG THAM GIA
                </span>
            </div>
            <div class="group-list">
                <ul class="menu-class">
                <!--21/11/15-->
                <!--LH-->
                <!--Hien thi class-->
                    <li class="menu-class-child" data-toggle="modal" data-target="#joinClassModal" aria-haspopup="true">
                        <div class="button-add" >
                            +
                        </div>
                         <span style="float:left;padding-top:8px;color: #3373b8;;">
                        Tham gia lớp khác
                        </span>
                    </li>

                    @foreach ($classes_joins as $classes_join)
                        @if (Session::get('sesClassId')->class_id === $classes_join->id)
                    <a href="/classes/{{$classes_join->id}}" name="classid" id="classid">
                    <li class="menu-class-child class-selected">
                        <img alt="avatarclass"  src="../{!! $class->icon !!}"/>
                        <font>
                            {{ $classes_join->class_name }}
                        </font>
                    </li>
                    </a>
                        @endif
                        @if (Session::get('sesClassId')->class_id !== $classes_join->id)
                    <a href="/classes/{{$classes_join->id}}" name="classid" id="classid"> 
                     <li class="menu-class-child">
                        <img alt="avatarclass"  src="../{!! $class->icon !!}"/>
                        <font>
                            {{ $classes_join->class_name }}
                        </font>
                    </li>        
                    </a>
                        @endif
                    @endforeach
                </ul>
                
            </div>
        </div>
    </section>  
</nav>
