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
    $select=$con->prepare('SELECT * FROM numbers WHERE id=?');
    $select->execute(array(1));
    $fetchglobal=$select->fetch();
    ?>
   
    <div class="main-panel">
          <div class="content-wrapper">
               
            <div class="page-header">

              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="fas fa-sort-numeric-up"></i>
                </span> المعهد في ارقام </h3>
               
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                  <button type="button" id='<?php $fetchglobal['id'] ?>' class="btn btn-success waves-effect waves-light edit"
                  data-toggle="modal" data-target="#modalSubscriptionForm">تعديل</button>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="form-group">
                    <div id='respnsv'></div>
              </div>     
            <div class="row" id='content'>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="https://www.bootstrapdash.com/demo/purple/jquery/template/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">اعداد الخريجين 
                    <i class="fas fa-user-graduate float-right" style="
                            margin-left: 10px;
                        "></i>
                    </h4>
                    <h2 class="mb-5 graduate-h"><?php echo $fetchglobal['graduate']; ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="https://www.bootstrapdash.com/demo/purple/jquery/template/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">اعداد الطلاب 
                        <i class="fas fa-user-friends float-right" style="margin-left:10px;"></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $fetchglobal['student']; ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="https://www.bootstrapdash.com/demo/purple/jquery/template/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">اعداد العاملين 
                        <i class="fas fa-user float-right" style="margin-left: 10px;"></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $fetchglobal['worker']; ?></h2>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white" style='background: linear-gradient(to right, #FFC074, #84DA97) !important;'>
                  <div class="card-body">
                    <img src="https://www.bootstrapdash.com/demo/purple/jquery/template/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">اعداد هيئة التدريس 
                        <i class="fas fa-chalkboard-teacher float-right" style='margin-left:10px;'></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $fetchglobal['teaching']; ?></h2>
                    
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
        <h4 class="modal-title w-100 font-weight-bold">تعديل ارقام المعهد</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample form-numbers">
                    <div class="form-group">
                        <div id='respons'></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">اعداد الخريجين</label>
                        <input type="number" class="form-control" id="graduate" 
                        value='<?php echo $fetchglobal['graduate']; ?>'
                        name='graduate'
                        placeholder="اعداد الخريجين">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">اعداد الطلاب</label>
                        <input type="number" class="form-control" id="student" name='student'
                        placeholder="اعداد الطلاب" value='<?php echo $fetchglobal['student']; ?>'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">اعداد العاملين</label>
                        <input type="number" class="form-control" id="worker" value='<?php echo $fetchglobal['worker']; ?>'
                        name='worker'
                        placeholder="اعداد العاملين">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">اعداد هيئة التدريس</label>
                        <input type="number" class="form-control" id="teaching" 
                        value='<?php echo $fetchglobal['teaching']; ?>' name='teaching'
                        placeholder="اعداد العاملين">
                      </div>
                      <input type='hidden' value='<?php $fetchglobal['id']; ?>' 
                      name='id' id='id'>
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
    
    <?php 
    include '../init/initfooter.php';
    ?>
    <script src='../../layout/js/file-upload.js'></script>
    <script>
       $(document).ready(function(){

         /*-------------------------------------------------------------------
         
                                            update
         --------------------------------------------------------------------*/

         $(document).on('click','.edit',function(){
            var id=$(this).attr('id');
              $.ajax({
               url:'select.php',
               method:'POST',
               data:{id:id},
               dataType:'json',
               success:function(data){
                  $('#graduate').val(data.graduate);
                  $('#student').val(data.student);
                  $('#worker').val(data.worker);
                  $('#teaching').val(data.teaching);
                  $('#id').val(data.id);
                  $('#h4').text('تعديل');
                  $('#respons').hide();
                  $('#modalSubscriptionForm').modal('show');
               }
            });
          });

             /*-------------------------------------------------------------------
                                                insert,update 
            --------------------------------------------------------------------*/
            $('.form-numbers').on('submit',function(e){
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
                      if(data.respons=='error'){
                        $('#respons').show();
                        $('#respons').html(data.error);
                      } else{
                        $('#content').html(data.html);
                        $('#modalSubscriptionForm').modal('hide'); 
                        $('#respnsv').html(data.content).show().fadeOut(5000);
                      }             
                }
              });
            });


       });
    </script>
   <?php }
   ?>