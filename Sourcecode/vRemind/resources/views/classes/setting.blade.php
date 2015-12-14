@extends('layout.default')

@section('left-sidebar')
    @include('classes.partials.leftsidebar-setting')
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
        <div class="mot-hang-70">
            <span class="mot-hang-chu-title">
              
            </span>
            <span class="mot-hang-chu-description">
            
            </span>
        </div>
        <div class="button-setting icon-an-noi-dung" data-target="#editClassModal" data-toggle="modal" aria-haspopup="true">
            <div class="noidung-icon" style="left:-32px;">
                Thiết lập Lớp
            </div>
        </div>
        
        <div class="mot-hang" >
            <div class="panel-body">
            </div>
        @if (Auth::user()->hasRole('teacher'))        
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/classes/deleteAccount') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class='btn btn-danger btn-xs' style="    color: #d9534f;
                    background-color: white; padding: 10px 18px; font-size: 14px;
                    font-weight: bold;" type="submit" name="remove_levels" value="delete"><span class="fa fa-times"></span> Xóa tài khoản</button>         
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


              

        </div>

    </div>




@endsection