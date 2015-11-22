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
        <div class="mot-hang-gan-tren" style="padding:10px 0px 10px 0px; background-color:#4a89dc;">
            <img alt="image" src="img/logo.svg" height="25px" style="margin: 13px 0px 0px 20px;"/>
            <a href="index.php?signup=true" class="button-signup1" style="text-decoration:none; float:right;margin-right:20px;">
                Log in
            </a>
        </div>
        <div class="mot-hang" style="background-color:#FAFAF9;">
            <div class="mot-hang-content" style="text-align:center;height:100%;">
                <div class="mot-hang" style="    margin-top: 125px;
    font-size: 20px; color: #5D5D5D;margin-bottom: 5px;">
                    Tell us about yourself
                </div>
                
                <div class="khung-chua-chucvu">
                    <div class="khung-chua-icon">
                        <img alt="image" src="img/teacher.svg"/>
                    </div>
                    <div class="mot-hang" style="text-align:center;margin-top:15px;">
                        I'm a teacher
                        
                    </div>
                </div>
                
                <div class="khung-chua-chucvu">
                    <div class="khung-chua-icon">
                        <img alt="image" src="img/student.svg"/>
                    </div>
                    <div class="mot-hang" style="text-align:center;margin-top:15px;">
                        I'm a student
                        
                    </div>
                </div>
                
                <div class="khung-chua-chucvu">
                    <div class="khung-chua-icon">
                        <img alt="image" src="img/parent.svg"/>
                    </div>
                    <div class="mot-hang" style="text-align:center;margin-top:15px;">
                        I'm a parent
                        
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
    </body>
</html>