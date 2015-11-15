@extends('layout.default')
<html>
    <head>
        <meta charset="UTF-8">
        <title>vRemind</title>
        <link rel="shortcut icon" href="{!! asset('resources/assets/img/ico-tab.png') !!}">
		{!! Html::style('resources/assets/css/main.css') !!}
        {!! Html::script('resources/assets/js/jquery.min.js') !!}
		
    </head>
	<body>
	@section('content')
        <div class="mot-hang-gan-tren" style="padding:10px 0px 10px 0px; background-color:#4a89dc;">
            {!! Html::image('resources/assets/img/logo.svg','image',array('height' => '25px')) !!}
            <div class="button-class-chat class-chat-select">
                Classes
            </div>
            <a class="button-class-chat" href="chat.php">
                Chat
            </a>
            
            
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
            <div class="class-ow-jo" style="margin-top:30px;">
                <div class="mot-hang" >
                    
                    <span class="chu-class">
                        CLASSES OWNED
                    </span>
                    
                    
                    <div class="button-add icon-an-noi-dung" onclick="MoTrangAddClass()">
                        +
                        <div class="noidung-icon" style="left: -34px;
                            top: 50px;font-size: 15px;">
                            Add a class
                        </div>
                    </div>
                </div>
                <ul class="menu-class">
                    <li class="menu-class-child class-selected">
						{!! Html::image('resources/assets/img/classesAvatar/avatar_baseball.png','avatarclass') !!}
                        <font>
                            Phân tích thiết kế phần mềm
                        </font>
                        
                    </li>
                    <li class="menu-class-child">
                        
                        {!! Html::image('resources/assets/img/classesAvatar/avatar_apple_default.png','avatarclass') !!}
                        <font>
                            Thiết kế dữ liệu và giải thuật
                        </font>
                    </li>
                    <li class="menu-class-child">
                        
						{!! Html::image('resources/assets/img/classesAvatar/avatar_history.png','avatarclass') !!}
                        <font>
                             Lập trình ứng dụng
                        </font>
                    </li>
                </ul>
            </div>
            <div class="class-ow-jo" style="margin-top:50px;">
                <div class="mot-hang" >
                    <span class="chu-class">
                        CLASSES JOINED
                    </span>
                    <div class="button-add icon-an-noi-dung" onclick="MoTrangJoinClass()">
                        +
                        <div class="noidung-icon" style="left: -34px;
                            top: 50px;font-size: 15px;">
                            Join a class
                        </div>
                    </div>
                </div>
                <ul class="menu-class">
                    
                </ul>
            </div>
        </div>
        <div class="classes-main-right" >
            <div class="mot-hang-70" style= "height:2px;">
                <div class="mot-hang">
                    
					 {!! Html::image('resources/assets/img/avatar_baseball.png','image-main',array('height' => '65px')) !!}
                    <div class="mot-hang-70">
                        <span class="mot-hang-chu-title">
                            Phân tích thiết kế phần mềm
                        </span>
                        <span class="mot-hang-chu-description">
                            @phantc231
                        </span>
                    </div>
                    <div class="button-setting icon-an-noi-dung" onclick="MoKhungChuaClassSetting()">
                        <div class="noidung-icon" style="left:-32px;">
                            Class settings
                        </div>
                    </div>
                </div>
            </div>
            <div class="mot-hang-30"> 
                <div class="mot-hang">
                    <div class="button-add-student-parent">
                        <div class="button-add-student-parent-left" onclick="MoFormAddParents()">
                            Add students and parents
                        </div>
                        <div class="button-add-student-parent-right icon-an-noi-dung">
                            <div class="noidung-icon" style="left:-42px;">
                                Download PDF </br> instructions
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="mot-hang chat-title">
                    3 PARTICIPANTS
                    <div class="button-search-chat">
                        
                    </div>
                </div>
            </div>
            
        </div>
        
        
        <!Khung chua add parents, student>
        <div class="khung-chua" id="khung-chua-add-parents">
            <div class="phu-mo" onclick="TatKhungChuaAddParents()">
            </div>
            <div class="form-chua form-add-parents">
                <div class="button-close" onclick="TatKhungChuaAddParents()">
                    X
                </div>
                <div class="title-form-chua">
                    Add student and parents to Phan Tich Thiet Ke
                </div>
                
                <div id="class-download-app">
                    <div class="mot-hang"   style="margin-top:30px; 
                       border-bottom:1px solid rgba(128, 128, 128, 0.42);">
                    <div class="mot-hang-20 tab-ben-trai" onclick="MoFormDownLoadApp()" style="border-bottom:6px solid rgba(0, 43, 255, 0.55); ">
                        Download App
                    </div>
                    <div class="mot-hang-20 tab-ben-phai" onclick="MoFormSendInvitation()" style="cursor:pointer;">
                        Send invitations
                    </div>
                    </div>

                    <div style="padding:10px 5% 0px 5%;float:left;width:90%;">
                        <div class="mot-hang" style="margin-top:20px;">
                            Students and parents can scan the QR code below to download the free </br>
                            Remind app on their mobile devices
                        </div>
                        <div class="mot-hang" style="text-align:center;margin:25px 0px 25px 0px;">
                            
							{!! Html::image('resources/assets/img/iconScan.png','image-scan',array('width' => '300px')) !!}
                        </div>
                        <div class="mot-hang">
                            <div class="mot-hang-30" style="text-align:center;margin:0px 4% 0px 15%;cursor:pointer;">
                                
								{!! Html::image('resources/assets/img/appStore.png','image-scan',array('width' => '200px')) !!}
                            </div>
                            <div class="mot-hang-30" style="text-align:center;margin:0px 15% 0px 4%; cursor:pointer;">
                                
								{!! Html::image('resources/assets/img/playStore.png','image-scan',array('width' => '200px')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="class-send-invitations" style="display:none;">
                    <div class="mot-hang"   style="margin-top:30px; 
                       border-bottom:1px solid rgba(128, 128, 128, 0.42);">
                    <div class="mot-hang-20 tab-ben-trai" onclick="MoFormDownLoadApp()" style="cursor:pointer; ">
                        Download App
                    </div>
                    <div class="mot-hang-20 tab-ben-phai" onclick="MoFormSendInvitation()" style="border-bottom:6px solid rgba(0, 43, 255, 0.55);">
                        Send invitations
                    </div>
                    </div>
                    <div style="padding:10px 5% 0px 5%;float:left;width:90%;">
					
                            <p align="center"" style ="margin-left: 10; margin-right: 5;  margin-top: 10; margin-bottom: 16"> Enter email addresses</p>

							<p align="left"" style ="margin-left: 10; margin-right: 5;  margin-top: 16; margin-bottom: 16; font-size:13px"> 
							Separate phone numbers and email addresses with commas, semicolons, or returns. You can also copy and paste from a spreadsheet. Want to watch how?
							</p>
							<div class="mot-hang">
                                
                                <input name="SendInvitation" type="text" cols="40" rows="5" value="" class="input-SendInvitation"/>
                           
                            </div>

							<p align="left"" style ="margin-left: 10; margin-right: 5;  margin-top: 16; margin-bottom: 16; font-size:13px"> 
							Invitations won't be sent from your personal email address. By sending invitations, you acknowledge that you've been given permission to reach out to your contacts. You also agree that you won't use this service for commercial purposes.</p>
							
							<div class="mot-hang" style="margin:10px 20px 10px 20px;">
                                <button type="submit" class="button-sendInvitation" >Send Invatations</button>
                            </div>
                    </div>
                        
                </div>
            </div>
        </div>
        
        <!Khung chua edit, setting class>
        <div class="khung-chua" id="khung-chua-edit-class">
            <div class="phu-mo" onclick="TatKhungChuaEditClass()">
            </div>
            <div class="form-chua form-setting-class">
                <div class="button-close" onclick="TatKhungChuaEditClass()">
                    X
                </div>
                <div class="title-form-chua">
                    Class settings
                </div>
                
                <div id="class-setting-information">
                    <div class="mot-hang"   style="margin-top:30px;  
                       border-bottom:1px solid rgba(128, 128, 128, 0.42);">
                    <div class="mot-hang-20 tab-ben-trai" onclick="MoFormSettingInformation()" style="border-bottom:6px solid rgba(0, 43, 255, 0.55); ">
                        Information
                    </div>
                    <div class="mot-hang-20 tab-ben-phai" onclick="MoFormSettingOwner()" style="cursor:pointer;">
                        Owners
                    </div>
                    </div>

                    <div style="padding:10px 5% 0px 5%;float:left;width:90%;">
                        <div class="mot-hang" style="margin-top:30px;">
                            <div class="mot-hang-30">
                               
								{!! Html::image('','image-random',array('width' => '90px')) !!}
                                
                                
                            </div>
                            <div class="mot-hang-70">
                                <form>
                                    <span class="mot-hang label">
                                        Class name
                                    </span>
                                    <span class="mot-hang" style="margin-bottom:20px;">
                                        <input name="className" value="e.g. Math101" style="padding: 15px 10px;" class="input-ben-trong"
                                               type="text"/>
                                        <span class="mot-hang validator">
                                            The name must be at least 3 characters long.
                                        </span>
                                    </span>


                                    <span class="mot-hang label">
                                        Class code
                                    </span>
                                    <span class="mot-hang">
                                        <div style="text-align:center;height:46px;
                                             line-height:46px;margin-left:4%;border:1px solid #C3C3C3;
                                             border-right:none ;font-size:20px;
                                             float:left; width:15%; border-top-left-radius: 7px;
                                             border-bottom-left-radius: 7px;">
                                            @
                                        </div>
                                        <div style="float:left;width:80%;">
                                            <input name="classCode" style="padding: 15px 10px; margin:0;
                                                   border-top-left-radius: 0px;border-bottom-left-radius: 0px;
                                                   width:88%;" 
                                                   class="input-ben-trong"   type="text"/>
                                        </div>
                                    </span>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div id="class-setting-owner" style="display:none;">
                    <div class="mot-hang"   style="margin-top:30px;  
                       border-bottom:1px solid rgba(128, 128, 128, 0.42);">
                        <div class="mot-hang-20 tab-ben-trai" onclick="MoFormSettingInformation()" style="cursor:pointer; ">
                        Information
                    </div>
                    <div class="mot-hang-20 tab-ben-phai" onclick="MoFormSettingOwner()" style="border-bottom:6px solid rgba(0, 43, 255, 0.55);">
                        Owners
                    </div>
                    </div>

                    <div  style="padding:10px 5% 0px 5%;float:left;width:90%;">
                        MR. VuHung
                        
                        <div class="mot-hang" style="margin-top:15px; 
                            padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
                     
                        </div>
                        
                        <div class="mot-hang">
                            <div class="button-add icon-an-noi-dung" style="float:left;" onclick="MoTrangJoinClass()">
                                +
                                <div class="noidung-icon" style="left: -34px;
                                    top: 50px;font-size: 15px;">
                                    Class owner must be 
                                </div>
                            </div>
                            Add class owner
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        <!Khung chua join class>
        <div class="khung-chua" id="khung-chua-join-class">
            <div class="phu-mo" onclick="TatKhungChuaJoinClass()">
            </div>
            <div class="form-chua form-join-class">
                <div class="button-close" onclick="TatKhungChuaJoinClass()">
                    X
                </div>
                <div class="title-form-chua">
                    Join a class
                </div>
                <div class="mot-hang" style="margin-top:15px; 
                      padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
                     
                </div>
                <div class="mot-hang" style="margin-top:35px;">
                    <form>
                        <span class="mot-hang label">
                            Enter class code
                        </span>
                        <span class="mot-hang">
                            <div style="text-align:center;height:46px;
                                     line-height:46px;margin-left:4%;border:1px solid #C3C3C3;
                                     border-right:none ;font-size:20px;
                                     float:left; width:15%; border-top-left-radius: 7px;
                                     border-bottom-left-radius: 7px;">
                                    @
                            </div>
                            <div style="float:left;width:80%;">
                                    <input name="classCode" style="padding: 15px 10px; margin:0;
                                           border-top-left-radius: 0px;border-bottom-left-radius: 0px;
                                           width:88%;" 
                                           class="input-ben-trong" id="class-code-id"  type="text"/>
                            </div>
                        </span>
                    </form>
                </div>
            </div>
            
        </div>
        
        <!Khung chua edit icon>
        <div class="khung-chua" id="khung-chua-edit-icon">
            <div class="phu-mo" onclick="TatKhungChuaEditicon()">
            </div>
            <div class="form-chua form-edit-icon">
                <div class="button-close" onclick="TatKhungChuaEditicon()">
                    X
                </div>
                <div class="title-form-chua">
                    Select a class icon
                </div>
                <div class="mot-hang" style="margin-top:15px; 
                      padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
                     
                </div>
                <div class="mot-hang" id="noi-chua-icon-id" style="margin-top:35px;">
                    
                </div>
            </div>
        </div>
        
        
        <!Khung chua add class>
        <div class="khung-chua" id="khung-chua-add-class">
            <div class="phu-mo" onclick="TatKhungAddClass()">
            </div>
            <div class="form-chua form-add-class">
                <div class="button-close" onclick="TatKhungAddClass()">
                    X
                </div>
                <div class="title-form-chua">
                    Add a class
                </div>
                <div class="mot-hang" style="margin-top:30px;">
                    <div class="mot-hang-30">
                        
						{!! Html::image('','image-random',array('width' => '90px','id'=>'image-randomId')) !!}
                        <span class="mot-hang-chu-edit" onclick="MoFormEditIcon()">
                            Edit icon
                        </span>
                        <input type="hidden" name="soIconDuocChon" id="so-icon-duoc-chon-id"/>
                    </div>
                    <div class="mot-hang-70">
                        <form>
                            <span class="mot-hang label">
                                Class name
                            </span>
                            <span class="mot-hang" style="margin-bottom:20px;">
                                <input name="className" value="e.g. Math101" style="padding: 15px 10px;" class="input-ben-trong" id="class-name-id" type="text"/>
                                <span class="mot-hang validator" id="validator-class-name-id">
                                    The name must be at least 3 characters long.
                                </span>
                            </span>
                            
                            
                            <span class="mot-hang label">
                                Class code
                            </span>
                            <span class="mot-hang">
                                <div style="text-align:center;height:46px;
                                     line-height:46px;margin-left:4%;border:1px solid #C3C3C3;
                                     border-right:none ;font-size:20px;
                                     float:left; width:15%; border-top-left-radius: 7px;
                                     border-bottom-left-radius: 7px;">
                                    @
                                </div>
                                <div style="float:left;width:80%;">
                                    <input name="classCode" style="padding: 15px 10px; margin:0;
                                           border-top-left-radius: 0px;border-bottom-left-radius: 0px;
                                           width:88%;" 
                                           class="input-ben-trong" id="class-code-id"  type="text"/>
                                </div>
                            </span>
                        </form>
                    </div>
                    
                </div>
                <div class="mot-hang" style="margin-top:15px; 
                      padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
                     
                </div>
                
                <div class="mot-hang">
                    <input name="checkBox1" type="checkbox" class="input-ben-trong-check"/>
                     <span style="float:left;margin:7px 0px 0px 10px;">
                         Anyone in this class can start a chat
                     </span>
                     <span style="float:left;width:87%;margin-left:12%;
                           font-size:11px; color:gray;">
                         Chat is disabled for students under 13. If this option is selected,
                         teachers and parents in this class will be able to start chats.
                     </span>
                 </div>
                <div class="mot-hang">
                     <input name="checkBox2" type="checkbox" class="input-ben-trong-check"/>
                     <span style="float:left;margin:7px 0px 0px 10px;">
                         I will only message people 13 or older
                     </span>
                     <span style="float:left;width:87%;margin-left:12%;
                           font-size:11px; color:gray;">
                         It's okay if students are under 13. We’ll ask for a parent's email 
                         address to keep everyone in the loop.
                     </span>
                </div>
            </div>
        </div>
        @endsection
        
        <script>
            var chuoiCacImage = ['avatar_apple_default','avatar_art','avatar_baseball','avatar_chemistry'
            ,'avatar_dinosaur', 'avatar_earthscience','avatar_football','avatar_geography','avatar_geometry',
        'avatar_government','avatar_history','avatar_home_economics','avatar_literature','avatar_math',
        'avatar_music_default','avatar_physics','avatar_piano','avatar_reading','avatar_rocket','avatar_science',
    'avatar_soccer','avatar_sports_default','avatar_stats','avatar_tech','avatar_theatre','avatar_track','avatar_writing'
            ,'avatar_basketball'];
            
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
            
            $("#class-name-id").focus(function(){
               $(this).val(""); 
            });
            $("#class-name-id").blur(function(){
            if(String($(this).val()).trim() === "" )
            {
                $(this).val("g.e Math101");
            }
         
            });
            
            $("#class-name-id").keyup(function(){
               var giaTrikeyDown = $(this).val();
               
               if(giaTrikeyDown.length < 3)
               {
                   $("#class-name-id").css("border","1px solid red");
                   $("#validator-class-name-id").slideDown();
               }else{
                    $("#validator-class-name-id").css("display","none");
                    $("#class-name-id").css("border","1px solid #C3C3C3");
                    
               }
            });
            
            function MoFormDownLoadApp(){
                $("#class-send-invitations").css("display","none");
                $("#class-download-app").css("display","block");
            }
            
            function MoFormSendInvitation(){
                $("#class-send-invitations").css("display","block");
                $("#class-download-app").css("display","none");
            }
            
            function MoFormAddParents(){
                $("#khung-chua-add-parents").css("display","block");
            }
            function TatKhungChuaAddParents(){
                $("#khung-chua-add-parents").css("display","none");
            }
            
            function MoFormSettingInformation(){
                $("#class-setting-owner").css("display","none");
                $("#class-setting-information").css("display","block");
            }
            
           function MoFormSettingOwner(){
                 $("#class-setting-owner").css("display","block");
                $("#class-setting-information").css("display","none");
            }
            
            
            function MoFormEditIcon()
            {
                var giaTriDefault = $("#so-icon-duoc-chon-id").val();
                var htmlStr = '';
                var giaTriUrl = '';
                for(var i = 0;i<chuoiCacImage.length;i++)
                {
                    giaTriUrl = "img/classesAvatar/" + chuoiCacImage[i] + ".png";
                    htmlStr += '<img alt="image" src="';
                    htmlStr += giaTriUrl;
                    htmlStr += '" width="100px" />';
                }
                $("#noi-chua-icon-id").html(htmlStr);
                $("#khung-chua-add-class").css("display","none");
                $("#khung-chua-edit-icon").css("display","block");
                
            }
            
            function TatKhungChuaJoinClass()
            {
                $("#khung-chua-join-class").css("display","none");
            }
            
            function MoTrangJoinClass()
            {
                $("#khung-chua-join-class").css("display","block");
            }
            
            function MoKhungChuaClassSetting()
            {
                $("#khung-chua-edit-class").css("display","block");
            }
            function TatKhungChuaEditClass()
            {
                $("#khung-chua-edit-class").css("display","none");
            }
            
            function TatKhungChuaEditicon()
            {
                $("#noi-chua-icon-id").empty();
                $("#khung-chua-edit-icon").css("display","none");
                $("#khung-chua-add-class").css("display","block");
                
            }
            
            function TatKhungAddClass()
            {
                $("#class-code-id").val("");
                $("#class-name-id").val("");
                $("#so-icon-duoc-chon-id").val("");
                $("#khung-chua-add-class").css("display","none");
            }
            
            function MoTrangAddClass(){
                $("#khung-chua-add-class").css("display","block");
                var htmlStr = '';
                var giaTriRandom = Math.floor((Math.random() * (chuoiCacImage.length-1)) + 0);
                $("#so-icon-duoc-chon-id").val(giaTriRandom);
                var giaTriUrl = "img/classesAvatar/" + chuoiCacImage[giaTriRandom] + ".png";
                
                
                
                
                $("#image-randomId").attr("src",giaTriUrl);
               
            }
        </script>
    </body>
</html>