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

<div class="navigation-left-main" id="navigation-left-main-id" style="z-index=10;">
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
				<a href="/settings" target="_blank">
				<li style="  background-position: 8px 7px;">
					Settings
				</li>
				</a>

				<li style="background-position: 7px -30px;">
					Log out
				</li>
				<li style="background-position: 7px -65px;">
					Help
				</li>
				<li style="background-position: 8px -110px;">
					Share Remind
				</li>
			</ul>
			<div class="khung-chua-more">
			</div>
		</div>
	</div>
	
</div>

<script>
$("#navigation-left-main-id").hover(function(){
	$(this).animate({
		width:"18%"
	},360);
	$("#mot-hang-chua-icon").css("width","100%");
	$("#khung-chua-icon-bottom").find(".khung-chua-icon-more").fadeIn();
	$("#khung-chua-icon-bottom").find(".khung-chua-more").css("display","none");
	$("#khung-chua-icon-bottom").css({
		"opacity":"1",
		"top":"65%"
	});
	$(this).find(".selected").css("background-color","rgb(42,60,93)");
},function(){
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
