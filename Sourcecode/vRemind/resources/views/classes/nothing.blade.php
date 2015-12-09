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
        	<h2>GET STARTED!</h2>
        <div class="main-area" style="margin-top: 90px;">
            <div>
            	 <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#addClassModal" aria-haspopup="true" >
                        Add a Class
                </span>
                or 
                <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#joinClassModal" aria-haspopup="true" >
                        Join a class
                </span>
                to start using Remind.
            </div>
               

@include('classes.partials.modalsnothing')	
@endsection