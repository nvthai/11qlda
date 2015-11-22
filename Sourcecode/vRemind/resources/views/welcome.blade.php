<?php
// $var_value = "";


// if(isset($_GET['signup']))
// {
//     $var_value = $_GET['signup'];
// }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>vRemind</title>
        <link rel="shortcut icon" href="{!! asset('resources/assets/img/ico-tab.png') !!}">

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
        {!! Html::style('resources/assets/css/bootstrap.min.css') !!}
        {!! Html::style('resources/assets/css/style.css') !!}
        {!! Html::style('resources/assets/css/main.css') !!}
        {!! Html::script('resources/assets/js/jquery.min.js') !!}

        <style>
            .input-ben-trong{
                padding:15px 10px;
            }
        </style>
    </head>
    <body>

{{--         <div class="container">
            <div class="content">
                <div class="title">
                    <h3>Software Project Management</h3>
                    <p> vRemind - Nhóm 11 </p>
                </div>

                <div class="button">
                     <a href="{{ URL::to('auth/register') }}" class="btn btn-primary btn-lg">Đăng ký</a>
                     <a href="{{ URL::to('auth/login') }}" class="btn btn-default btn-lg">Đăng nhập</a>
                </div>
            </div>
        </div> --}}

        <div class="background-all-login">
        
        <div class="mot-hang" >
            {!! Html::image('resources/assets/img/logo1.png','image') !!}
            <a href="{{ URL::to('auth/login') }}" style="text-decoration:none;color:white;">
                <div class="button-login">
                         Log in
                </div>
            </a>
        </div>
        <div class="mot-hang">
            <div class="mot-hang-30" style="height:10px;">
                
            </div>
            <div class="mot-hang-70" style="text-align:center;">
                {!! Html::image('resources/assets/img/logo2.svg','image',array('height' => '40px')) !!}
                <div class="mot-hang" style="    color: white;
    font-size: 55px;     font-family: inherit;
    white-space: nowrap;">
                    Reach students and parents <br /> where they are.
                </div>
                
                <div class="mot-hang" style="color: white;
    margin-top: 70px;  font-size: 20px;
    font-family: inherit;
    letter-spacing: -0.5px; margin-bottom: 10px;">
                    Free for teachers. Always
                </div>
                <div class='mot-hang' style="width: 40%;margin-left: 30%;">
                    <div class="button-signup" style="color:white;" onclick="OpenSignUp()">
                        Sign up
                    </div>
                    
                    
                </div>
                <div class='mot-hang-50' style="margin-left:25%;margin-top:30px;color:white;">
                    <span class='mot-hang-50' style="font-size:20px;font-weight:bold;">
                        15 seconds
                    </span>
                    <span class='mot-hang-50' style="font-size:20px;font-weight:bold;">
                        1 in 5 teachers
                    </span>
                    <span class='mot-hang-50' >
                        to sign up
                    </span>
                    <span class='mot-hang-50'>
                        in the U.S use Remind
                    </span>
                </div>
                <div class="mot-hang" style="margin-top:50px;color:white;text-align:center;">
                    <font style="margin-right:25px;">#TeachSmall</font> <font style="margin-right:25px;">Terms & Privacy</font> <font>More</font> 
                </div>
            </div>        
        </div>

        
        <!Khung Chua sign up remind>
        <div class="khung-chua" id="khung-chua-signup-remind">
            <div class="phu-mo" style="background-color:rgba(39, 110, 204, 0.73);" onclick="TatKhungChuaSignUpRemind()">
            </div>
            <div class="form-chua form-sign-up-class">
                <div class="button-close" onclick="TatKhungChuaSignUpRemind()">
                    X
                </div>
                <div >
                    
                </div>
                <div class="title-form-chua">
                    Welcome to Remind
                </div>
                <div class="mot-hang" style="margin-top:35px;">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Thông tin bạn nhập vào không đúng. Vui lòng kiểm tra lại.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                        {!! csrf_field() !!}
                        <div class="mot-hang" style="width:95%;margin:0px 0px 20px 4%;">
                           <input type="text" class="input-ben-trong" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="mot-hang" style="width:95%;margin:0px 0px 20px 4%;">
                           <input type="email" class="input-ben-trong" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="mot-hang" style="width:95%;margin:0px 0px 20px 4%;">
                           <input type="password" class="input-ben-trong" name="password">
                        </div>
                        <div class="mot-hang" style="width:95%;margin:0px 0px 20px 4%;">
                           <input type="password" class="input-ben-trong" name="password_confirmation">
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng ký
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php
            // if($var_value == "true")
            // {
            //     echo "<script type=\"text/javascript\"> alert(\"Opend Sign Up\") </script>";
            // }
        ?>
        
        </div>



        <script type="text/javascript">
        function OpenSignUp()
        {
            $("#khung-chua-signup-remind").css("display","block");
            $(".form-sign-up-class").animate({top: "10%",opacity: "1"});
        }
        function TatKhungChuaSignUpRemind()
        {
            $("#khung-chua-signup-remind").css("display","none");   
            $(".form-sign-up-class").animate({top: "15%",opacity: "0.4"});
        }
        </script>
    </body>
</html>