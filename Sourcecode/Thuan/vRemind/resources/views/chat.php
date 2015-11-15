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
            <img alt="image" src="img/logo.svg" height="25px" style="float:left;margin: 13px 25px 0px 20px;"/>
            <a class="button-class-chat" href="classes.php">
                Classes
            </a>
            <div class="button-class-chat class-chat-select" >
                Chat
            </div>
            
            <div style="float:right;">
                <div class="help-icon icon-an-noi-dung">
                    <div class="noidung-icon" style="left:-18px;">
                        Help
                    </div>
                </div>
                
                <div class="share-icon icon-an-noi-dung">
                    <div class="noidung-icon" style="left:-47px;">
                        Share Remind
                    </div>
                </div>
                <div class="myaccount-icon icon-an-noi-dung">
                    <div class="noidung-icon" style="left:-40px;">
                        My account
                    </div>
                    
                    <ul class="Menu-list">
                        <li class="Menu-child menu-sett">
                            Settings
                        </li>
                        <li class="Menu-child menu-notifi">
                            Notifications
                        </li>
                        <li class="Menu-child menu-chat">
                            Chat
                        </li>
                        <li class="Menu-child menu-widget">
                            Widgets
                        </li>
                        <li class="Menu-child menu-print">
                            Print
                        </li>
                        <li class="Menu-child menu-logout">
                            Log out
                        </li>
                    </ul>
                </div>
                    
            </div>
            
       </div>
        
        <div class="classes-main-left">
            Noi dung chat
        </div>
        <div class="classes-main-right" >
            Chat o day
        </div>
        
        
        <script>
            $(".icon-an-noi-dung").mouseover(function(){
                $(this).find(".noidung-icon").fadeIn("slow");
            });
            $(".icon-an-noi-dung").mouseout(function(){
                $(this).find(".noidung-icon").css("display","none");
            });
            
            
            
            $(".myaccount-icon").attr("tabindex",-1).focus(function(){
                $(this).find(".noidung-icon").css("display","none");
                $(this).find(".Menu-list").fadeIn();
            });
            
            $(".myaccount-icon").attr("tabindex",-1).blur(function(){
              
                $(this).find(".Menu-list").css("display","none");
            });
        </script>
        
    </body>
</html>