<div style="font-family: cursive; font-size:13px;">


<div class="mot-hang">
        <div class="button-add-student-parent">
            <div class="button-add-student-parent-left" onclick="MoFormAddParents()">
                Add students and parents
            </div>
            <a target="_blank"  class="button-add-student-parent-right icon-an-noi-dung">
                
            </a>
        </div>
        
    </div>
    
    <div class="mot-hang chat-title">
        3 PARTICIPANTS
        <div class="button-search-chat">
            
        </div>
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
        font-weight:bold;
    }
    .content-chua-app-parent li:hover{
        color:black;
    }
    .select-add-parent{
        background-color:white;
        font-weight:bold;
        color:black;
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
                    WAYS TO JOIN A CLASS
                </div>
                <ul class="mot-hang content-chua-app-parent">
                    <li class="select-add-parent" style="background-position: 10px 8px;">
                        QR Code
                    </li>
                    <li style="    background-position: 10px -57px;">
                        Email invltation
                    </li>
                    <li style="    background-position: 10px -121px;">
                        Website link
                    </li>
                </ul>
            </div>
            <div class="mot-hang-70">
                <div class="mot-hang" id="khung-chu-qrcode">
                </div>
                <div class="mot-hang" id="khung-chu-email-invite">
                </div>
                <div class="mot-hang" id="khung-chu-website-link">
                </div>
            </div>
        </div>

    </div>
    <script>
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