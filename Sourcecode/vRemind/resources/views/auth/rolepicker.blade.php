<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-pjax-version" content="v123">
    <title>@yield('titlePage') </title>
    
    
    <link rel="shortcut icon" href="{!! asset('resources/assets/img/ico-tab.png') !!}">

    {!! Html::style('resources/assets/css/bootstrap.min.css') !!}
    {!! Html::style('resources/assets/css/style.css') !!}
    {!! Html::style('resources/assets/css/main.css') !!}
    {!! Html::script('resources/assets/js/jquery-1.11.1.min.js') !!}

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
        <div class="mot-hang-gan-tren" style="padding:10px 0px 10px 0px; background-color:#4a89dc;">
            <img alt="image" src="../resources/assets/img/logo.svg" height="25px" style="margin: 13px 0px 0px 20px;"/>
            <a href="./?sign-up=true" class="button-signup1" style="text-decoration:none; float:right;margin-right:20px;">
                Sign up
            </a>
        </div>

        <div class="mot-hang" style="background-color:#FAFAF9;">
            <div class="mot-hang-content" style="text-align:center;height:100%;">
                <div class="mot-hang" style="    margin-top: 125px;
    font-size: 20px; color: #5D5D5D;margin-bottom: 5px;">
                    Tell us about yourself
                </div>
                
                <div class="khung-chua-chucvu" style="height:145px;" onclick='submitRole("teacher")'>
                    <div class="khung-chua-icon" style="width:23%;">
                        <img alt="image" src="../resources/assets/img/teacher.svg"/>
                    </div>
                    <div class="mot-hang" style="text-align:center;margin-top:15px;">
                        I'm a teacher
                        
                    </div>
                </div>
                 
                <div class="khung-chua-chucvu" style="height:145px;" onclick='submitRole("student")'>
                    <div class="khung-chua-icon" style="width:23%;">
                        <img alt="image" src="../resources/assets/img/student.svg"/>
                    </div>
                    <div class="mot-hang" style="text-align:center;margin-top:15px;">
                        I'm a student
                        
                    </div>
                </div>
                
                <div class="khung-chua-chucvu" style="height:145px;" onclick='submitRole("parent")'>
                    <div class="khung-chua-icon" style="width:23%;">
                        <img alt="image" src="../resources/assets/img/parent.svg"/>
                    </div>
                    <div class="mot-hang" style="text-align:center;margin-top:15px;">
                        I'm a parent
                        
                    </div>
                </div>
            </div>
            
        </div>
        {!! Form::open(array('url' => '/addRole', 'method' => 'POST' , 'name' => 'frm_chooserole')) !!}
            <input type="hidden" id="id-role" name="roleofuser"/>
            <input type="hidden" name="iduser" value={{ $idUser }}/>
        {!! Form::close() !!}
        
        
        <script>
        function submitRole(giaTri)
        {
            $("#id-role").val(giaTri);
            $("form[name='frm_chooserole']").submit();
        }

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