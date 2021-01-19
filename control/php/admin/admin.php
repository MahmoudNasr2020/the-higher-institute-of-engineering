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
    $select_admin=$con->prepare('SELECT * FROM admin ORDER BY id DESC');
    $select_admin->execute();
    $fetchadmin=$select_admin->fetchAll();
   ?>
    <div class="main-panel">
          <div class="content-wrapper">
                     
               
          <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">بيانات المشرفين</h4>
                    <div class="form-group">
                        <div id='respnsvmanager'></div>
                      </div>
                    <div class="">
                            <button type="button" class="btn btn-primary btn-rounded mb-4"  
                                   id='add-manager' data-toggle="modal" data-target="#modalSubscriptionForm">
                                          اضافة مشرف جديد</button> <br>
                            </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> الصورة </th>
                            <th> الاسم</th>
                            <th> تعديل </th>
                            <th> حذف </th>
                            <th>عرض</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach($fetchadmin as $fetchadmi=>$fetchad){ ?>
                                <tr>
                                  <td>
                                    <img src="../../../uploads/admin/<?php echo $fetchad['img']; ?>" class="mr-2" alt="image"></td>
                                  <td><?php echo $fetchad['name']; ?></td>
                                  <td>
                                    <button type="button" class="btn btn-success update-manager" 
                                    style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchad['id']; ?>'>تعديل</button>
                                  </td>
                                  <td> 
                                      <button type="button" class="btn btn-danger delete-manager" 
                                      style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchad['id']; ?>'>حذف</button>
                                  </td>
                                  <td> 
                                  <button type="button" class="btn btn-info show-manager" 
                                  style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchad['id']; ?>'>عرض</button>
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
        <h4 class="modal-title w-100 font-weight-bold" id='h4'>اضافة مشرف</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample form-admin" id='form-manager'>
                    <h4 class="h4-edit" style="
                      font-size: 10px;
                  "></h4>
                    <div class="form-group">
                        <div id='respons-manager'></div>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName1">الاسم</label>
                        <input type="text" class="form-control" id="name" name='name' placeholder="الاسم">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">الايميل</label>
                        <input type="email" class="form-control" id="email" name='email' placeholder="الايميل">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">كلمة السر</label>
                        <input type="password" class="form-control" id="password" name='password' placeholder="كلمة السر">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1"> تاكيد كلمة السر </label>
                        <input type="password" class="form-control" id="passwordverfiy" name='passwordverfiy' placeholder="كلمة السر">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">الدور</label>
                        <select class="form-control" name='statue' id="statue" 
                        style="direction: rtl;
                          ">
                            
                               <option value="0">مشرف</option>
                               <option value="1">اتحاد طلاب</option>
                         
                        </select>
                      </div>
                      <div class="form-group">
                        <label id='text-img-manager'>صورة المشرف </label>
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" id='file-img-manager' disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" 
                            type="button" style="margin: 0;">رفع </button>
                          </span>
                        </div>
                      </div>
                      <input type='hidden' id='id-manager' value='' name='id-manager'>
                      <input type='hidden' id='type-manager' value='' name='type-manager'>
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
                                    موديل حذف اداري
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
        <a href="" class="btn  btn-danger delete-button-manager" id='' >نعم</a>
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
                                    موديل عرض اداري
<!------------------------------------------------------------------------->
<!-- Button trigger modal -->
<!-- Full Height Modal Right -->
<div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-right" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">عرض المشرفين</h4>
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
          $('#add-manager').on('click',function(){
          $('#id-manager').val('');
          $('#name').val('');
          $('#email').val('');
          $('#password').val('');
          $('#h4').text('اضافة مشرف');
          $('.h4-edit').text('');
          $('#respons-manager').hide();
          $('#type-manager').val('');
          $('#file-img-manager').val('');
          $('#text-img-manager').text('صورة المشرف (اختياري)');   
          $('#form-manager')[0].reset();

        });
                /*-------------------------------------------------------------------
                                                  update
                --------------------------------------------------------------------*/

          $(document).on('click','.update-manager',function(){
              var id=$(this).attr('id');
              $('#respons-manager').hide();
              $('#file-img-manager').val('');
              $('#passwordverfiy').val('');
              $.ajax({
                  url:'selectmanager.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('#name').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#h4').text('تعديل البيانات');
                    $('.h4-edit').text('ملحوظة : ان لم يتم ادخال اي بيانات سيتم حفظ بياناتك المسجلة لدينا');
                    $('#type-manager').val('update');
                    $('#id-manager').val(data.id);
                    $('#text-img-manager').text('صورة المشرف (اختياري)');   
                    if(data.statue == 0){
                      $('#statue').html('<option value="0">مشرف</option> <option value="1">اتحاد طلاب</option>');
                    }else{
                      $('#statue').html('<option value="1">اتحاد طلاب</option><option value="0">مشرف</option> ');
                    }      
                    $('#modalSubscriptionForm').modal('show');


                  }
              });
                  

                });
                 /*-------------------------------------------------------------------
                                                  Delete
                --------------------------------------------------------------------*/

          $(document).on('click','.delete-manager',function(){
              var id=$(this).attr('id');
              $.ajax({
                  url:'selectmanager.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('.delete-button-manager').attr('id',data.id);
                    $('#modalConfirmDelete').modal('show');

                  }
              });
                  

                });
                   /*-------------------------------------------------------------------
                                                  Delete-element
                  --------------------------------------------------------------------*/
                  $('.delete-button-manager').on('click',function(e){
                    e.preventDefault();
                    var id=$(this).attr('id');
                    $.ajax({
                        url:'deletemanager.php',
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
                  $('#form-manager').on('submit',function(e){
                    e.preventDefault();
                    $.ajax({
                        url:'insertmanager.php',
                        method:'POST',
                        data:new FormData(this),
                        cache:false,
                        contentType:false,
                        processData:false,
                        dataType:'json',
                        success:function(data){
                         if(data.name=='error' || data.email=='error' || data.pass=='error' || data.file=='error'){
                            $('#respons-manager').html(data.error);
                            $('#respons-manager').show();
                         }else{
                           $('.table').html(data.html);
                           $('#form-manager')[0].reset();
                           $('#respnsvmanager').html(data.content).show().fadeOut(5000);
                           $('#modalSubscriptionForm').modal('hide');
                         }
                    }
              });
                  

                });
                /*-------------------------------------------------------------------
                                                  show
                  --------------------------------------------------------------------*/
                  $(document).on('click','.show-manager',function(){
                    var id=$(this).attr('id');
                    $.ajax({
                      url:'show-manager.php',
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