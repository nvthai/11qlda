<div style="font-family: cursive; font-size:13px;">


<div class="mot-hang">
        <div class="button-add-student-parent">
            <div class="button-add-student-parent-left" onclick="MoFormAddParents()">
                Mời học sinh và phụ huynh
            </div>
            <a target="_blank"  class="button-add-student-parent-right icon-an-noi-dung">
                
            </a>
        </div>
        
    </div>
    
    <!--29/11/15-->
    <!--THUAN-->
    <!--Hien thi member-->
    <div class="mot-hang chat-title">
        @if(count($members)>0) {{count($members)}} THÀNH VIÊN
        @else 0 THÀNH VIÊN
        @endif
        <div class="button-search-chat">
            
        </div>
    </div>
    
    <div class="group-list">
        <ul class="menu-class">
            @foreach ($members as $member)
                <a href="javascript:MoTrangMemberInfo();" data-toggle="modal" data-target="#MemberInfoModal">
                <li class="menu-class-child">
                    
                    <font>
                        {{ $member->name }}
                    </font>
                </li>        
            </a>
            @endforeach
        </ul>
                
    </div>

<style>
    .content-chua-app-parent{
        list-style: none;
        padding:0px;
    }
    .content-chua-app-parent li{
        background-image: url("../resources/assets/img/icon-add-parent.png");
        background-repeat: no-repeat;
        background-size: 40px;
        padding: 17px 0px 17px 44px;
        color:gray;
        cursor:pointer;
        font-weight:bold;
    }
    .content-chua-app-parent li:hover{
        color:black;
    }
    .select-add-parent{
        background-color:white;
        font-weight:bold;
        color:black !important;
    }
</style>

