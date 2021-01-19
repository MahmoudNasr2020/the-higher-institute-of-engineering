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
    $selectabout=$con->prepare('SELECT * FROM progress ORDER BY id DESC');
    $selectabout->execute();
    $fetchabout=$selectabout->fetchAll();
    ?>
   
    <div class="main-panel">
          <div class="content-wrapper">
                     
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">قسم التقديم والقبول</h4>
                <div class="form-group">
                        <div id='respnsvtable'></div>
                      </div>
                <div class="row">
                  <div class="col-12">
                            <div class="">
                            <button type="button" class="btn btn-primary "  
                                  id='add-table' data-toggle="modal" data-target="#tables">
                                          اضافة عنصر جديد</button> <br>
                            </div>
                      
                    <br><table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th>الرقم</th>
                          <th>تاريخ الاضافة</th>
                          <th>تعديل</th>
                          <th>حذف</th>
                          <th>عرض</th>
                          
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                            foreach($fetchabout as $fetchtabl=>$fetchtab){ ?>
                              <tr>
                              <td>
                                <?php echo $fetchtab['id']; ?>
                            </td>
                              <td>
                                <?php echo $fetchtab['date']; ?>
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
                              data-toggle="modal" data-target="#modal-showtable""
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
    <div class="modal fade" id="tables" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold" id='h4'>اضافة سؤال جديد</h4>
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
                        <label for="exampleTextarea1">السؤال</label>
                        <textarea class="form-control" id="question" name='question' rows="4"></textarea>
                      </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">الجواب</label>
                        <textarea class="form-control" id="sol" name='sol' rows="4"></textarea>
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
                                   نهاية موديل الاسليدر
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
    <script src='../../layout/js/jquery.dataTables.js'></script>
    <script src='../../layout/js/dataTables.bootstrap4.js'></script>
    <script src='../../layout/js/data-table.js'></script>
    <script>

    $(document).ready(function(){
        /*-------------------------------------------------------------------
         
                                            insert-table
         --------------------------------------------------------------------*/
         $('#add-table').on('click',function(){
                  $('#question').val('');
                  $('#question').text('');
                  $('#sol').val('');
                  $('#sol').text('');
                  $('#type-table').val('');
                  $('#id-table').val('');
                  $('#h4').text('اضافة سؤال جديد');
                  $('#responstable').hide();
                  $('.form-table')[0].reset();
          });
         
         /*-------------------------------------------------------------------
         
                                            update-table
         --------------------------------------------------------------------*/

          $(document).on('click','.edittable',function(){
            var id=$(this).attr('id');
            $('file-file').val('');
            $.ajax({
               url:'selecttable.php',
               method:'POST',
               data:{id:id},
               dataType:'json',
               success:function(data){
                  $('#question').val(data.question);
                  $('#question').text(data.question);
                  $('#sol').val(data.solution);
                  $('#sol').text(data.solution);
                  $('#type-table').val('update');
                  $('#id-table').val(data.id);
                  $('#h4').text('تعديل ');
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
               url:'selecttable.php',
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
                url:'delete.php',
                method:'POST',
                data:{id:id},
                dataType:'json',
                success:function(data){
                     $('#order-listing').html(data.content);
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
                url:'inserttable.php',
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
                        
                        $('#order-listing').html(data.html);
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
                url:'showtable.php',
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