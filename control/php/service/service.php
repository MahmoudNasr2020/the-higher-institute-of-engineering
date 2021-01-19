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
    $select=$con->prepare('SELECT * FROM service ORDER BY id DESC');
    $select->execute();
    $fetchglobal=$select->fetchAll();
    ?>
   
    <div class="main-panel">
          <div class="content-wrapper">
                     
               
          <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">بيانات الخدمات</h4>
                    <div class="form-group">
                        <div id='respnsv'></div>
                      </div>
                    <div class="">
                            <button type="button" class="btn btn-primary  btn-rounded mb-4"  
                                   id='add-element' 
                                   data-toggle="modal" 
                                   data-target="#modalSubscriptionForm">
                                          اضافة خدمة جديدة</button> <br>
                            </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> الصورة </th>
                            <th> اسم الخدمة </th>
                            <th> تعديل </th>
                            <th> حذف </th>
                            <th>عرض</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach($fetchglobal as $fe=>$fetch){ ?>
                                                          <tr>
                            <td>
                              <img src="../../../uploads/serves/<?php echo $fetch['img'] ?>" 
                              class="mr-2" alt="image"></td>
                            <td> <?php echo $fetch['name'] ?> </td>
                            <td>
                              <button type="button" class="btn btn-success update-element" 
                              style="padding: 10px;margin-right: -7px;" 
                              id="<?php echo $fetch['id'] ?>">تعديل</button>
                            </td>
                            <td> 
                                <button type="button" class="btn btn-danger delete-element" 
                                style="padding: 10px;margin-right: -7px;" 
                                id="<?php echo $fetch['id'] ?>">حذف</button>
                            </td>
                            <td> 
                            <button type="button" class="btn btn-info show-element" 
                            style="padding: 10px;margin-right: -7px;" 
                            id="<?php echo $fetch['id'] ?>">عرض</button>
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
                                     موديل الاسليدر
    <!------------------------------------------------------------------------->
    <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold" id='h4'>اضافة خدمة</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" id='form-service' enctype="multipart/form-data">
                    <div class="form-group">
                        <div id='respons'></div>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName1">اسم الخدمة</label>
                        <input type="text" class="form-control" id="name"  name ='name' placeholder="اسم الخدمة">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">لينك الخدمة (اختياري)</label>
                        <input type="text" class="form-control" id="link" name ='link'
                         placeholder="لينك الخدمة">
                      </div>
                      <div class="form-group">
                        <label id='text-img'>صورة الخدمة </label>
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" 
                          disabled placeholder="Upload Image" id='file-img'>
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
                                   نهاية موديل الاسليدر
<!------------------------------------------------------------------------->
<!-------------------------------------------------------------------------
                                    موديل حذف الخدمة
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
        <a href="" class="btn  btn-danger delete-button" id='' >نعم</a>
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
    <script>
      $(document).ready(function(){
        $('#add-element').on('click',function(){
          $('#id').val('');
          $('#respons').hide();
          $('#type').val('');
          $('#h4').text('اضافة خدمة');
          $('#text-img').text('صورة الخدمة');   
          $('#form-service')[0].reset();

        });
                /*-------------------------------------------------------------------
                                                  update
                --------------------------------------------------------------------*/

          $(document).on('click','.update-element',function(){
              var id=$(this).attr('id');
              $('#respons').hide();
              $('#file-img').val('');
              $('#h4').text('تعديل الخدمة');
              $.ajax({
                  url:'select.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('#name').val(data.name);
                    $('#link').val(data.link);
                    $('#type').val('update');
                    $('#id').val(data.id);
                    $('#text-img').text('صورة الخدمة (اختياري)');              
                    $('#modalSubscriptionForm').modal('show');

                  }
              });
                  

                });
                 /*-------------------------------------------------------------------
                                                  Delete
                --------------------------------------------------------------------*/

          $(document).on('click','.delete-element',function(){
              var id=$(this).attr('id');
              $.ajax({
                  url:'select.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('.delete-button').attr('id',data.id);
                    $('#modalConfirmDelete').modal('show');

                  }
              });
                  

                });
                   /*-------------------------------------------------------------------
                                                  Delete-element
                  --------------------------------------------------------------------*/
                  $('.delete-button').on('click',function(e){
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
                                                  Insert-update
                  --------------------------------------------------------------------*/
                  $('#form-service').on('submit',function(e){
                    e.preventDefault();
                    $.ajax({
                        url:'insert.php',
                        method:'POST',
                        data:new FormData(this),
                        cache:false,
                        contentType:false,
                        processData:false,
                        dataType:'json',
                        success:function(data){
                         if(data.respons=='error'){
                           $('#respons').html(data.error);
                           $('#respons').show();
                         }else{
                           $('#form-service')[0].reset();
                           $('.table').html(data.html);
                           $('#respnsv').html(data.content).show().fadeOut(5000);
                           $('#modalSubscriptionForm').modal('hide');
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
    
   <?php }
   ?>