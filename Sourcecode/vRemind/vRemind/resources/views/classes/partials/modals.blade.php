{{-- Add Class Modal --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
  function changePicInAdd(hinh) {
      $("#image-randomId").attr("src", hinh);
      $('#image-randomId-box').attr("value", hinh);
      $('#editIconModal').modal('hide');      
  };
</script>
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
                <img alt="image-random" width="90px" id="image-randomId" src="../resources/assets/img/classesAvatar/avatar_baseball.png"/>
                <!--LH-->
                <!--29/11/2015-->
                <!--Pass value of image-->
                <input type="hidden" name="icon-image" value="../resources/assets/img/classesAvatar/avatar_baseball.png" id="image-randomId-box" />
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


<!--20/11/15-->
<!--LH-->
<!--Form chỉnh sửa class-->
{{-- Edit Class Modal --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
  function changePic(hinh) {
      $("#image-randomIdUpdate").attr("src", hinh);
      $('#image-randomId-boxUpdate').attr("value", hinh);
      $('#editIconModalUpdateClass').modal('hide');      
  };
</script>
<div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="editClassModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="helpModalLabel">Class settings</h4>
      </div>
      {{-- $idClass = Session::get('sesClassId')->class_id --}}
      
      {!! Form::open(array('url' =>  @$idClass, 'method' => 'put', 'id'=>'updateClassForm')) !!}
      <div class="modal-body">    
        <div class="mot-hang">
            <div class="mot-hang-30">
                <img alt="image-random" width="90px" id="image-randomIdUpdate" src="{!! Session::get('sesClassId')->icon !!}"/>
                <!--LH-->
                <!--29/11/2015-->
                <!--Pass value of image-->
                <input type="hidden" name="icon-image" value="../resources/assets/img/classesAvatar/avatar_baseball.png" id="image-randomId-boxUpdate" />
                <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#editIconModalUpdateClass" aria-haspopup="true" onclick="MoFormEditIcon()">
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
                         {!! Form::text('className',Session::get('sesClassId')->class_name,array('id'=>'className','class'=>'form-control span6','placeholder' => 'e.g. Math101', 'required')) !!}

                        <span class="mot-hang validator" id="validator-class-name-id">
                            The name must be at least 3 characters long.
                        </span>
                    </span>
                    
                    <span>
                        Class code
                    </span>
                     <span class="mot-hang" style="margin-bottom:20px;">
                         {!! Form::text('classCode',Session::get('sesClassId')->class_code,array('id'=>'classCode','class'=>'form-control span6','placeholder' => 'e.g. Math101', 'required')) !!}
                        <span class="mot-hang validator" id="validator-class-name-id">
                            The name must be at least 3 characters long.
                        </span>
                    </span>
                    
                    <!--21/11/15-->
                    <!--LH-->
                    <!--Chỉnh sửa edit form-->
                    <span class="mot-hang">
                         {!! Form::submit('Thay đổi', ['class' => 'btn btn-primary']) !!}
                    </span>
 
                </form>
            </div>
        </div>
        <div class="mot-hang" style="margin-top:15px; 
              padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
             
        </div>
        
        <div class="mot-hang">
            <input name="participant_can_reply" id="participant_can_reply" type="checkbox" class="input-ben-trong-check"/>
             <span style="float:left;margin:7px 0px 0px 10px;">
                 Participants can reply to your messages
             </span>
         </div>
         <div class="mot-hang">
            <input name="participant_be_public" id="participant_be_public" type="checkbox" class="input-ben-trong-check"/>
             <span style="float:left;margin:7px 0px 0px 10px;">
                 Anyone from school can find this classes
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
          <div class="mot-hang" style="margin-top:15px; 
                padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
          </div>
        </div>
      {!! Form::submit('Xóa lớp', ['class' => 'btn btn-danger']) !!}       
      </div>
      {!! Form::close() !!}
    </div>

    
  </div>
</div>



<!-- Edit Icon Modal Add class-->
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
            
            <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_baseball.png" height="65px" onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_baseball.png')" />
           <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_art.png" height="65px" onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_art.png')" />
           <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_art.png" height="65px" onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_art.png')" />
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit Icon Modal Update Class -->
<div class="modal fade" id="editIconModalUpdateClass" tabindex="-1" role="dialog" aria-labelledby="editIconModalLabel">
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
            
            <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_baseball.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_baseball.png')" />
           <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_art.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_art.png')" />
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


