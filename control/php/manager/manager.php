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
    $select=$con->prepare('SELECT * FROM manager WHERE id = 1');
    $select->execute();
    $fetchglobal=$select->fetch();
    ?>
   
    <div class="main-panel">
          <div class="content-wrapper">
                     
               
          <div class="row">
              <div class="col-12 grid-margin">
                
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> كلمة العميد</h4>
                    <div class="form-group">
                        <div id='respnsv'></div>
                      </div> 
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> الصورة </th>
                            <th> الاسم </th>
                            <th> تعديل </th>
                            <th>عرض</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img src="../../../uploads/manager/<?php echo $fetchglobal['img']; ?>" class="mr-2" alt="image"></td>
                              <td><?php echo $fetchglobal['name']; ?></td>
                            <td>
                              <button type="button" class="btn btn-success update" id='<?php echo $fetchglobal['id']; ?>'
                              style="padding: 10px;margin-right: -7px;">تعديل</button>
                            </td>
                            
                            <td> 
                            <button type="button" class="btn btn-info show-element" id='<?php echo $fetchglobal['id']; ?>'
                            style="padding: 10px;margin-right: -7px;" >عرض</button>
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
                                     موديل الاسليدر
    <!------------------------------------------------------------------------->
    <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">اضافة كلمة العميد</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" id='form-manager'>
                    <div class="form-group">
                        <div id='respons'></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">الاسم</label>
                        <input type="text" class="form-control" id="name" name='name'
                        placeholder="اسم العميد">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">الكلمة</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name='text'></textarea>
                      </div>
                      <div class="form-group">
                        <label>الصورة</label>
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
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
                   
         /*-------------------------------------------------------------------
         
                                            update
         --------------------------------------------------------------------*/

          $(document).on('click','.update',function(){
            var id=$(this).attr('id');
            $('.file-upload-info').val('');
            $('#exampleTextarea1').text('');
            $.ajax({
               url:'select.php',
               method:'POST',
               data:{id:id},
               dataType:'json',
               success:function(data){
                 $('#name').val(data.name);
                  $('#exampleTextarea1').text(data.text);
                  $('#type').val('update');
                  $('#id').val(data.id);
                  $('#h4').text('تعديل كلمة العميد');
                  $('#respons').hide();
                  $('#modalSubscriptionForm').modal('show');
               }
            });
          });
             /*-------------------------------------------------------------------
                                                insert,update 
            --------------------------------------------------------------------*/
            $('#form-manager').on('submit',function(e){
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
                        $('.table').html(data.html);
                        $('#modalSubscriptionForm').modal('hide'); 
                        $('#respnsv').html(data.content).show().fadeOut(5000);
                        
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