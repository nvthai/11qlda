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
    
    <!--29/11/15-->
    <!--THUAN-->
    <!--Hien thi member-->
    <div class="mot-hang chat-title">
        @if(count($members)>0) {{count($members)}} PARTICIPANTS
        @else 0 PARTICIPANTS
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


<!Khung chua add parents, student>
        <div class="khung-chua" id="khung-chua-add-parents">
            <div class="phu-mo" onclick="TatKhungChuaAddParents()">
            </div>
            <div class="form-chua form-add-parents" style="position:fixed;">
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
                            <img src="../resources/assets/img/iconScan.png" alt="image-scan" width="300px"/>
                        </div>
                        <div class="mot-hang">
                            <div class="mot-hang-30" style="text-align:center;margin:0px 4% 0px 15%;cursor:pointer;">
                                <img src="../resources/assets/img/appStore.png " alt="image-scan" width="200px"/>
                            </div>
                            <div class="mot-hang-30" style="text-align:center;margin:0px 15% 0px 4%; cursor:pointer;">
                                <img src="../resources/assets/img/playStore.png" alt="image-scan" width="200px"/>
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
                        <div class="mot-hang">
                            Enter email addresses (one per line or separated by commas or semicolons)
                        </div>
                        <div class="mot-hang">
                            <textarea rows="4" style="width:100%;text-align:left;" 
                                      name="conntent-email" >
                            example@example.com, another@example.com
                            </textarea>
                        </div>
                        <div class="mot-hang">
                            Invitations won't be sent from your personal email address or mobile number. By sending invitations, you acknowledge that you have permission to reach out to your contacts. You also agree that you won't use this service for commercial purposes.
                        </div>
                                
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