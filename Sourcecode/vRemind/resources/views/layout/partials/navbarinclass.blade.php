<style>
#mot-hang-chua-icon{
	overflow:hidden;
	width:72%;
	margin:40px 0px 30px 0px;
}
#mot-hang-chua-icon img{
	float:left;
	width:180px;
	margin-left:20px;
}
.cach-nhau-hang-navigation{
    padding: 17px 0px 17px 0px;
    margin-top: 5px;
    color:white !important;
    opacity:0.6;
    cursor:pointer;
}
.cach-nhau-hang-navigation:hover{
	opacity:1;
	background-color:#131E31;
}
.cach-nhau-hang-navigation img{
	float:left;
	width:40px;
	margin-left:20px;
}
.selected{
	opacity:1;
}


.khung-chua-icon-more{
	display:none;
    list-style: none;
    padding: 0px;
    cursor: pointer;	
}
.khung-chua-icon-more li{
	opacity:0.6;
	padding:10px 0px 10px 65px;
	background-image:url('../resources/assets/img/icon-more.png');
	background-repeat:no-repeat;
	background-size:35px;
	color:white;
}
.khung-chua-icon-more li:hover{
	opacity:1;
	background-color:#131E31;
}

.khung-chua-more{
	display:block;
	height: 58px;
    background-image: url('../resources/assets/img/icon-more.png');
    background-repeat: no-repeat;
    background-position: 18px -154px;
    background-size: 35px;
    opacity:0.6;
}
.khung-chua-more:hover{
	opacity: 1;
}

#khung-chua-icon-bottom{
    position: absolute;
    left: 0px;
    top: 82%;
    width: 100%;   
}
</style>

<?php
	$giaTriTuyenSelected = "class";
	if(!empty($pageReturn))
	{
		$giaTriTuyenSelected = $pageReturn;

	}
	
?>

<div class="navigation-left-main" id="navigation-left-main-id" style="z-index:10;">
	<div class="mot-hang" id="mot-hang-chua-icon">
		<img alt="image" src="../resources/assets/img/logo2.svg"/>
	</div>
	<a class=<?php if($giaTriTuyenSelected == "class") echo '"mot-hang cach-nhau-hang-navigation selected"'; else echo '"mot-hang cach-nhau-hang-navigation"'; ?>  href="/classes">
		<img alt="image-classs" src="../resources/assets/img/logo-class.png" />
		<font style="float:left; margin:7px 0px 0px 15px;">
			Classer
		</font>
	</a>
	<a class=<?php if($giaTriTuyenSelected == "chat") echo '"mot-hang cach-nhau-hang-navigation selected"'; else echo '"mot-hang cach-nhau-hang-navigation"'; ?> href="/messages">
		<img alt="image-chat" src="../resources/assets/img/logo-chat.png"/>
		<font style="float:left; margin:7px 0px 0px 15px;">
			Chat
		</font>
	</a>
	<div class="mot-hang" style="position:relative;height:58%">
		<div id="khung-chua-icon-bottom">
			<ul class="khung-chua-icon-more" style="display:none;">
				<a href="/settings" style="text-decoration:none;" target="_blank">
				<li style="  background-position: 8px 7px;">
					Settings
				</li>
				</a>

				<a href="{{ url('/auth/logout') }}">
				<li style="background-position: 7px -30px;">
					Log out
				</li>
				</a>
				<li style="background-position: 7px -65px;" onclick="MoKhungChuaHelp()">
					Help
				</li>
				<li style="background-position: 8px -110px;" onclick="moKhungChuaShareRemind()">
					Share Remind
				</li>
			</ul>
			<div class="khung-chua-more">
			</div>
		</div>
	</div>
	
</div>


