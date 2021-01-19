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
      $selectabout=$con->prepare('SELECT * FROM aboutind WHERE id = 1');
      $selectabout->execute();
      $fetchabout=$selectabout->fetch();
      $selectmessage=$con->prepare('SELECT * FROM indmessage WHERE id = 1');
      $selectmessage->execute();
      $fetchmessage=$selectmessage->fetch();
      $selecttable=$con->prepare('SELECT * FROM indtable ORDER BY id DESC');
      $selecttable->execute();
      $fetchtable=$selecttable->fetchAll();
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
                    <h4 class="card-title">قسم الهندسة الصناعية</h4><br>
                    <div class="form-group">
                          <div id='respnsv-about'></div>
                    </div> 
                      <h4 class="card-title">نبذة عن المعهد</h4>
                      <div class="table-responsive">
                        <table class="table table-about">
                          <thead>
                            <tr>
                              <th> الصورة </th>
                              <th> تعديل </th>
                              <th>عرض</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <img src="../../../uploads/industrial/<?php echo $fetchabout['img']; ?>" class="mr-2" alt="image"></td>
                              <td>
                                <button type="button" class="btn btn-success update" 
                                style="padding: 10px;margin-right: -7px;"
                                data-toggle="modal" data-target="#modalSubscriptionForm"
                                id='<?php echo $fetchabout['id']; ?>'
                                >تعديل</button>
                              </td>
                              <td> 
                              <button type="button" class="btn btn-info show-about" 
                              id='<?php echo $fetchabout['id']; ?>' 
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
               <!-------------------------------------------------------------------------
                                       موديل الرؤية  
              <!------------------------------------------------------------------------->
              <div class="row">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">الرؤية والرسالة والاهداف</h4>
                      <div class="form-group">
                          <div id='respnsv-message'></div>
                        </div>
                      <div class="table-responsive">
                        <table class="table" id="table2">
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
                                style="padding: 10px;margin-right: -7px;"
                                id='<?php echo $fetchmessage['id']; ?>'
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
               <!-------------------------------------------------------------------------
                                        الجداول  
              <!------------------------------------------------------------------------->
              <div class="row">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">الجداول</h4>
                      <div class="form-group">
                          <div id='respnsvtable'></div>
                        </div>
                      <div class="">
                              <button type="button" class="btn btn-primary  btn-rounded mb-4"
                              id='add-table' data-toggle="modal" data-target="#tables">
                                            اضافة جدول جديد</button> <br>
                              </div>
                      <div class="table-responsive">
                        <table class="table civiltable">
                          <thead>
                            <tr>
                              <th> الاسم </th>
                              <th> تعديل </th>
                              <th> حذف </th>
                              <th>عرض</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              foreach($fetchtable as $fetchtabl=>$fetchtab){ ?>
                                <tr>
                                <td>
                                  <?php echo $fetchtab['text']; ?>
                                <td>
                                  <button type="button" class="btn btn-success edittable"
                                  id='<?php echo $fetchtab['id']; ?> '
                                  data-toggle="modal" data-target="#tables"
                                  style="padding: 10px;margin-right: -7px;"
                                  
                                  >تعديل</button>
                                </td>
                                <td>
                                     <button type="button" id='<?php echo $fetchtab['id']; ?>'
                                     data-toggle="modal" data-target="#modalConfirmDelete"
                                     class="btn btn-danger deletetable"
                                     style="padding: 10px;margin-right: -7px;"
                                     >حذف</button>
                              </td>
                                <td> 
                                <button type="button" class="btn btn-info showtable" 
                                id='<?php echo $fetchtab['id']; ?>'
                                data-toggle="modal" data-target="#modal-showtable"
                                style="padding: 10px;margin-right: -7px;">عرض</button>
                                </td>
                              </tr>
                              <?php }
                            ?>
                            
                           
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
                          <div id='respons-about'></div>
                      </div>
                        <div class="form-group">
                          <label for="exampleTextarea1">الوصف</label>
                          <textarea class="form-control" id="textabout" name='textabout' rows="4"></textarea>
                        </div>
                        <div class="form-group">
                          <label>صورة القسم </label>
                          <input type="file" name="img" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info file-about disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-gradient-primary" 
                              type="button" style="margin: 0;">رفع </button>
                            </span>
                          </div>
                        </div>
                        <input type='hidden' id='id-about' value='' name='id-about'>
                        <input type='hidden' id='type-about' value='' name='type-about'>
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
                                       موديل الرؤية 
      <!------------------------------------------------------------------------->
      <div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold h-message"> الرؤية والرسالة والاهداف</h4>
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
                                      نهاية موديل عرض النبذة
  <!------------------------------------------------------------------------->
  <!-------------------------------------------------------------------------
                                       موديل الجداول
      <!------------------------------------------------------------------------->
      <div class="modal fade" id="tables" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold h4">الجداول</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          
        <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <form class="forms-sample form-table">
                      <div class="form-group">
                          <div id='responstable'></div>
                      </div>
                        <div class="form-group">
                          <label for="exampleTextarea1">اسم الجدول</label>
                          <textarea class="form-control" id="text-table" name='text-table' rows="4"></textarea>
                        </div> 
                        <div class="form-group">
                          <label id='label'>ملف الجدول</label>
                          <input type="file" name="file" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info file-file" disabled placeholder="Upload File">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-gradient-primary" 
                              type="button" style="margin: 0;">رفع </button>
                            </span>
                          </div>
                        </div>
                        <input type='hidden' id='id-table' value='' name='id-table'>
                        <input type='hidden' id='type-table' value='' name='type-table'>
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
                                     نهاية موديل الجداول  
  <!------------------------------------------------------------------------->
  <!-------------------------------------------------------------------------
                                      موديل حذف جدول
  <!------------------------------------------------------------------------->
  <!-- Button trigger modal-->
  
  <!--Modal: modalConfirmDelete-->
  <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
      <!--Content-->
      <div class="modal-content text-center">
        <!--Header-->
        <div class="modal-header d-flex justify-content-center">
          <p class="heading">هل انت متاكد؟</p>
        </div>
  
        <!--Body-->
        <div class="modal-body">
  
          <i class="fas fa-times fa-4x animated rotateIn"></i>
  
        </div>
  
        <!--Footer-->
        <div class="modal-footer flex-center">
          <a href="" class="btn  btn-danger delete-element" id='' >نعم</a>
          <a type="button" class="btn  btn-outline-danger waves-effect" data-dismiss="modal">لا</a>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: modalConfirmDelete-->
  
  <!-------------------------------------------------------------------------
                                     نهاية موديل الحذف
  <!------------------------------------------------------------------------->
  <!-------------------------------------------------------------------------
                                      موديل عرض الجدول
  <!------------------------------------------------------------------------->
  <!-- Button trigger modal -->
  <!-- Full Height Modal Right -->
  <div class="modal fade right" id="modal-showtable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
        <div class="modal-body" id='modal_show_table'>
          
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Full Height Modal Right -->
  <!-------------------------------------------------------------------------
                                      نهاية موديل عرض الجدول
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
              $('.file-about').val('');
              $('#textabout').text('');
              $.ajax({
                 url:'selectaboutind.php',
                 method:'POST',
                 data:{id:id},
                 dataType:'json',
                 success:function(data){
                    $('#textabout').text(data.text);
                    $('#type-about').val('update');
                    $('#id-about').val(data.id);
                    $('.h-about').text('تعديل عن المعهد');
                    $('#respons-about').hide();
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
                  url:'insertaboutind.php',
                  method:'POST',
                  data:new FormData(this),
                  contentType:false,
                  processData:false,
                  cache:false,                
                  dataType:'json',
                  success:function(data){
                        if(data.respons=='error'){
                          $('#respons-about').show();
                          $('#respons-about').html(data.error);
                        } else{
                          $('.table-about').html(data.html);
                          $('#modalSubscriptionForm').modal('hide'); 
                          $('#respnsv-about').html(data.content).show().fadeOut(5000);
                          
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
                  url:'showaboutind.php',
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
           
                                              update message الرؤية
                --------------------------------------------------------------------*/
  
            $(document).on('click','.update-message',function(){
              var id=$(this).attr('id');
              $.ajax({
                 url:'selectmessageind.php',
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
                  url:'insertmessageind.php',
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
                  url:'showmessageind.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('#modal_showmessage').html(data.content);  
                    $('#showmessage').modal('show');                  
                  }
                });
              });
              $('#addsilder').on('click',function(){
              $('#id').val('');
              $('#label').text('رفع الصورة');
              $('#exampleTextarea1').text('');
              $('#h4').text('اضافة سليدر');
              $('#respons').hide();
              $('#type').val('');
              $('#from_slider')[0].reset();
            });
            
           /*-------------------------------------------------------------------
           
                                              insert-table
           --------------------------------------------------------------------*/
           $('#add-table').on('click',function(){
                    $('#text-table').val('');
                    $('#text-table').text('');
                    $('#type-table').val('');
                    $('#id-table').val('');
                    $('#h4').text('ادخال الجدول');
                    $('#label').text('رفع الملف ');
                    $('#responstable').hide();
                    $('.form-table')[0].reset();
            });
           
           /*-------------------------------------------------------------------
           
                                              update-table
           --------------------------------------------------------------------*/
  
            $(document).on('click','.edittable',function(){
              var id=$(this).attr('id');
              $('file-file').val('');
              $('#label').text('رفع الملف (اختياري)');
              $.ajax({
                 url:'selecttableind.php',
                 method:'POST',
                 data:{id:id},
                 dataType:'json',
                 success:function(data){
                    $('#text-table').val(data.text);
                    $('#text-table').text(data.text);
                    $('#type-table').val('update');
                    $('#id-table').val(data.id);
                    $('#h4').text('تعديل الجدول');
                    $('#responstable').hide();
                    $('#tables').modal('show');
                    $('.form-table')[0].reset();
                 }
              });
            });
                  /*-------------------------------------------------------------------
                                                    delete show table
                  --------------------------------------------------------------------*/
  
            $(document).on('click','.deletetable',function(){
              var id=$(this).attr('id');
              $.ajax({
                 url:'selecttableind.php',
                 method:'POST',
                 data:{id:id},
                 dataType:'json',
                 success:function(data){
                    $('.delete-element').attr('id',data.id);
                    $('#modalConfirmDelete').modal('show');
                 }
              });
            });
             /*-------------------------------------------------------------------
                                                    delete table
              --------------------------------------------------------------------*/
              $(document).on('click','.delete-element',function(e){
                e.preventDefault();
                var id=$(this).attr('id');
                $.ajax({
                  url:'deleteind.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                       $('.civiltable').html(data.content);
                       $('#modalConfirmDelete').modal('hide');                   
                  }
                });
              });
               /*-------------------------------------------------------------------
                                                  insert,update table
              --------------------------------------------------------------------*/
              $('.form-table').on('submit',function(e){
                e.preventDefault();
                
                $.ajax({
                  url:'inserttableind.php',
                  method:'POST',
                  data:new FormData(this),
                  contentType:false,
                  processData:false,
                  cache:false,
                  dataType:'json',
                  success:function(data){
                        if(data.respnos=='error'){
                          $('#responstable').show();
                          $('#responstable').html(data.content);
                        } else{
                          
                          $('.civiltable').html(data.html);
                          $('#tables').modal('hide'); 
                          $('#respnsvtable').html(data.responsv).show().fadeOut(5000);
                          
                        }             
                  }
                });
              });
  
               /*-------------------------------------------------------------------
                                                  show table
              --------------------------------------------------------------------*/
              $(document).on('click','.showtable',function(){
                var id=$(this).attr('id');
                $.ajax({
                  url:'showtableind.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('#modal_show_table').html(data.content);  
                    $('#modal-showtable').modal('show');                  
                  }
                });
              });
  
         });
              </script>
    <?php }
   ?>