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
  $select=$con->prepare('SELECT * FROM social WHERE id=?');
  $select->execute(array(1));
  $fetch=$select->fetch();
  ?>
  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                  
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <h4 class="card-title">سوشيال ميديا</h4>
                 <br><form class="forms-sample form_setting">
                 <div class="form-group">
                      <div id='respons'></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">الفيس بوك</label>
                      <input type="text" class="form-control" id="face" name='face' 
                      value='<?php if(isset($fetch['facebook'])){echo $fetch['facebook']; } ?>'
                      placeholder="لينك الفيس بوك">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">تويتر</label>
                      <input type="text" class="form-control"  id="twitter" name='twitter' 
                      value='<?php if(isset($fetch['twitter'])){echo $fetch['twitter']; } ?>'
                      placeholder="لينك تويتر">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">يوتيوب</label>
                      <input type="text" class="form-control"  id="youtube" name='youtube' 
                      value='<?php if(isset($fetch['youtube'])){echo $fetch['youtube']; } ?>'
                      placeholder="لينك قناة اليوتيوب">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">انستغرام</label>
                      <input type="text" class="form-control" id="instagram" name='instagram' 
                      value='<?php if(isset($fetch['instagram'])){echo $fetch['instagram']; } ?>'
                      placeholder="لينك الانستغرام">
                    </div>
                    
                    <button type="submit" class="btn btn-gradient-primary mr-2">حفظ</button>
                  </form>
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
  
  <?php 
  include '../init/initfooter.php';
  ?>
  <script src='../../layout/js/file-upload.js'></script>
  <script>
    $(document).ready(function(){
      $('.form_setting').on('submit',function(e){
        e.preventDefault();
        $('#respons').show();
        $.ajax({
            url:'setting.php',
            method:'POST',
            data:$(this).serialize(),
            dataType:'json',
            success:function(data){
              
                $('#respons').html(data.respons).fadeOut(5000);

            }
        });
      });
    });
  </script>
 
 <?php }
 ?>
   