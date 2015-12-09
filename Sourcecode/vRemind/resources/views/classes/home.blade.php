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
               {{Session::get('sesClassId')->email}}
            </span>
        </div>
        <div class="button-setting icon-an-noi-dung" data-target="#editClassModal" data-toggle="modal" onclick="MoTrangAddClass()" aria-haspopup="true">
            <div class="noidung-icon" style="left:-32px;">
                Class settings
            </div>
        </div>
        
        <div class="main-area" style="margin-top: 90px;">
            <div class="panel-body">
                {{-- You are logged in! --}}
                {{-- $user = auth(); --}}
                @if (Auth::user()->hasRole('teacher'))
                    Teacher                     
                @elseif (Auth::user()->hasRole('student'))
                    Student
                @else
                    Parent
                @endif
            </div>
                
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/classes/upload') }}">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">To: </span>
                    <input type="text" class="form-control" id="toClass" name="toClass" placeholder="{!!Session::get('sesClassId')->class_name!!}" disabled>
                </div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="content" rows="3" placeholder="Type your annoucement to {!!Session::get('sesClassId')->class_name!!}"></textarea>
              </div>
              <div class="btn-group" role="group" aria-label="...">
                <input type="file" name="file" class="btn btn-default">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="datetime-local" name="bdaytime" class="btn btn-default" style="width: 200px;">
              </div>
              <button  type="submit" class="btn btn-primary">Send</button>            
            </form>
            
    <!--Can chinh sua giao dien o day-->
        
          
            @foreach($notifications as $noti)                        
              @if($noti->class_id == Session::get('sesClassId')->class_id)
              <div class = "panel panel-default" style="margin-top: 20px;">
                <div style="padding-left: 15px; padding-top: 15px;">
                  <?php 
                    $sender = vRemind\User::find($noti->sender_id); 
                    $name = $sender->name;
                  ?>
                <b> {{$name}}</b>
                </div>
                <div style="padding-left: 15px;">
                  {{$noti->created_at}}
                </div>
                <div class = "panel-body">
                  {{$noti->content}}
                </div>
                @if($noti->file != null)
                <div class = "panel-body">
                  <img src="{!! $noti->file !!}"   style="width:304px;height:228px;">
                </div>

                @endif
              </div>
               @endif          
            @endforeach
          
          



        </div>
    </div>

@include('classes.partials.modals')	
@endsection