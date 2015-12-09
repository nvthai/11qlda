<?php
    $var_value = "";

    if(isset($_GET['sign-up']))
    {
        $var_value = $_GET['sign-up'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>vRemind</title>
        <link rel="shortcut icon" href="{!! asset('resources/assets/img/ico-tab.png') !!}">
        <meta name="csrf_token" content="{{ csrf_token() }}" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
        {!! Html::style('resources/assets/css/bootstrap.min.css') !!}
        {!! Html::style('resources/assets/css/style.css') !!}
        {!! Html::style('resources/assets/css/main.css') !!}
        {!! Html::script('resources/assets/js/jquery.min.js') !!}
        


    </head>
    <body style="margin:0px;">
        <style>

            .button-signup-google{
                float: left;
                text-align: center;
                width: 89%;
                padding: 10px 0px 10px 0px;
                margin-left: 5%;
                border: 1px solid #e9e8e6;
                color: #A5A5A5;
                border-radius: 4px;
                background-color: white;
                background-image: url('../resources/assets/img/google.svg');
                background-repeat:no-repeat;
                background-position: 21px 11px;
                font-size: 20px;
                cursor: pointer;
            }

            .button-signup-google:hover{
                background-color: #FFFDFA;
            }
            .form-signup-class
            {
                left:28%;
                top:17%;
                width:45%;
                height:auto;
                opacity:0;
            }
            .cachnhau{
                margin: 10px 0px 0px 5%;
                color: black;
                padding: 15px 10px;
            }
            .button-action-signup{
                width: 89%;
                margin-left: 5%;
                margin-top:25px;
                float: left;
                padding: 10px 0px 10px 0px;
                text-align: center;
                font-size:20px;
                color:white;
            }
            .mot-hang-or{
                width: 89%;
                margin-left: 5%;
                float: left;
                margin: 15px 0px 15px 5%;
                position: relative;
                height: 1px;
                background-color: #DADADA;
            }
            .mot-hang-or::after{
                position: absolute;
                content: 'OR';
                background-color: white;
                left: 45%;
                font-size: 12px;
                font-weight: bold;
                top: -6px;
                width: 10%;
                text-align: center;
                color: #CACACA;
            }
            .mau-do{
                color:red;
                width:90%;
                margin-left:5%;
                color: #DC0000;
                font-size: 12px;
                margin-top: 6px;
                display:none;
            }
        </style>
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
                    <div class="button-signup" style="color:white;" onclick="MoKhungSignUpRemind()">
                     Sign up
                    </div>
                    {{--<a href="{{ URL::to('auth/register') }}" style="color:white;text-decoration:none">
                    </a>--}}
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

        

        <!Khung Chua dang ky remind>
        <div class="khung-chua" id="khung-chua-sign-up-remind">
            <div class="phu-mo" onclick="TatKhungChuaSignUpRemind()" style="background-color:rgba(39, 110, 204, 0.57);">
            </div>
            <div class="form-chua form-signup-class" >
                <div class="button-close" onclick="TatKhungChuaSignUpRemind()">
                    X
                </div>
                
                <div class="title-form-chua" style="margin-bottom:25px;">
                    Welcome to Remind
                </div>
                {!! Form::open(array('url' => '/role_picker', 'method' => 'post', 'name' => 'frm_signup')) !!}
                
                <div class="mot-hang" id="firstname-frm">
                    <input type="text" class="input-ben-trong cachnhau"  name="name" placeholder="First name"/>
                    <span class="mot-hang mau-do"></span>
                </div>
                <div class="mot-hang" id="lastname-frm">
                    <input type="text" class="input-ben-trong cachnhau"  name="lasttname" placeholder="Last name"/>
                    <span class="mot-hang mau-do"></span>
                </div>
                 <div class="mot-hang" id="email-frm">
                    <input type="text" class="input-ben-trong cachnhau mail"  name="email" placeholder="Email"/>
                    <span class="mot-hang mau-do"></span>
                </div>
                 <div class="mot-hang" id="pass-frm">
                    <input type="password" class="input-ben-trong cachnhau"  name="pass" placeholder="Password"/>
                    <span class="mot-hang mau-do"></span>
                </div>
                
 
                <div class='mot-hang'>
                    <span class='button-signup button-action-signup' style="width:85%;" onclick="SubmitForm()">
                           Sign up
                    </span>
                </div>
                {!! Form::close() !!}

                <div class="mot-hang-or" style="width:85%;">
                </div>

                <div class='mot-hang'>
                    <span class='button-signup-google' style="width:85%;">
                           Sign up with Google
                    </span>
                </div>

                <div class='mot-hang' style="color:#CACACA;font-size:10px;margin-top:20px;text-align:center;">
                    By signing up, you agree to our Terms of Service and Privacy Policy
                </div>
                
            </div>
        </div>
        <input type="hidden" name="nduocphepchay" id="duocphepchay" value="0"/>

        <script>
            $(window).load(function(e) {
                <?php
                if($var_value == "true")
                {
                    ?>
                        MoKhungSignUpRemind();
                    <?php
                }
                ?>
                
            });
            function MoKhungSignUpRemind()
            {
                $("#khung-chua-sign-up-remind").css("display","block");
                $("#khung-chua-sign-up-remind").find(".form-signup-class").animate({
                    opacity:'1',
                    top:'10%',
                });

            }

            function TatKhungChuaSignUpRemind()
            {
                $("#khung-chua-sign-up-remind").css("display","none");
                $("#khung-chua-sign-up-remind").find(".form-signup-class").animate({
                    opacity:'0',
                    top:'17%',
                });
                $("#khung-chua-sign-up-remind").find(".input-ben-trong").val("");
                $("#khung-chua-sign-up-remind").find(".mau-do").empty();
                $("#khung-chua-sign-up-remind").find(".mau-do").css("diplay","none");
                $("#khung-chua-sign-up-remind").find(".button-action-signup").text("Sign up");
                            
            }

            function KiemTraTinhDayDu(){
                if($("#firstname-frm").find(".input-ben-trong").val() == "")
                {
                    $("#firstname-frm").find(".mau-do").text("Please tell us your first name");
                    $("#firstname-frm").find(".mau-do").slideDown();
                    $("#duocphepchay").val("1");
                }

                if($("#lastname-frm").find(".input-ben-trong").val() == "")
                {
                    $("#lastname-frm").find(".mau-do").text("Please tell us your lass name");
                    $("#lastname-frm").find(".mau-do").slideDown();
                    $("#duocphepchay").val("1");
                }
                if($("#pass-frm").find(".input-ben-trong").val() == "")
                {
                    $("#pass-frm").find(".mau-do").text("Please choose a password");
                    $("#pass-frm").find(".mau-do").slideDown();
                    $("#duocphepchay").val("1");
                }else{
                    KiemTraPass();
                }
                if($("#email-frm").find(".input-ben-trong").val() == "")
                {
                    $("#email-frm").find(".mau-do").text("Please enter your emal");
                    $("#email-frm").find(".mau-do").slideDown();
                    $("#duocphepchay").val("1");
                }else{
                    KiemTraEmail();
                }
                
            }
            function KiemTraPass()
            {
                if($("#pass-frm").find(".input-ben-trong").val().length<=5)
                {
                    $("#pass-frm").find(".mau-do").text("Password can't be less than 6 characters long.");
                    $("#pass-frm").find(".mau-do").slideDown();
                    $("#duocphepchay").val("2");
                }
            }

            function KiemTraEmail()
            {
                if($("#email-frm").find(".input-ben-trong").val().indexOf('@') != -1){
                    if($("#email-frm").find(".input-ben-trong").val().indexOf('.') != -1)
                    {
                        if($("#email-frm").find(".input-ben-trong").val().length > 5)
                        {
                            
                        }else{
                            $("#email-frm").find(".mau-do").text("This email is not invalid");
                            $("#email-frm").find(".mau-do").slideDown();
                            $("#duocphepchay").val("3");
                        }
                    }else{
                        $("#email-frm").find(".mau-do").text("This email is not invalid");
                        $("#email-frm").find(".mau-do").slideDown();
                        $("#duocphepchay").val("3");
                    }
                    
                }else{
                    $("#email-frm").find(".mau-do").text("This email is not invalid");
                    $("#email-frm").find(".mau-do").slideDown();
                    $("#duocphepchay").val("3");
                }
            }

            function KiemTraEmailTrung()
            {
                
                    var url = $(this).attr("data-link");
                  
                    $.ajax({
                        url: url,
                        type:"POST",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: { 
                            typeAjaxData : "checkMail",
                            emailData: $("#email-frm").find(".input-ben-trong").val()
                        },
                        success:function(data){
                            var giatriTraVeSau = JSON.parse(data);
                            if(giatriTraVeSau["emailCoKhong"] == true)
                            {
                                $("#email-frm").find(".mau-do").text("Uh oh! This email is already in use.");
                                $("#email-frm").find(".mau-do").slideDown();
                            
                                $("#khung-chua-sign-up-remind").find(".button-action-signup").text("Sign up");
                                giaTriTong = 0;    
                            }else{

                                $("form[name='frm_signup']").submit();
                            }
                        },error:function(){ 
                            alert("error!!!!");
                            
                        }
                    }); //end of ajax
 
                    
                    
            }
            var giaTriTong = 0;

            function SubmitForm()
            {
                giaTriTong = giaTriTong + 1;
                if(giaTriTong == 1)
                {
                    $("#duocphepchay").val("0");
                    $("#khung-chua-sign-up-remind").find(".button-action-signup").text("Please wait...");
                    KiemTraTinhDayDu();

                    if($("#duocphepchay").val() == 0)
                    {
                        KiemTraEmailTrung();
                    }else{
                        $("#khung-chua-sign-up-remind").find(".button-action-signup").text("Sign up");
                        giaTriTong = 0;
                    }
                    
                    
                }

                
            }
            
            $(document).ready(function(){
                
                $("#khung-chua-sign-up-remind").find(".input-ben-trong").keypress(function(){
                    var giatricoduoc = $(this).attr("name");
                    
                    switch(giatricoduoc)
                    {
                        case "firstname":
                            if($(this).val() != "")
                            {
                                $("#firstname-frm").find(".mau-do").empty();
                                $("#firstname-frm").find(".mau-do").css("display","none");
                            }
                            
                            break;
                        case "lasttname":
                            if($(this).val() != "")
                            {
                                $("#lastname-frm").find(".mau-do").empty();
                                $("#lastname-frm").find(".mau-do").css("display","none");
                            }
                            
                            break;
                        case "email":
                            if($(this).val().indexOf('@') != -1)
                            {
                                if($(this).val().indexOf('.') != -1)
                                {
                                    if($(this).val().length > 5)
                                    {
                                        $("#email-frm").find(".mau-do").empty();
                                        $("#email-frm").find(".mau-do").css("display","none");
                                    }
                                }
                            }
                            break;
                        case "pass":
                            if($(this).val().length > 5)
                            {
                                $("#pass-frm").find(".mau-do").empty();
                                $("#pass-frm").find(".mau-do").css("display","none");
                            }
                            break;
                    }
                });

                
            });
        </script>
        
        </div>
    </body>
</html>