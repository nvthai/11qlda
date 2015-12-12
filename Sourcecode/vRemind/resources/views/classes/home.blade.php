@extends('layout.default')

@section('left-sidebar')
    @include('classes.partials.leftsidebar')
@endsection

@section('right-sidebar')
    @include('classes.partials.rightsidebar')
@endsection

@section('content')
      
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
                <div class="input-group">
                    <span class="input-group-addon">Đến: </span>
                    <input type="text" class="form-control" id="toClass" name="toClass" placeholder="{!!Session::get('sesClassId')->class_name!!}" disabled>
                </div>
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
                  left: -129px;
                  top: 85%;
                  padding: 11px 11px;
                  border-radius: 7px;
                  background-color: rgba(0, 0, 0, 0.78);
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
            ?>
            @foreach($notifications as $noti)                        
              @if($noti->class_id == Session::get('sesClassId')->class_id)
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