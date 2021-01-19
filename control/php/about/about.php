<?php 
  include '../init/inithead.php';
  if($fetch_admin['statue'] != 0){ ?>
      <div class="main-panel">
      <div class="content-wrapper">
      <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
        <img src="../../../layout/pattern/error.png" class="img-fluid" alt="Responsive image"style="width: 70%;margin-right: 109px;">

      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- partial:partials/_footer.html -->
<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">جميع الحقوق محفوظة &copy; <a href="https://www.facebook.com/csc.o6i/" target="_blank">المعهد العالي للهندسة 2020</span>
            <a href="https://www.facebook.com/profile.php?id=100011445331879" target="_blank"><span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Devoloped By Mahmoud Nasr 
                <i class="fas fa-user-cog text-danger"></i></span>
                </a>
          </div>
</footer>
        <!-- partial -->
  <?php 
  include '../init/initfooter.php';
  
}else{ 
    
  $select=$con->prepare('SELECT * FROM about WHERE id = 1');
  $select->execute();
  $fetchglobal=$select->fetch();
  $selectmessage=$con->prepare('SELECT * FROM message WHERE id = 1');
  $selectmessage->execute();
  $fetchmessage=$selectmessage->fetch();
    ?>
     <div class="main-panel">
        <div class="content-wrapper">
                   
              <!-------------------------------------------------------------------------
                                    نبذة عن المعهد
             <!------------------------------------------------------------------------->
        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">نبذة عن المعهد</h4>
                  <div class="form-group">
                      <div id='respnsv'></div>
                    </div> 
                  <div class="table-responsive">
                    <table class="table" id='table1'>
                      <thead>
                        <tr>
                          <th> الصورة </th>
                          <th> العنوان </th>
                          <th> تعديل </th>
                          <th>عرض</>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <img src="../../../uploads/aboutinstitute/<?php echo $fetchglobal['img']; ?>" class="mr-2" alt="image"></td>
                            <td><?php echo $fetchglobal['title']; ?></td>
                          <td>
                            <button type="button" class="btn btn-success update" 
                            style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchglobal['id']; ?>'
                            data-toggle="modal" data-target="#modalSubscriptionForm"
                            >تعديل</button>
                          </td>
                          <td> 
                          <button type="button" class="btn btn-info show-about" 
                          style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchglobal['id']; ?>'>عرض</button>
                          </td>
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <!-------------------------------------------------------------------------
                                   موديل الرؤية  
          <!------------------------------------------------------------------------->
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">الرؤية والرسالة والاهداف </h4>
                  <div class="form-group">
                      <div id='respnsv-message'></div>
                    </div>
                  <div class="table-responsive">
                    <table class="table" id='table2'>
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> تعديل </th>
                          <th>عرض</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            الرؤية والرسالة والاهداف
                          <td>
                            <button type="button" class="btn btn-success update-message" 
                            style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchmessage['id']; ?>'
                            data-toggle="modal" data-target="#message-modal"
                            >تعديل</button>
                          </td>
                          <td> 
                          <button type="button" class="btn btn-info show-message"
                          id='<?php echo $fetchmessage['id']; ?>' 
                          style="padding: 10px;margin-right: -7px;">عرض</button>
                          </td>
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </div>
        
<!-- partial:partials/_footer.html -->
<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">جميع الحقوق محفوظة &copy; <a href="https://www.facebook.com/csc.o6i/" target="_blank">المعهد العالي للهندسة 2020</span>
            <a href="https://www.facebook.com/profile.php?id=100011445331879" target="_blank"><span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Devoloped By Mahmoud Nasr 
                <i class="fas fa-user-cog text-danger"></i></span>
                </a>
          </div>
</footer>
        <!-- partial -->
  </div>
  </div>
  <!-------------------------------------------------------------------------
                                   موديل نبذة عن المعهد
  <!------------------------------------------------------------------------->
  <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold h-about">نبذة عن المعهد</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      
    <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" id='form-about'>
                  <div class="form-group">
                      <div id='respons'></div>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputName1">العنوان</label>
                      <input type="text" class="form-control" id="title" name='title'
                      placeholder="العنوان">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">الوصف</label>
                      <textarea class="form-control" id="text" name='text' rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label>صورة القسم </label>
                      <input type="file" name="img" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" 
                          type="button" style="margin: 0;">رفع </button>
                        </span>
                      </div>
                    </div>
                    <input type='hidden' id='id' value='' name='id'>
                    <input type='hidden' id='type' value='' name='type'>
                    <button type="submit" class="btn btn-gradient-primary mr-2">حفظ</button>
                    <button class="btn btn-light" data-dismiss="modal">الغاء</button>
                  </form>
                </div>
              </div>
            </div>
             
    
  </div>
</div>
</div>

<!-------------------------------------------------------------------------
                                 نهاية موديل نبذة عن المعهد
<!------------------------------------------------------------------------->
<!-------------------------------------------------------------------------
                                  موديل عرض النبذة
<!------------------------------------------------------------------------->
<!-- Button trigger modal -->
<!-- Full Height Modal Right -->
<div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">

<!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
<div class="modal-dialog modal-full-height modal-right" role="document">

  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">عرض العنصر</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id='modal_showabout'>
      
    </div>
    <div class="modal-footer justify-content-center">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- Full Height Modal Right -->
<!-------------------------------------------------------------------------
                                  نهاية موديل عرض النبذة
<!------------------------------------------------------------------------->

<!-------------------------------------------------------------------------
                                   موديل الرؤية الرسالة والاهداف
  <!------------------------------------------------------------------------->
  <div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold h-message">الرؤية والرسالة</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      
    <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" id='form-message'>
                  <div class="form-group">
                      <div id='respons-message'></div>
                  </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">الرؤية</label>
                      <textarea class="form-control" id="version" name='version' rows="4"></textarea>
                    </div> 
                    <div class="form-group">
                      <label for="exampleTextarea1">الرسالة</label>
                      <textarea class="form-control" id="message" name='message' rows="4"></textarea>
                    </div> 
                    <div class="form-group">
                      <label for="exampleTextarea1">الاهداف</label>
                      <textarea class="form-control" id="aims" name='aims' rows="4"></textarea>
                    </div>
                    <input type='hidden' id='id-message' value='' name='id-message'>
                    <input type='hidden' id='type-message' value='' name='type-message'>
                    <button type="submit" class="btn btn-gradient-primary mr-2">حفظ</button>
                    <button class="btn btn-light" data-dismiss="modal">الغاء</button>
                  </form>
                </div>
              </div>
            </div>
             
    
  </div>
</div>
</div>

<!-------------------------------------------------------------------------
                                 نهاية موديل الرؤية الرسالة والاهداف
<!------------------------------------------------------------------------->
<!-------------------------------------------------------------------------
                                  موديل عرض الرؤية
<!------------------------------------------------------------------------->
<!-- Button trigger modal -->
<!-- Full Height Modal Right -->
<div class="modal fade right" id="showmessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">

<!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
<div class="modal-dialog modal-full-height modal-right" role="document">

  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">عرض العنصر</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id='modal_showmessage'>
      
    </div>
    <div class="modal-footer justify-content-center">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- Full Height Modal Right -->
<!-------------------------------------------------------------------------
                                  نهاية موديل عرض الرؤية
<!------------------------------------------------------------------------->
  
  <?php 
  include '../init/initfooter.php';
  ?>
  <script src='../../layout/js/file-upload.js'></script>
  <script>
     $(document).ready(function(){
                 
       /*-------------------------------------------------------------------
       
                                          update about
       --------------------------------------------------------------------*/

        $(document).on('click','.update',function(){
          var id=$(this).attr('id');
          $('.file-upload-info').val('');
          $('#exampleTextarea1').text('');
          $.ajax({
             url:'selectabout.php',
             method:'POST',
             data:{id:id},
             dataType:'json',
             success:function(data){
               $('#title').val(data.title);
                $('#text').text(data.text);
                $('#type').val('update');
                $('#id').val(data.id);
                $('.h-about').text('تعديل عن المعهد');
                $('#respons').hide();
                $('#modalSubscriptionForm').modal('show');
             }
          });
        });
           /*-------------------------------------------------------------------
                                              insert,update about
          --------------------------------------------------------------------*/
          $('#form-about').on('submit',function(e){
            e.preventDefault();
            
            $.ajax({
              url:'insertabout.php',
              method:'POST',
              data:new FormData(this),
              contentType:false,
              processData:false,
              cache:false,                
              dataType:'json',
              success:function(data){
                    if(data.respons=='error'){
                      $('#respons').show();
                      $('#respons').html(data.error);
                    } else{
                      $('#table1').html(data.html);
                      $('#modalSubscriptionForm').modal('hide'); 
                      $('#respnsv').html(data.content).show().fadeOut(5000);
                      
                    }             
              }
            });
          });

           /*-------------------------------------------------------------------
                                              show  about
          --------------------------------------------------------------------*/
          $(document).on('click','.show-about',function(){
            var id=$(this).attr('id');
            $.ajax({
              url:'showabout.php',
              method:'POST',
              data:{id:id},
              dataType:'json',
              success:function(data){
                $('#modal_showabout').html(data.content);  
                $('#fullHeightModalRight').modal('show');                  
              }
            });
          });
           /*-------------------------------------------------------------------
       
                                          update message
            --------------------------------------------------------------------*/

        $(document).on('click','.update-message',function(){
          var id=$(this).attr('id');
          $.ajax({
             url:'selectmessage.php',
             method:'POST',
             data:{id:id},
             dataType:'json',
             success:function(data){
                $('#version').text(data.version);
                $('#message').text(data.message);
                $('#aims').text(data.aims);
                $('#type-message').val('update');
                $('#id-message').val(data.id);
                $('.h-message').text('تعديل الرؤية والرسالة والاهداف');
                $('#respons-message').hide();
                $('#message-modal').modal('show');
             }
          });
        });
           /*-------------------------------------------------------------------
                                              insert,update message
          --------------------------------------------------------------------*/
          $('#form-message').on('submit',function(e){
            e.preventDefault();
            
            $.ajax({
              url:'insertmessage.php',
              method:'POST',
              data:new FormData(this),
              contentType:false,
              processData:false,
              cache:false,                
              dataType:'json',
              success:function(data){
                    if(data.respons=='error'){
                      $('#respons-message').show();
                      $('#respons-message').html(data.error);
                    } else{
                      $('#table2').html(data.html);
                      $('#message-modal').modal('hide'); 
                      $('#respnsv-message').html(data.content).show().fadeOut(5000);
                      
                    }             
              }
            });
          });

           /*-------------------------------------------------------------------
                                              show  message
          --------------------------------------------------------------------*/
          $(document).on('click','.show-message',function(){
            var id=$(this).attr('id');
            $.ajax({
              url:'showmessage.php',
              method:'POST',
              data:{id:id},
              dataType:'json',
              success:function(data){
                $('#modal_showmessage').html(data.content);  
                $('#showmessage').modal('show');                  
              }
            });
          });

     });
  </script>

<?php }
?>
  
 