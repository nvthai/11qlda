@extends('layout.defaultLogin')
@section('titlePage')
	Select role
@endsection
@section('content')
    <div class="mot-hang" style="background-color:#FAFAF9;">
        <div class="mot-hang-content" style="text-align:center;height:100%;">
            <div class="mot-hang" style="margin-top: 125px;
font-size: 20px; color: #5D5D5D;margin-bottom: 5px;">
                Tell us about yourself
            </div>
            
            <div class="khung-chua-chucvu">
                <div class="khung-chua-icon">
                    <img alt="image" src="../resources/assets/img/teacher.svg"/>
                </div>
                <div class="mot-hang" style="text-align:center;margin-top:15px;">
                	{!! Form::open(array('route' => 'role.selected')) !!}
						{!! Form::hidden('role', 'teacher') !!}
						{!! Form::submit('I\'m a teacher', array('class' => 'btn')) !!}
					{!! Form::close() !!}
                </div>
            </div>
            
            <div class="khung-chua-chucvu">
                <div class="khung-chua-icon">
                    <img alt="image" src="../resources/assets/img/student.svg"/>
                </div>
                <div class="mot-hang" style="text-align:center;margin-top:15px;">
                	{!! Form::open(array('route'=> 'role.selected')) !!}
						{!! Form::hidden('role', 'student') !!}
						{!! Form::submit('I\'m a student', array('class' => 'btn', 'image' => '../resources/assets/img/student.svg')) !!}
					{!! Form::close() !!}
                </div>
            </div>
            
            <div class="khung-chua-chucvu">
                <div class="khung-chua-icon">
                    <img alt="image" src="../resources/assets/img/parent.svg"/>
                </div>
                <div class="mot-hang" style="text-align:center;margin-top:15px;">
					{!! Form::open(array('route' => 'role.selected')) !!}
						{!! Form::hidden('role', 'parent') !!}
						{!! Form::submit('I\'m a parent', array('class' => 'btn')) !!}
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(".khung-chua-chucvu").mouseover(function(){
           $(this).css("background-color","#ECECEC");
           $(this).find(".khung-chua-icon").css("background-color","white"); 
        });
        $(".khung-chua-chucvu").mouseout(function(){
           $(this).css("background-color","white");
           $(this).find(".khung-chua-icon").css("background-color","#fafaf9"); 
        });
    </script>
@endsection