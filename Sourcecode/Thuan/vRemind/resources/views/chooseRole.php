

<html>
    <head>
        <meta charset="UTF-8">
        <title>Remind</title>
        <link rel="shortcut icon" href="img/ico-tab.png">
        <link rel="stylesheet" href="css/main.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
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


