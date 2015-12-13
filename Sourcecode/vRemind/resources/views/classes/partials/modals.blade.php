{{-- Add Class Modal --}}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
  function changePicInAdd(hinh) {
      $("#image-randomId").attr("src", hinh);
      $('#image-randomId-box').attr("value", hinh);
      $('#editIconModal').modal('hide');      
  };
</script>
 <script type="text/javascript">
    var ID = function () {
      // Math.random should be unique because of its seeding algorithm.
      // Convert it to base 36 (numbers + letters), and grab the first 9 characters
      // after the decimal.
      return '' + Math.random().toString(36).substr(2, 7);
    };
</script>
  <script type="text/javascript">
  $(document).ready(function() {
      $("#classCode").val('bla');
      });
  })
  </script>
  <script>
  function setData() {
    var Value = document.getElementById('ClassCodeTextBox').value;
    if (Value == "") {
      var ID = Math.random().toString(36).substr(2, 7);
      $('#ClassCodeTextBox').attr("value", ID);
      $('#submitAddClass').attr("disabled", false);  
    }
  };
  </script>



<div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel">
  <div class="modal-dialog" role="document" style="width:450px;">
    <div class="modal-content" >
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"
        style="position:absolute;left:95%;top:-20px;color:white;">
        X
        </button>
        <h4 class="modal-title" style="text-align:center;" id="helpModalLabel">Tạo lớp mới</h4>
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
                <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#editIconModal" aria-haspopup="true" >
                    Thay đổi biểu tượng
                </span>
                <input type="hidden" name="soIconDuocChon" id="so-icon-duoc-chon-id"/>
            </div>
            <div class="mot-hang-70">
                <form>
                    <span class="mot-hang">
                        Tên lớp
                    </span>

                    <span class="mot-hang" style="margin-bottom:20px;">
                         {!! Form::text('className','',array('id'=>'className','class'=>'form-control span6','placeholder' => 'Ví dụ: Toán 5', 'required')) !!}

                        <span class="mot-hang validator" id="validator-class-name-id">
                            Tên lớp phải có độ dài ít nhất 3 ký tự.
                        </span>
                    </span>
                    
                    <span>
                        Mã lớp
                    </span>
                    <div class="input-group">
                      <div class="input-group-addon">@</div>
                      <input type="text" id="ClassCodeTextBox" name="ClassCodeTextBox" class="form-control" onclick="setData()" required />
                    </div>
                </form>
            </div>
            
        </div>
        <div class="mot-hang" style="margin-top:15px; 
              padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
             
        </div>
        
        <div class="mot-hang">
            <input name="participant_can_reply" id="participant_can_reply" type="checkbox" class="input-ben-trong-check" checked value="1" />
             <span style="float:left;margin:7px 0px 0px 10px;">
                 Những người tham gia có thể trả lời thông báo của bạn.
             </span>
         </div>
        <div class="mot-hang">
             <input name="message_under_13" id="message_under_13" type="checkbox" class="input-ben-trong-check" checked value="1"/>
             <span style="float:left;margin:7px 0px 0px 10px;">
                 Chỉ gửi thông báo cho những người từ 13 tuổi trở lên.
             </span>
             <span style="float:left;width:87%;margin-left:12%;
                   font-size:11px; color:gray;">
                 Sẽ không sao đối với những học sinh dưới 13 tuổi đâu, chúng tôi sẽ yêu cầu địa chỉ email của phụ huynh để quản lý các em tốt hơn.
             </span>
        </div>   
        <div class="modal-footer" style="border-top:none;">
        {!! Form::submit('Tạo lớp', ['class' => 'btn btn-primary', 'disabled', 'name' => 'submitAddClass', 'id' => 'submitAddClass']) !!}
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
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="float:left; width:480px;">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"
        style="position:absolute;left:95%;top:-20px;color:white;">
        X
        </button>
        <h4 class="modal-title" id="helpModalLabel" style="    text-align: center;
    color: gray;
    font-size: 19px;
    margin: 12px 0px 15px 0px;">Thiết lập lớp</h4>

      <style>
        .tab-setting-class10
        {
          color:#3373b8;
          border-bottom: 4px solid #3373b8;;
        }
        #khungg-chua-setting{
          width:80%;
          margin:0px 10% 20px 10%;
        }
        #khungg-chua-owner{
          width:80%;
          margin:0px 10% 20px 10%;
        }
      </style>


      <div class="mot-hang" id="tab-setting-class-id" style="    border-bottom: 1px solid #E0E0E0;
    margin-bottom: 25px;">
        <div class="mot-hang-50 tab-setting-class10" style="width:35%; padding-bottom:10px;
        text-align:center;margin-left:15%;cursor:pointer;">
          Thông tin
        </div>
        <div class="mot-hang-50" style="width:35%;text-align:center; padding-bottom:10px;
        margin-right:15%;cursor:pointer;">
          Người sở hữu
        </div>
      </div>
      </div>
      {{-- $idClass = Session::get('sesClassId')->class_id --}}
      
      {!! Form::open(array('url' =>  @$idClass, 'method' => 'put', 'id'=>'updateClassForm')) !!}
      
      

         
        <div class="mot-hang" id="khungg-chua-setting" >
          <div class="mot-hang">
            <div class="mot-hang-30">
                <img alt="image-random" width="90px" id="image-randomIdUpdate" src="{!! Session::get('sesClassId')->icon !!}"/>
                <!--LH-->
                <!--29/11/2015-->
                <!--Pass value of image-->
                <input type="hidden" name="icon-image" value="../resources/assets/img/classesAvatar/avatar_baseball.png" id="image-randomId-boxUpdate" />
                <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#editIconModalUpdateClass" aria-haspopup="true" onclick="MoFormEditIcon()">
                    Thay đổi biểu tượng
                </span>
                <input type="hidden" name="soIconDuocChon" id="so-icon-duoc-chon-id"/>
            </div>
            <div class="mot-hang-70">
                <form>
                    <span class="mot-hang">
                        Tên lớp
                    </span>
                    <span class="mot-hang" style="margin-bottom:20px;">
                         {!! Form::text('className',Session::get('sesClassId')->class_name,array('id'=>'className','class'=>'form-control span6','placeholder' => 'e.g. Math101', 'required')) !!}

                        <span class="mot-hang validator" id="validator-class-name-id">
                            Tên lớp phải có độ dài ít nhất 3 ký tự.
                        </span>
                    </span>
                    
                    <span>
                        Mã lớp
                    </span>
                     <span class="mot-hang" style="margin-bottom:20px;">
                         {!! Form::text('classCode',Session::get('sesClassId')->class_code,array('id'=>'classCode','class'=>'form-control span6','placeholder' => 'e.g. Math101', 'required')) !!}
                        <span class="mot-hang validator" id="validator-class-name-id">
                            Tên lớp phải có độ dài ít nhất 3 ký tự.
                        </span>
                    </span>
                    
                    <!--21/11/15-->
                    <!--LH-->
                    <!--Chỉnh sửa edit form-->
                    <span class="mot-hang">
                         {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
                    </span>
 
                </form>
            </div>
        </div>
        
        

        <!--Participant checkbox-->
        <!--LH 10/12/2015-->
        <div class="mot-hang" style="padding: 20px 0px 20px 0px;
               border-top: 1px solid #E0E0E0; border-bottom: 1px solid #E0E0E0;
              font-size: 13px; font-family: cursive; margin-top: 15px;">
        
            <div class="mot-hang">
            @if (Session::get('sesClassId')->participant_can_reply == 1)
              <input name="participant_can_reply" id="participant_can_reply" type="checkbox" class="input-ben-trong-check" checked value="1" />
            @else
              <input name="participant_can_reply" id="participant_can_reply" type="checkbox" class="input-ben-trong-check" value="1"/>
            @endif
                 <span style="float:left;margin:7px 0px 0px 10px;">
                     Những người tham gia có thể trả lời thông báo của bạn.
                 </span>
             </div>
             <!--Public checkbox-->
            <!--LH 10/12/2015-->
             <div class="mot-hang">
             @if (Session::get('sesClassId')->is_public == 1)
                <input name="participant_be_public" id="participant_be_public" type="checkbox" class="input-ben-trong-check" checked value="1"/>
             @else
                <input name="participant_be_public" id="participant_be_public" type="checkbox" class="input-ben-trong-check" value="1"/>
             @endif
                 <span style="float:left;margin:7px 0px 0px 10px;">
                     Bất cứ ai cùng trường đều có thể tìm thấy lớp này.
                 </span>
             </div>
             <!--message_under_13 checkbox-->
            <!--LH 10/12/2015-->
            <div class="mot-hang">
            @if (Session::get('sesClassId')->message_under_13 == 1)
              <input name="message_under_13" id="message_under_13" type="checkbox" class="input-ben-trong-check" checked value="1"/>
            @else
              <input name="message_under_13" id="message_under_13" type="checkbox" class="input-ben-trong-check" value="1"/>
            @endif
                 
                 <span style="float:left;margin:7px 0px 0px 10px;">
                     Chỉ gửi thông báo cho những người từ 13 tuổi trở lên.
                 </span>
                 <span style="float:left;width:87%;margin-left:12%;
                       font-size:11px; color:gray;">
                     Sẽ không sao đối với những học sinh dưới 13 tuổi đâu, chúng tôi sẽ yêu cầu địa chỉ email của phụ huynh để quản lý các em tốt hơn.
                 </span>
            </div>
        </div>
       
        <div class="mot-hang" style="margin-top:20px;">
          <div class="mot-hang-50">
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/classes/delete') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class='btn btn-danger btn-xs' style="    color: #d9534f;
                    background-color: white; padding: 10px 18px; font-size: 14px;
                    font-weight: bold;" type="submit" name="remove_levels" value="delete"><span class="fa fa-times"></span> Xóa lớp</button>         
            </form>
          </div>
          <div class="mot-hang-50">
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/classes/remove') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class='btn btn-danger btn-xs' type="submit" name="remove_parts_levels" value="delete"><span class="fa fa-times"></span> Mời tất cả thành viên ra khỏi lớp</button>         
            </form>
          </div>
          
        </div>
       
        </div>
        <div class="mot-hang" id="khungg-chua-owner" style="display:none;">
          <div class="mot-hang" style="color:#4a89dc;">
            <?php 
              echo Auth::user()->name ." ". Auth::user()->lastname;
            ?>
          </div>
          <div class="mot-hang" style="border-top:1px solid #D4D4D4;margin-top:10px;padding-top:10px;">
          </div>
          <div class="button-add" style="margin:10px 10px 0px 0px;">
            +
          </div>
          <span style="float:left;padding-top:15px;color: #3373b8;;">
            Add class Owner
          </span>


        </div>
      
    </div>
{!! Form::close() !!}
  </div>
</div>
<script>
$("#tab-setting-class-id").find(".mot-hang-50").click(function(){
  $("#tab-setting-class-id").find(".mot-hang-50").removeClass("tab-setting-class10");
  $(this).addClass("tab-setting-class10");

  if($("#khungg-chua-owner").css("display") == "none")
  {
    $("#khungg-chua-owner").css("display","block");
    $("#khungg-chua-setting").css("display","none");
    
  }else{
    $("#khungg-chua-setting").css("display","block");
    $("#khungg-chua-owner").css("display","none");
  }
  

});
</script>

<style>
.noi-chua-image-edit
{
float:left;
width:80%;
margin:10px 10% 10px 10%;
}
.noi-chua-image-edit img{
    float: left;
    margin-right: 22px;
    margin-bottom: 12px;
    margin-top: 12px;
    cursor: pointer;
    height: 95px;
    opacity: 0.6;
}
.noi-chua-image-edit img:hover{
  opacity:1;
}
</style>
<!-- Edit Icon Modal Add class-->
<div class="modal fade" style="background-color:rgba(0, 0, 0, 0.89);" id="editIconModal" tabindex="-1" role="dialog" aria-labelledby="editIconModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" style="display:none;" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="text-align:center;padding: 20px 0px 17px 0px;" id="editIconModalLabel">Chọn một biểu tượng lớp học</h4>
      </div>
      <div class="mot-hang" style="background-color:white;margin-top:-4px;border-top:1px solid #e5e5e5;">
        <div class="noi-chua-image-edit">
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_baseball.png" onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_baseball.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_art.png" onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_art.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_apple_default.png" onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_apple_default.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_basketball.png" onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_basketball.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_chemistry.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_chemistry.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_dinosaur.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_dinosaur.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_earthscience.png" onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_earthscience.png')" />                
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_geography.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_geography.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_government.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_government.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_history.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_history.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_literature.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_literature.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_math.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_math.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_music_default.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_music_default.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_physics.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_football.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_piano.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_geography.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_reading.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_reading.png')" />          
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_science.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_science.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_soccer.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_soccer.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_sports_default.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_sports_default.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_stats.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_stats.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_tech.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_tech.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_theatre.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_theatre.png')" />
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_rocket.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_rocket.png')" />
                  
                  <img alt="image-main"  src="../resources/assets/img/classesAvatar/avatar_writing.png"  onclick="changePicInAdd('../resources/assets/img/classesAvatar/avatar_writing.png')" />
                  
               
          
          </div>
        </div>
    </div>
  </div>
</div>

<!-- Edit Icon Modal Update Class -->
<div class="modal fade" style="background-color:rgba(0, 0, 0, 0.89);" id="editIconModalUpdateClass" tabindex="-1" role="dialog" aria-labelledby="editIconModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" style="display:none;" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editIconModalLabel" style="text-align:center;padding: 20px 0px 17px 0px;">Chọn một biểu tượng lớp học</h4>
      </div>
        <div class="mot-hang" style="background-color:white;margin-top:-4px;border-top:1px solid #e5e5e5;">
        <div class="noi-chua-image-edit">
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_baseball.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_baseball.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_art.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_art.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_apple_default.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_apple_default.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_basketball.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_basketball.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_chemistry.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_chemistry.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_dinosaur.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_dinosaur.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_earthscience.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_earthscience.png')" />            
            <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_football.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_football.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_geography.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_geography.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_government.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_government.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_history.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_history.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_literature.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_literature.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_math.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_math.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_music_default.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_music_default.png')" />
          
            <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_physics.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_football.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_piano.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_geography.png')" />

             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_reading.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_reading.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_rocket.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_rocket.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_science.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_science.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_soccer.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_soccer.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_sports_default.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_sports_default.png')" />
            <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_stats.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_stats.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_tech.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_tech.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_theatre.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_theatre.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_rocket.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_rocket.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_track.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_track.png')" />
             <img alt="image-main" style="float:left;margin-right:15px; cursor:pointer;" src="../resources/assets/img/classesAvatar/avatar_writing.png" height="65px" onclick="changePic('../resources/assets/img/classesAvatar/avatar_writing.png')" />
          </div>
       </div> 

    </div>
  </div>
</div>


<!-- Join Class Modal -->
<div class="modal fade" id="joinClassModal" tabindex="-1" role="dialog" aria-labelledby="joinClassModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open(array('url' => 'classes/joinclass', 'method' => 'post', 'id'=>'joinClassForm')) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="joinClassModalLabel">Tham gia lớp khác</h4>
      </div>
      <div class="modal-body">
        <span>
            Điền mã lớp
        </span>
        <form class="form-inline">
          <div class="form-group">
            <label class="sr-only" for="prefixClassCode">@</label>
            <div class="input-group">
              <div class="input-group-addon">@</div>
              <input type="text" class="form-control" id="classCode" placeholder="Điền mã lớp vào đây!">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Tham gia</button>
        </form>
        <span class="mot-hang-chu-edit"  data-toggle="modal" data-target="#SearchForClassInsteadModal" aria-haspopup="true" onclick="MoFormSearch()">
                    <a class="btn btn-link">Tìm kiếm một lớp học thay thế</a>
                </span>
       
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>

<!-- Search for class instead-->
<div class="modal fade" id="SearchForClassInsteadModal" tabindex="-1" role="dialog" aria-labelledby="searchClassModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open(array('url' => 'classes', 'method' => 'post', 'id'=>'searchClassInsteadForm')) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="SearchForClassInsteadModalLabel">Tìm kiếm một lớp học thay thế</h4>
      </div>
      <div class="modal-body">
        <span>
            Điền tên lớp
        </span>
        <form class="form-inline">
          <div class="form-group">
            <label class="sr-only" for="prefixClassCode">@</label>
            <div class="input-group">
              <div class="input-group-addon">@</div>
              <input type="text" class="form-control" id="className" placeholder="Enter class name">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Tham gia</button>
        </form>
          {!! Form::close() !!}
      </div>

    </div>
  </div>
</div>
<!-- Confirm remove participant class modal-->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel">
  <div class="modal-dialog" role="document" style="width:450px;">
    <div class="modal-content" >
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"
        style="position:absolute;left:95%;top:-20px;color:white;">
        X
        </button>
        <h4 class="modal-title" style="text-align:center;" id="helpModalLabel">Bạn có chắc rằng bạn muốn mời tất cả những người tham gia ra khỏi lớp?</h4>
         <span style="float:left;width:87%;margin-left:12%;
                   font-size:11px; color:gray;">
                   <h5>Một khi những người tham gia đã rời khỏi lớp, họ sẽ không nhận được thông báo từ Lớp học {{Session::get('sesClassId')->class_name}}</h5>
             </span>
        <div class="modal-body">
          <button type="button" data-dismiss="modal" class="btn">Thoát</button>
          <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Xóa</button>
        </div>   
      </div>       
      </div>
    </div>
</div>


<script>
  $('button[name="remove_parts_levels"]').on('click', function(e){
    var $form=$(this).closest('form');
    e.preventDefault();
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#delete', function (e) {
            $form.trigger('submit');
        });
});
</script>



