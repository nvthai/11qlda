@extends('layout.default')



@section('left-sidebar')
    @include('classes.partials.leftsidebarnothing')
@endsection
@section('content')      
    <div class="mot-hang" style="font-family: cursive; font-size:13px; width:97%;margin-left:3%;">
        <div class="mot-hang-70">
            <span class="mot-hang-chu-title">
            </span>
            <span class="mot-hang-chu-description">
            </span>
        </div>      
        	<h2>BẮT ĐẦU!</h2>
        <div class="main-area" style="margin-top: 90px;">
            <div>
                @if (Auth::user()->role == 'teacher') 
                <div>
                @if (Auth::user()->hasRole('teacher'))
                    <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#addClassModal" aria-haspopup="true" >
                        Tạo lớp mới
                    </span>
                    <div>hoặc</div>
                    <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#joinClassModal" aria-haspopup="true" >
                        Tham gia vào lớp học
                    </span>                     
                @elseif (Auth::user()->hasRole('student'))
                     <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#joinClassModal" aria-haspopup="true" >
                        Tham gia vào lớp học
                    </span>
                @else
                </div>
                hoặc
                @endif
                <div> 
                @endif
                    <div> để bắt đầu sử dụng vRemind.</div>
                </div>
                </div>
            </div>
               

@include('classes.partials.modalsnothing')	
@endsection