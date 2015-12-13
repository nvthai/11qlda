@extends('layout.default')

@section('left-sidebar')
    @include('classes.partials.leftsidebar')
@endsection

@section('right-sidebar')
    @include('classes.partials.rightsidebar')
@endsection

@section('content')
    <style>
      .khung-chua-hien-thi-class-notification{
        position: relative;
        float: left;
        width: 100%;
        margin: 0px;
        padding: 10px 0px 10px 0px;
        border: 1px solid #D0D0D0;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
      }
      .khung-hien-thi-class-child{
        list-style: none;
        left:5%;
        top:102%;
        border-radius:5px;
        background-color:white;
        padding:0px;
        width:90%;
        max-height:400px;
        overflow-y:scroll;
        position:absolute;
        display:none;
        z-index:15;
      }
      .khung-chua-smal-hien-thi-class{
        padding:5px;
        border:1px solid #D0D0D0;
        border-radius: 5px;
        float:left;
        margin-right:10px;
        background-color:#D5D5D5;

      }
      .khung-chua-smal-hien-thi-class img{
        width:15px;
        float:left;
        padding:2px 2px 0px 0px;
      }
      .khung-chua-smal-hien-thi-class font{
        float:left;
      }
    </style>
    <div class="mot-hang" style="font-family: cursive; font-size:13px; width:97%;margin-left:3%;">
        <img alt="image-main" style="float:left;margin-right:10px;" src="{!! Session::get('sesClassId')->icon !!}" height="50px"/>
        <div class="mot-hang-70">
            <span class="mot-hang-chu-title">
                {{Session::get('sesClassId')->class_name}}
            </span>
            <span class="mot-hang-chu-description">
               @
               {{Session::get('sesClassId')->class_code}}
            </span>
        </div>
        <div class="button-setting icon-an-noi-dung" data-target="#editClassModal" data-toggle="modal" aria-haspopup="true">
            <div class="noidung-icon" style="left:-32px;">
                Thiết lập Lớp
            </div>
        </div>
        
        <div class="mot-hang" >
            <div class="panel-body">
                {{-- You are logged in! --}}
                {{-- $user = auth(); --}}
                @if (Auth::user()->hasRole('teacher'))
                    Giáo viên                     
                @elseif (Auth::user()->hasRole('student'))
                    Học sinh
                @else
                    Phụ huynh
                @endif
            </div>
        @if (Auth::user()->hasRole('teacher'))        
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/classes/upload') }}">
              <div class="form-group" style="margin-bottom:0px">

                <div class="mot-hang">
                    <!-- <span class="input-group-addon">To: </span>
                    <input type="text" class="form-control" id="toClass" name="toClass" placeholder="{!!Session::get('sesClassId')->class_name!!}" disabled>-->
                    <!--
                    Gui nguoi lam back end
                    Phan lop van dung nam la toClass. Nen vao trong chi can goi la Input::get["toClass"]
                    Gia tri lay ra co dang: id/id/id/. Dùng split de tach mang ra. Nho bo phan tu cuoi
                    Mac Dinh ban dau, neu khong add them lop se la: id/
                    -->

                    <input type="hidden" id="id-khung-chua-id-class"  name="toClass" value={{Session::get('sesClassId')->class_id . "/"}} />
                    <div tabindex="-1" class="khung-chua-hien-thi-class-notification" id="khung-chua-hien-thi-class-id">
                      <font style="float: left;margin: 5px 10px 0px 10px;font-weight: bold;color: #D0D0D0;font-size: 15px;">
                          Đến:
                      </font>
                      <div class="khung-chua-smal-hien-thi-class"> 
                        @foreach ($classes as $class)  
                            @if (Session::get('sesClassId')->class_id === $class->id)
                              <img alt="avatarclass"  src="../{!! $class->icon !!}"/>
                              <font>
                                {{ $class->class_name }}
                              </font>
                            @endif
                        @endforeach
                      </div>

                      <ul class="khung-hien-thi-class-child" id="khung-hien-thi-class-child-id">
                        @foreach ($classes as $class)  
                            @if (Session::get('sesClassId')->class_id !== $class->id)
                                <li class="menu-class-child" value={{$class->id}}>
                                  <img alt="avatarclass"  src="../{!! $class->icon !!}"/>
                                  <font>
                                    {{ $class->class_name }}
                                  </font>
                                </li>        
                            @endif
                        @endforeach
                      </ul>
                    </div>

                    
                <!--<div class="input-group" >
                    <span class="input-group-addon" style="    text-align: left;">Đến:    
                      <img alt="image-main" src="{!! Session::get('sesClassId')->icon !!}" height="25px"/>
                      {!!Session::get('sesClassId')->class_name!!}
                    </span>
                </div>-->
              </div>
              <div class="form-group" style="margin:-4px 0px 15px 0px;">
                <textarea style="padding-top:8px;" class="form-control" name="content" rows="3" placeholder="Gửi thông báo của bạn đến lớp {!!Session::get('sesClassId')->class_name!!}"></textarea>
              </div>
              <div class="btn-group" role="group" aria-label="...">
                <input type="file" name="file" class="btn btn-default">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="datetime-local" name="bdaytime" class="btn btn-default" style="width: 200px;">
              </div>
              <button  type="submit" class="btn btn-primary">Gửi</button>            
            </form>
        @endif
        
    
            <style>
            .khung-chua-noi-dung-notifi
            {
                margin-top: 20px;
                padding:20px 3% 0px 5%;
                border:1px solid #E2E2E2;
                border-radius:5px;
            }
            .ten-khung-notify{
                font-weight:bold;
                font-size: 16px;
                font-family: monospace;
                color:black;
            }
            .khung-chua-tweet-sendag{
              display:none;
              color: #4a89dc;
              font-weight: bold;
              padding-top: 10px;
            }
            .noi-dung-chua-tweet-send{
              cursor:pointer;
              opacity:1;

            }           
            .noi-dung-chua-tweet-send:hover{
              opacity:0.7;
            }

            .content-count-icon-have{
              float: left;
              padding: 4px 10px 4px 25px;
              background-image: url("../resources/assets/img/count-icon-notifi.png");
              background-repeat: no-repeat;
              background-size: 200px;
              font-weight: bold;

            }
            .content-icon-notification
            {
              float: right;
              position:relative;
              width:70px;
              height:70px;
              background-image: url("../resources/assets/img/icon-content-notifi.png");
              background-repeat: no-repeat;
              background-size: 200px;
              font-weight: bold;
            }
            .khung-chon-icon-notifi{
                  display:none;
                  position: absolute;
                  left: -107px;
                  top: 96%;
                  padding: 11px 11px;
                  border-radius: 7px;
                  background-color: rgba(0, 0, 0, 0.78);
            }
            .khung-chon-icon-notifi::after{
                position: absolute;
                left: 81%;
                top: -11px;
                content: " ";
                border-style: solid;
                border-width: 0px 8px 12px 8px;
                border-color: transparent transparent rgba(0, 0, 0, 0.78) transparent;
            }
            .icon-noitifi-child{
                  background-image: url('../resources/assets/img/icon-content-notifi.png');
                  background-repeat: no-repeat;
                  width: 34px;
                  float: left;
                  height: 30px;
                  background-size: 200px;
            }



                
            </style>
            <?php
                $soluongngoissao = 1;
                $soluongcheck = 2;
                $soluongdelete = 4;
                $soluongquestion = 3;
                //ngoisao--check--delete--question
                $noidungUserChon = "check";
                $flag = 0;
                $count = 0;
            ?>
            @foreach($notifications as $noti)
              <?php
                $id_class = explode('/', $noti->class_id);   
              ?>
              @foreach($id_class as $id_cl) 
                @if($id_cl == Session::get('sesClassId')->class_id)
                  <?php
                    $time = strtotime($noti->schedule);
                    $ngayhomnay = date("Y-m-d"); //Lấy thời gian hiện tại 
                    $ngaysosanh = date("Y-m-d", $time);
                    
                  ?>
                  @if(strtotime($ngayhomnay) <= strtotime($ngaysosanh))
                    <?php
                      $idc[$count] = $noti; 
                      $count = $count + 1;                     
                    ?>
                  @endif                 
                @endif
              @endforeach
            @endforeach
            @if($count > 0)
            <div data-toggle="collapse" href="#collapse1" style="text-align: center;color: #2f75b5;font-size: 15px;font-weight: 600;margin-bottom: 20px;border: 1px solid #eee;border-radius: 5px;
            padding: 20px;
            cursor: pointer;"> 
              <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
              Có {{$count}} thông báo hẹn gửi 
              <span class="glyphicon glyphicon-chevron-down" aria-hidden="true" style="font-size: 11px"></span> 
            </div>             
              
                <div id="collapse1" class="panel-collapse collapse">
                  @for($i = 0; $i< $count; $i++)
                  <div class = "mot-hang khung-chua-noi-dung-notifi">
                <div class="mot-hang">
                  <div class="mot-hang-70">
                    <div class="mot-hang ten-khung-notify">
                      <?php 
                        $sender = vRemind\User::find($idc[$i]->sender_id); 
                        $name = $sender->name;
                      ?>
                      {{$name}}
                    </div>
                    <div class="mot-hang" style="color:#CCCCCC;">
                      {{$idc[$i]->schedule}}
                    </div>
                  </div>
                </div>

                <div class ="mot-hang" style="margin:20px 0px 15px 0px;">
                  {{$idc[$i]->content}}
                </div> 
                                @if($idc[$i]->file != null)
                <div class = "panel-body">
                  <img src="{!! $noti->file !!}"   style="width:304px;height:228px;">
                </div>
              
                @endif     
                </div>
                @endfor
              </div>
              
      </div>
      @endif
            @foreach($notifications as $noti)

            
              <?php
                $id_class = explode('/', $noti->class_id);  
                $time = strtotime($noti->schedule);
                $ngaysosanh = date("Y", $time); 
              ?>
            @foreach($id_class as $id_cl)                 
              @if($id_cl == Session::get('sesClassId')->class_id && $ngaysosanh < 2000)
              <div class = "mot-hang khung-chua-noi-dung-notifi">
                <div class="mot-hang">
                  <div class="mot-hang-70">
                    <div class="mot-hang ten-khung-notify">
                      <?php 
                        $sender = vRemind\User::find($noti->sender_id); 
                        $name = $sender->name;
                        $flag = 1;
                      ?>
                      {{$name}}
                    </div>
                    <div class="mot-hang" style="color:#CCCCCC;">
                      {{$noti->created_at}}
                    </div>
                  </div>
                  @if (Auth::user()->hasRole('teacher')) 
                  <div class="mot-hang-30 khung-chua-tweet-sendag">
                    <span class="mot-hang-50 noi-dung-chua-tweet-send" >
                        Tweet
                    </span>
                    <span class="mot-hang-50 noi-dung-chua-tweet-send" >
                        Gửi lại
                    </span>
                  </div>
                  @endif
                </div>

                <div class ="mot-hang" style="margin:20px 0px 15px 0px;">
                  {{$noti->content}}
                </div>

                <div class="mot-hang">
                  <div class="mot-hang-70" style="padding-top:12px;">
                        <?php
                        if($soluongngoissao > 0)
                        {
                        ?>
                        <span class="content-count-icon-have">
                          {{$soluongngoissao}}
                        </span>

                        <?php
                        }
                        if($soluongcheck > 0)
                        {
                        ?>
                        <span class="content-count-icon-have" style="background-position:-52px 0px;">
                          {{$soluongcheck}}
                        </span>
                        <?php
                        }
                        if($soluongdelete > 0)
                        {
                        ?>
                        <span class="content-count-icon-have" style="background-position:-113px 1px;">
                          {{$soluongdelete}}
                        </span>
                        <?php
                        }
                        if($soluongquestion > 0)
                        {
                        ?>
                        <span class="content-count-icon-have" style="background-position:-172px 1px;">
                          {{$soluongquestion}};
                        </span>
                        <?php
                        }
                        ?>
                  </div>
                  <div class="mot-hang-30">
                    <div class="content-icon-notification" tabindex="1" style=
                        <?php 
                        if($noidungUserChon == "ngoisao")
                        {
                          echo '"background-position:0px -71px;"';
                        }
                        if($noidungUserChon == "check")
                        {
                         echo '"background-position:0px -148px;"' ;
                        }
                        if($noidungUserChon == "delete")
                        {
                          echo '"background-position:0px -228px;"';
                        }
                        if($noidungUserChon == "question")
                        {
                          echo '"background-position:0px 0px;"';
                        }
                        ?> id=<?php echo '"khung-chua-icon-id'.$noti->class_id.'"' ?>>

                        <div class="khung-chon-icon-notifi">
                          <span class="icon-noitifi-child" onclick="DoiHinhAnh(1,{{$noti->class_id}})" style="background-position: -149px -83px;">
                          </span>
                          <span class="icon-noitifi-child" onclick="DoiHinhAnh(2,{{$noti->class_id}})" style="background-position: -150px -159px;">
                          </span>
                          <span class="icon-noitifi-child" onclick="DoiHinhAnh(3,{{$noti->class_id}})" style="background-position: -150px -10px;">
                          </span>
                          <span class="icon-noitifi-child" onclick="DoiHinhAnh(4,{{$noti->class_id}})" style="background-position: -150px -243px;">
                          </span>
                        </div>
                    </div>


                  </div>
                  
                </div>

                @if($noti->file != null)
                <div class = "panel-body">
                  <img src="{!! $noti->file !!}"   style="width:304px;height:228px;">
                </div>
                @endif




              </div>
               @endif          
            @endforeach
            @endforeach
            @if($flag == 0)
            <div class = "mot-hang khung-chua-noi-dung-notifi" style="border: 2px dashed #eee;">
                    <div class="mot-hang" style="color:#CCCCCC;">
                      <img src="../resources/assets/img/iconann.png" style="margin-left: auto; margin-right: auto; display: block">
                    </div>  
                    <div class="mot-hang" style="color:#CCCCCC; font-size: 16px;  text-align: center; padding-top: 50px; padding-bottom: 100px;">
                      Thông báo được gửi đến lớp {!!Session::get('sesClassId')->class_name!!} sẽ hiện ở đây.
                    </div>
            </div>          
            @endif
          <script>
            $("#khung-hien-thi-class-child-id").find("li").click(function(){
              var giaTriCoSanBenTrong = $("#id-khung-chua-id-class").val();
              if(giaTriCoSanBenTrong.indexOf($(this).val()) == -1)
              {
                  $("#id-khung-chua-id-class").val(giaTriCoSanBenTrong +  $(this).val() + "/");
                  var htmlstr= '';
                  htmlstr += '<div class="khung-chua-smal-hien-thi-class" id="id-class-dang-chua';
                  htmlstr += $(this).val();
                  htmlstr += '">';
                  htmlstr += $(this).html();

                  htmlstr += '<div style="padding: 2px 5px 0px 8px;cursor:pointer; float: left;" onclick="xoaClassDangChua(';
                  htmlstr += $(this).val();
                  htmlstr += ')"> X';
                  htmlstr += '</div>';

                  htmlstr += '</div>';
                  $("#khung-chua-hien-thi-class-id").append(htmlstr);
              }
              
              

            });
            function xoaClassDangChua(idclass)
            {
              var giaTriXoa = "#id-class-dang-chua"+ idclass;
              var manggiaTri = $("#id-khung-chua-id-class").val().split("/");
              var giaTriTaoLai = "";
              
              for(var i=0;i<manggiaTri.length;i++)
              {
                
                if((manggiaTri[i] != idclass) && (manggiaTri[i] != 0))
                {
                  giaTriTaoLai = giaTriTaoLai + manggiaTri[i] + "/"; 
                }
                
                
              }
              $("#id-khung-chua-id-class").val(giaTriTaoLai);
              $(giaTriXoa).remove();
            }
            $("#khung-chua-hien-thi-class-id").focus(function(){
              $("#khung-hien-thi-class-child-id").css("display","block");
            });
            $("#khung-chua-hien-thi-class-id").blur(function(){
              $("#khung-hien-thi-class-child-id").css("display","none");
            });

            $(".content-icon-notification").focus(function(){
              
              $(this).find(".khung-chon-icon-notifi").css("display","block");
            });
            $(".content-icon-notification").blur(function(){
              $(this).find(".khung-chon-icon-notifi").css("display","none");
            });

            $(".khung-chua-noi-dung-notifi").hover(function(){
              $(this).find(".khung-chua-tweet-sendag").css("display","block");
            },function(){
              $(this).find(".khung-chua-tweet-sendag").css("display","none");
            });

            function DoiHinhAnh(giaTriDoi,idDoi)
            {
                var idCanDoi = "#khung-chua-icon-id" + idDoi;
                if(giaTriDoi == 1)
                {
                  $(idCanDoi).css("backgroundPosition","0px -71px");
                }
                if(giaTriDoi == 2)
                {
                  $(idCanDoi).css("backgroundPosition","0px -148px");
                }
                if(giaTriDoi == 3)
                {
                  $(idCanDoi).css("backgroundPosition","0px 0px");
                  
                }
                if(giaTriDoi == 4)
                {
                  $(idCanDoi).css("backgroundPosition","0px -228px"); 
                }
                
            }
            
          </script>

               

        </div>
    </div>

@include('classes.partials.modals')	
@endsection