<!-- Confirm delete class modal-->





<div class="modal fade" id="confirmRemove" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel">
  <div class="modal-dialog" role="document" style="width:450px;">
    <div class="modal-content" >
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"
        style="position:absolute;left:95%;top:-20px;color:white;">
        X
        </button>
        <h5 class="modal-title" style="text-align:center;" id="helpModalLabel">Xóa lớp này vĩnh viễn?</h5>
         <span style="float:left;width:87%;margin-left:12%;
                   font-size:11px; color:gray;">
                   <h5>Lớp học sẽ được xóa bỏ và không thể truy cập.</h5>
             </span>
        <div class="modal-body">
          <button type="button" data-dismiss="modal" class="btn">Thoát</button>
          <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Xóa</button>
        </div>   
      </div>       
      </div>
    </div>
</div>

<script>
  $('button[name="remove_levels"]').on('click', function(e){
    var $form=$(this).closest('form');
    e.preventDefault();
    $('#confirmRemove').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#delete', function (e) {
            $form.trigger('submit');
        });
});
</script>

<!--29/11/15-->
<!--THUAN-->
<!--Form thông tin member-->
{{-- Member Infomation Modal --}}
<div class="modal fade" id="MemberInfoModal" tabindex="-1" role="dialog" aria-labelledby="MemberInfoModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        
      </div>
      {{-- $idClass = Session::get('sesClassId')->class_id --}}
      
      
      <div class="modal-body">    
        <div class="mot-hang">
            <div class="mot-hang-30">
                <img alt="image-main" style="float:left;margin-right:15px;" src="../resources/assets/img/classesAvatar/avatar_baseball.png" height="65px"/>
                <div class="mot-hang-70">
                  <span class="mot-hang-chu-title">
                    {{Session::get('sesClassId')->class_name}}
                  </span>
                  <div class="mot-hang chat-title">
                    <span class="mot-hang-chu-description">
                      @if(count($members)>0) {{count($members)}} THÀNH VIÊN
                      @else 0 THÀNH VIÊN
                      @endif
                    </span>
                    <div class="button-search-chat">
            
                    </div>
                  </div>

                  <div class="group-list">
                    <ul class="menu-class">
                      <!--29/11/15-->
                      <!--THUAN-->
                      <!--Hien thi member-->
                      @foreach ($members as $member)
                      
                        
                        <li class="menu-class-child">
                          <font>

                              {{ $member->name }}
                          </font>
                        </li>        
                      
                      @endforeach
                      
                        <div class="button-add-student-parent-left"  onclick="MoFormAddParents()">
                          
                          Thêm học sinh và phụ huynh
                        </div>
                      
                    </ul>
                
                  </div>


                </div>
            </div>
            <div class="mot-hang-70">
                <form>
                    <span class="mot-hang">
                      {{Session::get('sesClassId')->name}}
                      {{Session::get('sesClassId')->email}}
                      <button  >...</button>
                       
                    </span>
                    
                </form>

                <div class="mot-hang chat-title">
                  Chi tiết
                  
                </div>
                  Không có thông tin chi tiết nào.
                <div class="mot-hang chat-title">
                  Các lớp hiện đang tham gia
                </div>
                <div class="group-list">
                  <ul class="menu-class">
                    <!--21/11/15-->
                    <!--LH-->
                    <!--Hien thi class-->
                    @foreach ($classes as $class)
                    <a href="/classes/{{$class->id}}" name="classid" id="classid"> 
                     <li class="menu-class-child">
                        <img alt="avatarclass"  src="../{!! $class->icon !!}"/>
                        <font>
                            {{ $class->class_name }}
                        </font>
                    </li>        
                    </a>
                        
                    @endforeach
                  </ul>
                
                </div>

              </div>

              
            </div>
            <div class="group-list">
              <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/classes/remove') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button class='btn btn-danger btn-xs' type="submit" name="remove_parts_levels" value="delete"><span class="fa fa-times"></span> Xóa tất cả thành viên</button>         
              </form>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

