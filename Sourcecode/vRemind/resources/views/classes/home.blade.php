@extends('layout.default')

@section('left-sidebar')
    @include('classes.partials.leftsidebar')
@endsection

@section('right-sidebar')
    @include('classes.partials.rightsidebar')
@endsection

@section('content')

    <div class="mot-hang">
        <img alt="image-main" style="float:left;margin-right:15px;" src="{!! Session::get('sesClassId')->icon !!}" height="65px"/>
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
                    <input type="text" class="form-control" id="toClass" name="toClass" placeholder="{!!Session::get('sesClassId')->class_name!!}">
                    <select>
                      <option value="volvo">Volvo</option>
                      <option value="saab">Saab</option>
                      <option value="opel">Opel</option>
                      <option value="audi">Audi</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="content" rows="3" placeholder="Type your annoucement to Class {!!Session::get('sesClassId')->class_name!!}"></textarea>
              </div>
              <div class="form-group">
                <input type="file" name="file">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="datetime-local" name="bdaytime">
              </div>
              <button  type="submit" class="btn btn-primary">Send</button>
           
            </form>



        </div>
    </div>


    <!--Can chinh sua giao dien o day-->
    <div class="group-list">
      {{Session::get('sesClassId')->class_id}}
        @foreach($notifications as $noti)
          @if($noti->class_id == Session::get('sesClassId')->class_id)
            <div>           
              <?php 
                $sender = vRemind\User::find($noti->sender_id); 
                $name = $sender->name;
              ?>
              {{$name}}
            </div>
            <div>
              {{$noti->created_at}}
            </div>
            <div>
              {{$noti->content}}
            </div>
            <div>
              <img src="{!! $noti->file !!}"   style="width:304px;height:228px;">
            </div>
           @endif
        @endforeach
      
      </div>

@include('classes.partials.modals')	
@endsection