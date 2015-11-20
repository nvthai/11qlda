{{-- Add Class Modal --}}
<div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="helpModalLabel">Thêm Lớp</h4>
      </div>
      
      {!! Form::open(array('url' => 'classes', 'method' => 'post', 'id'=>'addClassForm')) !!}
      <div class="modal-body">
        <div class="mot-hang">
            <div class="mot-hang-30">
                <img alt="image-random" width="90px" id="image-randomId" src="resources/assets/img/classesAvatar/avatar_baseball.png"/>
                <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#editIconModal" aria-haspopup="true" onclick="MoFormEditIcon()">
                    Edit icon
                </span>
                <input type="hidden" name="soIconDuocChon" id="so-icon-duoc-chon-id"/>
            </div>
            <div class="mot-hang-70">
                <form>
                    <span class="mot-hang">
                        Class name
                    </span>
                    <span class="mot-hang" style="margin-bottom:20px;">
                         {!! Form::text('className','',array('id'=>'className','class'=>'form-control span6','placeholder' => 'e.g. Math101', 'required')) !!}

                        <span class="mot-hang validator" id="validator-class-name-id">
                            The name must be at least 3 characters long.
                        </span>
                    </span>
                    
                    <span>
                        Class code
                    </span>
                    <div class="input-group">
                      <div class="input-group-addon">@</div>
                      {!! Form::text('classCode','',array('id'=>'classCode','class'=>'form-control', 'required')) !!}
                    </div>
                </form>
            </div>
            
        </div>
        <div class="mot-hang" style="margin-top:15px; 
              padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
             
        </div>
        
        <div class="mot-hang">
            <input name="participant_can_reply" id="participant_can_reply" type="checkbox" class="input-ben-trong-check"/>
             <span style="float:left;margin:7px 0px 0px 10px;">
                 Participants can reply to your messages.
             </span>
         </div>
        <div class="mot-hang">
             <input name="message_under_13" id="message_under_13" type="checkbox" class="input-ben-trong-check"/>
             <span style="float:left;margin:7px 0px 0px 10px;">
                 I will only message people 13 or older
             </span>
             <span style="float:left;width:87%;margin-left:12%;
                   font-size:11px; color:gray;">
                 It's okay if students are under 13. We’ll ask for a parent's email 
                 address to keep everyone in the loop.
             </span>
        </div>   
        <div class="modal-footer">
        {!! Form::submit('Thêm lớp', ['class' => 'btn btn-primary']) !!}
      </div>       
      </div>
      {!! Form::close() !!}
    </div>

    
  </div>
</div>

<!-- Edit Icon Modal -->
<div class="modal fade" id="editIconModal" tabindex="-1" role="dialog" aria-labelledby="editIconModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editIconModalLabel">Select a class icon</h4>

      </div>
      <div class="modal-body">
        <div class="mot-hang" style="margin-top:15px; 
              padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
          
        </div>
        <div class="mot-hang" id="noi-chua-icon-id" style="margin-top:35px;">
            <a href="#"><img alt="image-main" style="float:left;margin-right:15px;" src="resources/assets/img/classesAvatar/avatar_baseball.png" height="65px"/></a>
           <a href="#"><img alt="image-main" style="float:left;margin-right:15px;" src="resources/assets/img/classesAvatar/avatar_baseball.png" height="65px"/></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Join Class Modal -->
<div class="modal fade" id="joinClassModal" tabindex="-1" role="dialog" aria-labelledby="joinClassModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="joinClassModalLabel">Join a class</h4>
      </div>
      <div class="modal-body">
        <span>
            Enter class code
        </span>
        <form class="form-inline">
          <div class="form-group">
            <label class="sr-only" for="prefixClassCode">@</label>
            <div class="input-group">
              <div class="input-group-addon">@</div>
              <input type="text" class="form-control" id="classCode" placeholder="Enter class code">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Join</button>
        </form>
        <a class="btn btn-link">Search for your class instead</a>
      </div>
    </div>
  </div>
</div>

<!--Add students and parents modal-->

<div class="modal fade" id="addStudentParentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentParentLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addStudentParentLabel">Add students and parents to </h4>
      </div>
      <div class="modal-body">
        <div class="tabbed_area">

         <ul class="tabs"> 
            <li><a href="#" title="content_1" class="tab active">Download App</a></li> 
            <li><a href="#" title="content_2" class="tab">Send Invitations</a></li> 
        </ul> 
        
        <div id="content_1" class="content"> 
          <ul> Students and parents can scan the QR code below to download the free Remind app on their mobile devices.</ul>
          <img alt="image" src="resources/assets/img/iconScan.png" height="200px" />

             <ul> 
                <a href="https://itunes.apple.com/us/app/remind101/id522826277" target = "_blank"><img alt="image" src="resources/assets/img/appStore.png" height="50px"  /></a>
                 <a href = "https://play.google.com/store/apps/details?id=com.remind101&utm_campaign=get-it-on-google-play&utm_medium=%2Fapps&utm_source=remind101" target = "_blank" class="btn btn-link"><img alt="image" src="resources/assets/img/playStore.png" height="50px" /></a>
               </ul> 
        </div> 

          <div id="content_2" class="content"> 

           <form class="form-horizontal" role="form" method="POST" action="{!! url('contact') !!}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Enter email addresses (one per line or separated by commas or semicolons):</label>
                            <div class="col-md-6">
                                <input type="email" class="required" id="email" name="email" value="" placeholder="example@example.com, another@example.com">
                            </div>
                        </div>
<div>
  <ul>
    Invitations won't be sent from your personal email address or mobile number. By sending invitations, you acknowledge that you have permission to reach out to your contacts. You also agree that you won't use this service for commercial purposes.
  </ul>
</div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Invitations
                                </button>
                            </div>
                        </div>
                    </form>

        </div> 

        </div>

        
      </div>

    </div>

  </div>
</div>