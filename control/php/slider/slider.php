<link rel="stylesheet" href='../../layout/css/dataTables.bootstrap4.css'>
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
      $select=$con->prepare('SELECT * FROM slider ');
      $select->execute();
      $fetchglobal=$select->fetchAll();
      ?>
     
      <div class="main-panel">
            <div class="content-wrapper">
            
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">بيانات الاسليدر</h4>
                  <div class="row">
                    <div class="col-12">
  
                       <div class="form-group">
                          <div id='respnsv'></div>
                        </div>      
                              <button type="button" class="btn btn-primary btn-rounded mb-4" id='addsilder' 
                                     data-toggle="modal" data-target="#modalSubscriptionForm">
                                            اضافة عنصر جديد</button> <br>
                    
                              
                      <br><table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>الرقم</th>
                            <th>تاريخ الاضافة</th>
                            <th>الصورة</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                            <th>عرض</th>
                            
                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach($fetchglobal as $fet=>$fe){ ?>
                              
                          <tr>
                            <td><?php echo $fe['id']; ?></td>
                            <td><?php echo $fe['date']; ?></td>
                            <td>
                                <img src="../../../uploads/slider/<?php echo $fe['img'] ; ?>" 
                                class="mr-2" alt="image"> 
                            </td> 
                            <td>
                                   <button type="button" id=<?php echo $fe['id']; ?>
                                   class="btn btn-success editsilder" >تعديل</button>
                            </td>
                            <td>
                                   <button type="button" id=<?php echo $fe['id']; ?>
                                   class="btn btn-danger deletesilder">حذف</button>
                            </td>
                            <td>
                                  <button type="button" id=<?php echo $fe['id']; ?>
                                  class="btn btn-info show-element">عرض</button>
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
                                       موديل الاسليدر
      <!------------------------------------------------------------------------->
      <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id='h4'>اضافة سليدر</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          
        <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <form class="forms-sample form-silder" enctype="multipart/form-data" id='from_slider'>
                      <div class="form-group">
                          <div id='respons'></div>
                        </div>
                      <div class="form-group">
                          <label for="exampleTextarea1">نص الخبر</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="4" name='message' ></textarea>
                        </div>
                        <div class="form-group">
                          <label id='label'>رفع الصورة</label>
                          <input type="file" name="img" class="file-upload-default" value="" id='img'>
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" id='img-text'
                            disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-gradient-primary" 
                              type="button" style="margin: 0;">رفع </button>
                            </span>
                          </div>
                        </div>
                        <input type='hidden' value='' name='id' id='id'>
                        <input type='hidden' value='' name='type' id='type'>
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
                                     نهاية موديل الاسليدر
  <!------------------------------------------------------------------------->
  
  <!-------------------------------------------------------------------------
                                      موديل حذف الاسليدر
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
                                      موديل العرض
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
        <div class="modal-body" id='modal_show'>
          
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Full Height Modal Right -->
  <!-------------------------------------------------------------------------
                                      نهاية موديل العرض
  <!------------------------------------------------------------------------->
      
      <?php 
      include '../init/initfooter.php';
      ?>
      <script src='../../layout/js/file-upload.js'></script>
      <script src='../../layout/js/jquery.dataTables.js'></script>
      <script src='../../layout/js/dataTables.bootstrap4.js'></script>
      <script src='../../layout/js/data-table.js'></script>
  
      <script>
         $(document).ready(function(){
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
           
                                              update
           --------------------------------------------------------------------*/
  
            $(document).on('click','.editsilder',function(){
              var id=$(this).attr('id');
              $('#img-text').val('');
              $('#label').text('رفع الصورة (اختياري)');
              $.ajax({
                 url:'select.php',
                 method:'POST',
                 data:{id:id},
                 dataType:'json',
                 success:function(data){
                    $('#exampleTextarea1').text(data.text);
                    $('#type').val('update');
                    $('#id').val(data.id);
                    $('#h4').text('تعديل الاسليدر');
                    $('#respons').hide();
                    $('#modalSubscriptionForm').modal('show');
                 }
              });
            });
                  /*-------------------------------------------------------------------
                                                    delete show
                  --------------------------------------------------------------------*/
  
            $(document).on('click','.deletesilder',function(){
              var id=$(this).attr('id');
              $.ajax({
                 url:'select.php',
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
                                                    delete 
              --------------------------------------------------------------------*/
              $(document).on('click','.delete-element',function(e){
                e.preventDefault();
                var id=$(this).attr('id');
                $.ajax({
                  url:'delete.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                       $('.table').html(data.content);
                       $('#modalConfirmDelete').modal('hide');                   
                  }
                });
              });
               /*-------------------------------------------------------------------
                                                  insert,update 
              --------------------------------------------------------------------*/
              $('.form-silder').on('submit',function(e){
                e.preventDefault();
                
                $.ajax({
                  url:'insert.php',
                  method:'POST',
                  data:new FormData(this),
                  contentType:false,
                  processData:false,
                  cache:false,
                  dataType:'json',
                  success:function(data){
                        if(data.respnos=='error'){
                          $('#respons').show();
                          $('#respons').html(data.content);
                        } else{
                          $('#from_slider')[0].reset();
                          $('#order-listing').html(data.html);
                          $('#modalSubscriptionForm').modal('hide'); 
                          $('#respnsv').html(data.responsv).show().fadeOut(5000);
                          
                          
                        }             
                  }
                });
              });
  
               /*-------------------------------------------------------------------
                                                  show 
              --------------------------------------------------------------------*/
              $(document).on('click','.show-element',function(){
                var id=$(this).attr('id');
                $.ajax({
                  url:'show.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('#modal_show').html(data.content);  
                    $('#fullHeightModalRight').modal('show');                  
                  }
                });
              });
  
         });
      </script>
<?php   }
   ?>