<!Khung chua add parents, student>
    <div class="khung-chua" id="khung-chua-add-parents">
        <div class="phu-mo" onclick="TatKhungChuaAddParents()" style="z-index:15;">
        </div>
        <div class="form-chua form-add-parents" style="position:fixed;
        z-index:16;width:70%;left:15%;padding:0px;font-family:sans-serif;height:85%;">
        <div class="button-close" onclick="TatKhungChuaAddParents()">
            X
        </div>
        <div class="mot-hang" style="height:100%;">
            <div class="mot-hang-30" style="background-color:rgb(249,249,249);
            border-top-left-radius:9px; border-bottom-left-radius:9px; height:inherit;">
                <div clas="mot-hang" style="padding:30px 0px 20px 10%;width:90%;">
                    <img alt="image-main" style="float:left;margin-right:10px;" src="{!! Session::get('sesClassId')->icon !!}" height="50px"/>
                    <div class="mot-hang-70">
                        <span class="mot-hang-chu-title">
                            {{Session::get('sesClassId')->class_name}}
                        </span>
                        <span class="mot-hang-chu-description">
                           @
                           {{Session::get('sesClassId')->class_code}}
                        </span>
                    </div>
                </div>
                <div class="mot-hang" style="padding: 25px 0px 5px 10%;
    width: 90%; font-size: 12px; font-weight: bold;
    color: rgb(128, 128, 128);">
                    CÁCH THỨC THAM GIA LỚP
                </div>
                <ul class="mot-hang content-chua-app-parent">
                    <li class="select-add-parent" style="background-position: 10px 8px;">
                        Mã QR
                    </li>
                    <li style="    background-position: 10px -57px;">
                        Email giới thiệu
                    </li>
                    <li style="    background-position: 10px -121px;">
                        Địa chỉ Website
                    </li>
                </ul>
            </div>
            <div class="mot-hang-70" style="padding:30px;">
                <div class="mot-hang" id="khung-chu-qrcode" style="display:block;">
                    <div class="mot-hang" style="    text-align: center;
                        font-size: 20px;color: gray;">
                        Yêu cầu học sinh và phụ huynh quét mã QR này</br> bằng điện thoại
                    </div>
                    <img alt="image-qr-core" style="    margin: 15% 0px 0px 25%;
    width: 50%;" src="/resources/assets/img/iconScan.png"/>
                </div>
                <div class="mot-hang" id="khung-chu-email-invite" style="display:none;">
                    <div class="mot-hang" style="    text-align: center;
                            font-size: 20px;color: gray;">
                        Điền địa chỉ Email
                    </div>
                    <div class="mot-hang" style="color:gray;margin:40px 0px 20px 0px;">
                        Số điện thoại và địa chỉ email cách nhau bằng dấu phẩy, dấu chấm phẩy, hoặc xuống dòng. Bạn cũng có thể sao chép và dán từ một bảng tính (spreadsheet). Xem cách làm như thế nào?
                    </div>
                    <div class="mot-hang">
                        
                        <textarea rows="10" style="float:left;width:100%;" 
                            placeholder="example@example.com, another@example.com" value=""></textarea>
                    </div>
                    <div class="mot-hang" style="color:gray;margin:20px 0px 20px 0px;">
                        Thư mời sẽ không được gửi từ địa chỉ email cá nhân của bạn. Bằng cách gửi lời mời, bạn xác nhận rằng bạn được cho phép để tiếp cận với những địa chỉ liên lạc trên. Bạn cũng đồng ý rằng bạn sẽ không sử dụng dịch vụ này cho các mục đích thương mại.
                    </div>
                    <div class="mot-hang">
                        <div class="button-signup" style="color:white;">
                            Gửi lời mời
                        </div>                     
                    </div>
                    

                </div>
                <div class="mot-hang" id="khung-chu-website-link" style="display:none;">
                    <div class="mot-hang" style="text-align: center;
    font-size: 21px; margin-bottom: 15px;color: gray;">
                        Chia sẻ đường dẫn cho học sinh và phụ huynh
                    </div>
                    <div class="mot-hang" style="padding:20px 0px 0px 25%;">
                        <img alt="image-link-web" style="width:60%;" src="../resources/assets/img/start-chat.png"/>
                    </div>
                    <div class="mot-hang" style="width:60%;margin:20px 20% 15px 20%;">
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
                            
                            
                            </style>
                            <div class="khung-text-share-remind">
                                <?php 
                                    echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                                ?>
                            </div>
                        </div>
                        <div class="mot-hang-30">
                            <div class="button-coppy-link">
                                Sao chép đường link
                            </div>
                        </div>
                    </div>
                    <div class="mot-hang" style="width:80%;margin:20px 0px 15px 20%; color:gray;">
                        Học sinh và phụ huynh có thể vào link này để tham gia lớp học của bạn.
                    </div>
                    <div class="mot-hang" style="width:80%;margin:0px 0px 15px 20%; color:gray;">
                        Dán liên kết này trong một email, blog, trang giáo viên của bạn, hoặc </br>bất cứ nơi nào khác.
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
            $(".content-chua-app-parent li").click(function(){
                $(".content-chua-app-parent").find("li").removeClass("select-add-parent");
                $(this).addClass("select-add-parent");
                if($(".content-chua-app-parent").find("li").eq(0).hasClass("select-add-parent") )
                {
                    $("#khung-chu-qrcode").css("display","block");
                    $("#khung-chu-email-invite").css("display","none");
                    $("#khung-chu-website-link").css("display","none");
                    
                    
                }
                if($(".content-chua-app-parent").find("li").eq(1).hasClass("select-add-parent") )
                {
                    $("#khung-chu-qrcode").css("display","none");
                    $("#khung-chu-email-invite").css("display","block");
                    $("#khung-chu-website-link").css("display","none");
                    
                }
                if($(".content-chua-app-parent").find("li").eq(2).hasClass("select-add-parent") )
                {
                    $("#khung-chu-qrcode").css("display","none");
                    $("#khung-chu-email-invite").css("display","none");
                    $("#khung-chu-website-link").css("display","block");
                    
                }
            });

            function MoFormAddParents(){
                $("#khung-chua-add-parents").css("display","block");
            }
            function TatKhungChuaAddParents(){
                $("#khung-chua-add-parents").css("display","none");
            }
            function MoFormDownLoadApp(){
                $("#class-send-invitations").css("display","none");
                $("#class-download-app").css("display","block");
            }
            
            function MoFormSendInvitation(){
                $("#class-send-invitations").css("display","block");
                $("#class-download-app").css("display","none");
            }
    </script>
</div>