<!Khung Chua share remind>
<div class="khung-chua" id="khung-chua-share-remiknd">
            <div class="phu-mo" onclick="TatKhungChuaShareRemind()" style="z-index:15;">
            </div>
            <div class="form-chua form-join-class" style="z-index:16;padding:30px;">
                <div class="button-close" onclick="TatKhungChuaShareRemind()">
                    X
                </div>
                <div >
                    
                </div>
                <div class="title-form-chua">
                    <div class="mot-hang">
                        <img alt="image" width="70px;" src="../resources/assets/img/loveRemind.svg"/>
                    </div>
                    <div class="mot-hang">
                        Love Remind?
                    </div>
                    <div class="mot-hang" style="font-size:13px; color:gray;">
                        Spread the word and share us with colleagues </br> at your school.
                    </div>
                    <div class="mot-hang" style="margin-top:20px;">
	                    <div class="mot-hang-70">
	                    	<style>
	                    	.khung-text-share-remind{
	                    		    float: left;
								    width: 95%;
								    padding: 10px 0px 10px 4%;
								    overflow: hidden;
								    font-size: 13px;
								    border: 1px solid #CECECE;
								    border-radius: 5px;
								    text-align: left;
								    color: black;
	                    	}
	                    	.khung-text-share-remind:hover{
	                    		border: 1px solid #CECECE;
	                    	}
	                    	.button-coppy-link{
	                    		    float: left;
								    text-align: center;
								    width: 90%;
								    height: 38px;
								    line-height: 38px;
								    border: 1px solid #2f75b5;
								    border-radius: 5px;
								    background-color: white;
								    overflow: hidden;
								    font-size: 13px;
								    color: #4a89dc;
								    cursor:pointer;
	                    	}
	                    	.button-coppy-link:hover{
	                    		background-color:#4a89dc;
	                    		color:white;
	                    	}
	                    	.khung-help-them{
	                    		    height: 100px;
								    border: 1px solid #C3C3C3;
								    font-size: 12px;
								    color: gray;
								    cursor:pointer;
	                    	}
	                    	.khung-help-them:hover{
	                    			color:#4a89dc;
	                    	}
	                    	</style>
	                    	<div class="khung-text-share-remind">
	                    		<?php 
	                    			echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	                    		?>
	                    	</div>
	                    </div>
	                    <div class="mot-hang-30">
	                    	<div class="button-coppy-link">
	                    		Coppy link
	                    	</div>
	                    </div>
                    </div>
                    <div class="mot-hang" style="margin-top:17px;">
                    	<div class="button-coppy-link"style="background-color:#4a89dc;color:white;
                    	width:97%;font-weight:bold ;font-size:14px;">
                    		Share by email
                    	</div>
                    </div>
                    
                </div>
            </div>
</div>


<!Khung Chua help>
<div class="khung-chua" id="khung-chua-help">
            <div class="phu-mo" onclick="TatKhungChuaHelp()" style="z-index:15;">
            </div>
            <div class="form-chua form-edit-icon" style="z-index:16;padding:30px;">
                <div class="button-close" onclick="TatKhungChuaHelp()">
                    X
                </div>
                <div >
                    
                </div>
                <div class="title-form-chua">
                    <div class="mot-hang">
                        <img alt="image" style="margin:0px;" width="70px;" src="../resources/assets/img/gohelp.svg"/>
                    </div>
                    <div class="mot-hang">
                        We're here to help!
                    </div>
                    
                    <div class="mot-hang" style="margin-top:20px;">
	                    <input type="text" class="input-ben-trong" style="    margin-left: 0px;
    		float: left;width: 97%; font-size: 15px;padding: 11px;" 
    				name="content-help" placeholder='Search our FAQs using keywords like "attach"'/>
                    </div>
                    <div class="mot-hang" style="margin-top:17px;">
                    	
                    		<div class="mot-hang-50 khung-help-them">
		                     	Freequently asked questions
		                     </div>
		                     <div class="mot-hang-50 khung-help-them">
		                     	Resources
		                     </div>
		                     <div class="mot-hang-50 khung-help-them">
		                     	Tutorial videos
		                     </div>
		                     <div class="mot-hang-50 khung-help-them">
		                     	Email Remind
		                     </div>
                    	
                    </div>
                   
                     
                    
                </div>
            </div>
</div>



<script>
function MoKhungChuaHelp()
{
	$("#khung-chua-help").css("display","block");
}
function TatKhungChuaHelp()
{
	$("#khung-chua-help").css("display","none");
}

function moKhungChuaShareRemind()
{
	$("#khung-chua-share-remiknd").css("display","block");
}
function TatKhungChuaShareRemind()
{
	$("#khung-chua-share-remiknd").css("display","none");
}
var aTimeOut;
$("#navigation-left-main-id").hover(function(){
		aTimeOut = setTimeout(function(){

		$("#navigation-left-main-id").animate({
			width:"18%",
		},360);
		$("#mot-hang-chua-icon").css("width","100%");
		$("#khung-chua-icon-bottom").find(".khung-chua-icon-more").fadeIn();
		$("#khung-chua-icon-bottom").find(".khung-chua-more").css("display","none");
		$("#khung-chua-icon-bottom").css({
			"opacity":"1",
			"top":"65%"
		});
		$(this).find(".selected").css("background-color","rgb(42,60,93)");

		},1000);

},function(){
	clearTimeout(aTimeOut);
	$(this).animate({
		width:"6%"
		
	},100);
	$("#mot-hang-chua-icon").css("width","72%");
	$("#khung-chua-icon-bottom").find(".khung-chua-icon-more").css("display","none");
	
	$("#khung-chua-icon-bottom").css({
		"top":"82%",
		"opacity":"0.6",
	});
	$("#khung-chua-icon-bottom").find(".khung-chua-more").css("display","block");
	$(this).find(".selected").css("background-color","rgba(255, 255, 255, 0)");
});
</script>
