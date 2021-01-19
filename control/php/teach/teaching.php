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
    $select_manager=$con->prepare('SELECT * FROM techmanager ORDER BY id DESC');
    $select_manager->execute();
    $fetchmanager=$select_manager->fetchAll();
    $select_doctor=$con->prepare('SELECT * FROM techdoctor ORDER BY id DESC');
    $select_doctor->execute();
    $fetchdoctor=$select_doctor->fetchAll();
    $select_ass=$con->prepare('SELECT * FROM techass ORDER BY id DESC');
    $select_ass->execute();
    $fetchass= $select_ass->fetchAll();
    ?>
   
    <div class="main-panel">
          <div class="content-wrapper">
                     
               
          <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">هيئة التدريس</h4><br>
                    <h4 class="card-title">الادارة</h4>
                    <div class="form-group">
                        <div id='respnsvmanager'></div>
                      </div>
                    <div class="">
                            <button type="button" class="btn btn-primary  btn-rounded mb-4"  
                                   data-toggle="modal" id='add-manager'
                                   data-target="#modalSubscriptionForm">
                                          اضافة اداري جديد</button> <br>
                            </div>
                    <div class="table-responsive">
                      <table class="table table-manager">
                        <thead>
                          <tr>
                            <th> الصورة </th>
                            <th>الاسم </th>
                            <th> تعديل </th>
                            <th> حذف </th>
                            <th>عرض</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                              foreach($fetchmanager as $fetchmanage=>$fetchmanag){ ?>
                                 <tr>
                                    <td>
                                      <img src="../../../uploads/teaching/<?php echo $fetchmanag['img']; ?>" class="mr-2" alt="image"></td>
                                    <td><?php echo $fetchmanag['name']; ?></td>
                                    <td>
                                      <button type="button" class="btn btn-success update-manager" 
                                      style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchmanag['id']; ?>'>تعديل</button>
                                    </td>
                                    <td> 
                                        <button type="button" class="btn btn-danger delete-manager" 
                                        style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchmanag['id']; ?>'>حذف</button>
                                    </td>
                                    <td> 
                                    <button type="button" class="btn btn-info show-manager" 
                                    style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchmanag['id']; ?>'>عرض</button>
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
              
        <!-------------------------------------------------------------------------
                                      الدكاترة
    <!------------------------------------------------------------------------->
          
          <br><br><div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">هيئة التدريس</h4><br>
                    <h4 class="card-title">الدكاترة</h4>
                    <div class="form-group">
                        <div id='respnsvdoctor'></div>
                      </div>
                    <div class="">
                            <button type="button" id='add-doctor'
                            class="btn btn-primary btn-rounded mb-4 waves-effect waves-light" 
                            data-toggle="modal" data-target="#doctor">
                                          اضافة دكتور جديد </button> <br>
                            </div>
                    <div class="table-responsive">
                      <table class="table table-doctor">
                        <thead>
                          <tr>
                            <th> الصورة </th>
                            <th> الاسم </th>
                            <th> تعديل </th>
                            <th> حذف </th>
                            <th>عرض</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                              foreach($fetchdoctor as $fetchdoct=>$fetchdoc){ ?>
                                 <tr>
                                    <td>
                                      <img src="../../../uploads/teaching/<?php echo $fetchdoc['img']; ?>" class="mr-2" alt="image"></td>
                                    <td><?php echo $fetchdoc['name']; ?></td>
                                    <td>
                                      <button type="button" class="btn btn-success update-doctor" 
                                      style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchdoc['id']; ?>'>تعديل</button>
                                    </td>
                                    <td> 
                                        <button type="button" class="btn btn-danger delete-doctor" 
                                        style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchdoc['id']; ?>'>حذف</button>
                                    </td>
                                    <td> 
                                    <button type="button" class="btn btn-info show-doctor" 
                                    style="padding: 10px;margin-right: -7px;" id='<?php echo $fetchdoc['id']; ?>'>عرض</button>
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
            <!-------------------------------------------------------------------------
                                    المعيدين
            <!------------------------------------------------------------------------->
            <br><br><div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">هيئة التدريس</h4><br>
                    <h4 class="card-title">المعيدين</h4>
                    <div class="form-group">
                        <div id='respnsvass'></div>
                      </div>
                    <div class="">
                            <button type="button" class="btn btn-primary  btn-rounded mb-4 waves-effect waves-light" 
                              id='add-ass' data-toggle="modal" data-target="#teaching">
                                          اضافة معيد جديد </button> <br>
                            </div>
                    <div class="table-responsive">
                      <table class="table table-ass">
                        <thead>
                          <tr>
                            <th> الصورة </th>
                            <th> الاسم </th>
                            <th> تعديل </th>
                            <th> حذف </th>
                            <th>عرض</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                              foreach($fetchass as $fetchas=>$fetcha){ ?>
                                 <tr>
                                    <td>
                                      <img src="../../../uploads/teaching/<?php echo $fetcha['img']; ?>" class="mr-2" alt="image"></td>
                                    <td><?php echo $fetcha['name']; ?></td>
                                    <td>
                                      <button type="button" class="btn btn-success update-ass" 
                                      style="padding: 10px;margin-right: -7px;" id='<?php echo $fetcha['id']; ?>'>تعديل</button>
                                    </td>
                                    <td> 
                                        <button type="button" class="btn btn-danger delete-ass" 
                                        style="padding: 10px;margin-right: -7px;" id='<?php echo $fetcha['id']; ?>'>حذف</button>
                                    </td>
                                    <td> 
                                    <button type="button" class="btn btn-info show-ass" 
                                    style="padding: 10px;margin-right: -7px;" id='<?php echo $fetcha['id']; ?>'>عرض</button>
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
                                     موديل الادارة
    <!------------------------------------------------------------------------->
    <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">اضافة اداري</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form class="forms-sample" id='form-manager'>
                  <div class="form-group">
                        <div id='respons-manager'></div>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName1"> الاسم</label>
                        <input type="text" class="form-control" id="name" name='name'
                        placeholder="الاسم">
                      </div>
                      <div class="form-group" id=''>
                        <label for="exampleInputName1">رقم الغرفة</label>
                        <input type="number" class="form-control" id="room" name='room'
                         placeholder="رقم الغرفة">
                      </div>
                      <div class="form-group" id=''>
                        <label for="exampleInputName1">لينك الفيس بوك (اختياري)</label>
                        <input type="text" class="form-control" id="face-manager" name='facemanager'
                         placeholder="لينك الفيس بوك">
                      </div>
                      <div class="form-group" id=''>
                        <label for="exampleInputName1">لينك الانستغرام (اختياري)</label>
                        <input type="text" class="form-control" id="insta-manager" name='instamanager'
                         placeholder="لينك الانستغرام">
                      </div>
                      <div class="form-group">
                        <label id=text-img-manager>الصورة</label>
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" id='file-img-manager'
                          disabled placeholder="Upload Image">
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
                                   نهاية موديل الادارة
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
 <!-------------------------------------------------------------------------
                                     موديل الدكاترة
    <!------------------------------------------------------------------------->
    <div class="modal fade" id="doctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">اضافة دكتور</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form class="forms-sample" id='form-doctor'>
                  <div class="form-group">
                        <div id='respons-doctor'></div>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName1"> الاسم</label>
                        <input type="text" class="form-control" id="doctor-name"  name='doctor-name' 
                        placeholder="الاسم">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">رقم الغرفة</label>
                        <input type="number" class="form-control" id="doctor-room"  name='doctor-room'
                         placeholder="رقم الغرفة">
                      </div>
                      <div class="form-group" id=''>
                        <label for="exampleInputName1">لينك الفيس بوك (اختياري)</label>
                        <input type="text" class="form-control" id="face-doctor" name='facedoctor'
                         placeholder="لينك الفيس بوك">
                      </div>
                      <div class="form-group" id=''>
                        <label for="exampleInputName1">لينك الانستغرام (اختياري)</label>
                        <input type="text" class="form-control" id="insta-doctor" name='instadoctor'
                         placeholder="لينك الانستغرام">
                      </div>
                      <div class="form-group">
                        <label>الصورة(اختياري)</label>
                        <input type="file" name="img-doctor" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" 
                          disabled placeholder="Upload Image" id='file-img-doctor'>
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" 
                            type="button" style="margin: 0;">رفع </button>
                          </span>
                        </div>
                      </div>
                      <input type='hidden' id='id-doctor' value='' name='id-doctor'>
                      <input type='hidden' id='type-doctor' value='' name='type-doctor'>
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
                                   نهاية موديل الدكاترة
<!------------------------------------------------------------------------->
<!-------------------------------------------------------------------------
                                    موديل حذف دكتور
<!------------------------------------------------------------------------->
<!-- Button trigger modal-->

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modaldoctorDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        <a href="" class="btn  btn-danger delete-button-doctor" id='' >نعم</a>
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
                                    موديل عرض دكتور
<!------------------------------------------------------------------------->
<!-- Button trigger modal -->
<!-- Full Height Modal Right -->
<div class="modal fade right" id="modalshowdoctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
      <div class="modal-body" id='modal_show_doctor'>
        
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
 <!-------------------------------------------------------------------------
                                     موديل المعيدين
    <!------------------------------------------------------------------------->
    <div class="modal fade" id="teaching" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">اضافة معيد</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" id='form-ass'>
                    <div class="form-group">
                        <div id='respons-ass'></div>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName1"> الاسم</label>
                        <input type="text" class="form-control" id="name-ass"  name='name-ass' placeholder="الاسم">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">رقم الغرفة</label>
                        <input type="number" class="form-control" id="room-ass"  name='room-ass'
                         placeholder="رقم الغرفة">
                      </div>
                      <div class="form-group" id=''>
                        <label for="exampleInputName1">لينك الفيس بوك (اختياري)</label>
                        <input type="text" class="form-control" id="face-ass" name='faceass'
                         placeholder="لينك الفيس بوك">
                      </div>
                      <div class="form-group" id=''>
                        <label for="exampleInputName1">لينك الانستغرام (اختياري)</label>
                        <input type="text" class="form-control" id="insta-ass" name='instaass'
                         placeholder="لينك الانستغرام">
                      </div>
                      <div class="form-group">
                        <label>الصورة</label>
                        <input type="file" name="img-ass" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" id='file-img-ass'
                           disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" 
                            type="button" style="margin: 0;">رفع </button>
                          </span>
                        </div>
                      </div>
                      <input type='hidden' id='id-ass' value='' name='id-ass'>
                      <input type='hidden' id='type-ass' value='' name='type-ass'>
                      <button type="submit" class="btn btn-gradient-primary mr-2">حفظ</button>
                      <button class="btn btn-light">الغاء</button>
                    </form>
                  </div>
                </div>
              </div>
               
      
    </div>
  </div>
</div>

<!-------------------------------------------------------------------------
                                   نهاية موديل المعيدين
<!------------------------------------------------------------------------->
<!-------------------------------------------------------------------------
                                    موديل حذف معيد
<!------------------------------------------------------------------------->
<!-- Button trigger modal-->

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalassDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        <a href="" class="btn  btn-danger delete-button-ass" id='' >نعم</a>
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
                                    موديل عرض معيد
<!------------------------------------------------------------------------->
<!-- Button trigger modal -->
<!-- Full Height Modal Right -->
<div class="modal fade right" id="show-ass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
      <div class="modal-body" id='modal_show_ass'>
        
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
          $('#respons-manager').hide();
          $('#type-manager').val('');
          $('#file-img-manager').val('');
          $('#text-img-manager').text('الصورة (اختياري)');   
          $('#form-manager')[0].reset();

        });
                /*-------------------------------------------------------------------
                                                  update
                --------------------------------------------------------------------*/

          $(document).on('click','.update-manager',function(){
              var id=$(this).attr('id');
              $('#respons-manager').hide();
              $('#file-img-manager').val('');
              $.ajax({
                  url:'selectmanager.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('#name').val(data.name);
                    $('#room').val(data.room);
                    $('#face-manager').val(data.face);
                    $('#insta-manager').val(data.insta);
                    $('#type-manager').val('update');
                    $('#id-manager').val(data.id);
                    $('#text-img-manager').text('صورة الخدمة (اختياري)');              
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
                          $('.table-manager').html(data.content);
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
                         if(data.respons=='error'){
                            $('#respons-manager').html(data.error);
                            $('#respons-manager').show();
                         }else{
                           $('.table-manager').html(data.html);
                           
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

              /*-------------------------------------------------------------------
              /*-------------------------------------------------------------------
                                                الدكاترة-الادخال
             --------------------------------------------------------------------
             --------------------------------------------------------------------*/
          $('#add-doctor').on('click',function(){
          $('#id-doctor').val('');
          $('#respons-doctor').hide();
          $('#type-doctor').val('');
          $('#file-img-doctor').val('');
          $('#text-img-doctor').text('الصورة (اختياري)');   
          $('#form-doctor')[0].reset();

        });
                /*-------------------------------------------------------------------
                                                  update
                --------------------------------------------------------------------*/

          $(document).on('click','.update-doctor',function(){
              var id=$(this).attr('id');
              $('#respons-doctor').hide();
              $('#file-img-doctor').val('');
              $.ajax({
                  url:'selectdoctor.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('#doctor-name').val(data.name);
                    $('#doctor-room').val(data.room);
                    $('#face-doctor').val(data.face);
                    $('#insta-doctor').val(data.insta);
                    $('#type-doctor').val('update');
                    $('#id-doctor').val(data.id);
                    $('#text-img-doctor').text('صورة الخدمة (اختياري)');              
                    $('#doctor').modal('show');

                  }
              });
                  

                });
                 /*-------------------------------------------------------------------
                                                  Delete
                --------------------------------------------------------------------*/

          $(document).on('click','.delete-doctor',function(){
              var id=$(this).attr('id');
              $.ajax({
                  url:'selectdoctor.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('.delete-button-doctor').attr('id',data.id);
                    $('#modaldoctorDelete').modal('show');

                  }
              });
                  

                });
                   /*-------------------------------------------------------------------
                                                  Delete-element
                  --------------------------------------------------------------------*/
                  $('.delete-button-doctor').on('click',function(e){
                    e.preventDefault();
                    var id=$(this).attr('id');
                    $.ajax({
                        url:'deletedoctor.php',
                        method:'POST',
                        data:{id:id},
                        dataType:'json',
                        success:function(data){
                          $('.table-doctor').html(data.content);
                          $('#modaldoctorDelete').modal('hide');
                    }
              });
                  

                });
                /*-------------------------------------------------------------------
                                                  Insert-update
                  --------------------------------------------------------------------*/
                  $('#form-doctor').on('submit',function(e){
                    e.preventDefault();
                    $.ajax({
                        url:'insertdoctor.php',
                        method:'POST',
                        data:new FormData(this),
                        cache:false,
                        contentType:false,
                        processData:false,
                        dataType:'json',
                        success:function(data){
                         if(data.respons=='error'){
                            $('#respons-doctor').html(data.error);
                            $('#respons-doctor').show();
                         }else{
                           $('.table-doctor').html(data.html);
                           
                           $('#respnsvdoctor').html(data.content).show().fadeOut(5000);
                           $('#doctor').modal('hide');
                         }
                    }
              });
                  

                });
                /*-------------------------------------------------------------------
                                                  show
                  --------------------------------------------------------------------*/
                  $(document).on('click','.show-doctor',function(){
                    var id=$(this).attr('id');
                    $.ajax({
                      url:'show-doctor.php',
                      method:'POST',
                      data:{id:id},
                      dataType:'json',
                      success:function(data){
                        $('#modal_show_doctor').html(data.content);
                        $('#modalshowdoctor').modal('show');
                      }
                    });
                  });

                  /*-------------------------------------------------------------------
                                                  المعيدين
                  --------------------------------------------------------------------
                  --------------------------------------------------------------------
                  --------------------------------------------------------------------*/
          $('#add-ass').on('click',function(){
          $('#id-ass').val('');
          $('#respons-ass').hide();
          $('#type-ass').val('');
          $('#file-img-ass').val('');
          $('#text-img-ass').text('الصورة (اختياري)');   
          $('#form-ass')[0].reset();

        });
                /*-------------------------------------------------------------------
                                                  update
                --------------------------------------------------------------------*/

          $(document).on('click','.update-ass',function(){
              var id=$(this).attr('id');
              $('#respons-ass').hide();
              $('#file-img-ass').val('');
              $.ajax({
                  url:'selectass.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('#name-ass').val(data.name);
                    $('#room-ass').val(data.room);
                    $('#face-ass').val(data.face);
                    $('#insta-ass').val(data.insta);
                    $('#type-ass').val('update');
                    $('#id-ass').val(data.id);      
                    $('#teaching').modal('show');

                  }
              });
                  

                });
                 /*-------------------------------------------------------------------
                                                  Delete
                --------------------------------------------------------------------*/

          $(document).on('click','.delete-ass',function(){
              var id=$(this).attr('id');
              $.ajax({
                  url:'selectass.php',
                  method:'POST',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    $('.delete-button-ass').attr('id',data.id);
                    $('#modalassDelete').modal('show');

                  }
              });
                  

                });
                   /*-------------------------------------------------------------------
                                                  Delete-element
                  --------------------------------------------------------------------*/
                  $('.delete-button-ass').on('click',function(e){
                    e.preventDefault();
                    var id=$(this).attr('id');
                    $.ajax({
                        url:'deleteass.php',
                        method:'POST',
                        data:{id:id},
                        dataType:'json',
                        success:function(data){
                          $('.table-ass').html(data.content);
                          $('#modalassDelete').modal('hide');
                    }
              });
                  

                });
                /*-------------------------------------------------------------------
                                                  Insert-update
                  --------------------------------------------------------------------*/
                  $('#form-ass').on('submit',function(e){
                    e.preventDefault();
                    $.ajax({
                        url:'insertass.php',
                        method:'POST',
                        data:new FormData(this),
                        cache:false,
                        contentType:false,
                        processData:false,
                        dataType:'json',
                        success:function(data){
                         if(data.respons=='error'){
                            $('#respons-ass').html(data.error);
                            $('#respons-ass').show();
                         }else{
                           $('.table-ass').html(data.html);
                           
                           $('#respnsvass').html(data.content).show().fadeOut(5000);
                           $('#teaching').modal('hide');
                         }
                    }
              });
                  

                });
                /*-------------------------------------------------------------------
                                                  show
                  --------------------------------------------------------------------*/
                  $(document).on('click','.show-ass',function(){
                    var id=$(this).attr('id');
                    $.ajax({
                      url:'show-ass.php',
                      method:'POST',
                      data:{id:id},
                      dataType:'json',
                      success:function(data){
                        $('#modal_show_ass').html(data.content);
                        $('#show-ass').modal('show');
                      }
                    });
                  });
      });
    </script>
    <?php
   }
   ?>
    