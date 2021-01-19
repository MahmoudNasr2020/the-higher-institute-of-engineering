<?php
  session_start();
  session_regenerate_id();
  if(!isset($_SESSION['email'])){
    header("location:../../index.php");
    exit();
  }else{ 
    $id=filter_var(trim($_SESSION['id']),FILTER_SANITIZE_NUMBER_INT);
    $select_admin=$con->prepare('SELECT * FROM admin WHERE id=?');
    $select_admin->execute(array($id));
    $count=$select_admin->rowCount();
    $fetch_admin=$select_admin->fetch();
   if($count > 0){ ?>
          <!DOCTYPE html>
<html lang="ar">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>لوحة التحكم | المعهد العالي للهندسة</title>
        <link rel='shortcut icon' href="../../../layout/pattern/control.png">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <link rel='stylesheet' href='<?php echo $css; ?>material.min.css'>
        <!-- Material Design Bootstrap -->
        <link rel='stylesheet' href='<?php echo $css; ?>vendor.css'>
         <!-- Material Design Bootstrap -->
        <link rel='stylesheet' href='<?php echo $css; ?>bootstrap.min.css'>
         <!-- Material Design Bootstrap -->
         <link rel='stylesheet' href='<?php echo $css; ?>style.css'>
         <!-- Material Design Bootstrap -->
         <link rel='stylesheet' href='<?php echo $css; ?>style2.css'>
     </head>
      <body class="rtl" style="    direction: rtl ;text-align: right ;">
        <!-- navbar starts here -->
        
                <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#">
                <img src="../../../layout/pattern/logo.png" alt="logo" style="height: 48px;width: 81px;"/></a>
                <a class="navbar-brand brand-logo-mini" href="#">
                <img src="../../../layout/pattern/logo.png" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <i class="fas fa-bars"></i>
                </button>
               
                <ul class="navbar-nav navbar-nav-right pr-0">
                    <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                        <img src="../../../uploads/admin/<?php echo $fetch_admin['img']; ?>" alt="image" class='img-new'>
                        <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                        <p class="mb-1 text-black name-adminnew"><?php echo $fetch_admin['name']; ?></p>
                        </div>
                        <i style="
                                    font-size: 11px;
                                    color: #b66dff;
                                " class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item click-setting" href="#" data-toggle="modal" data-target="#adminsetting" id='<?php echo $fetch_admin["id"]; ?>'>
                            <i class="fas fa-cogs mr-2 text-success" style="font-size: 14px;"></i> الاعدادت </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item click-settingshow" href="#" data-toggle="modal" data-target="#adminsettingshow" id='<?php echo $fetch_admin["id"]; ?>'>
                            <i class="fas fa-user-shield mr-2 text-info" style="font-size: 14px;"></i> بيانتي </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../admin/logout.php">
                            <i class="fas fa-sign-in-alt mr-2 text-primary"></i> خروج </a>
                    </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="fas fa-expand" id="fullscreen-button"></i>
                    </a>
                    </li>
                    <?php
                      if($fetch_admin['statue']!= 0){ ?>
                                <li class="nav-item dropdown" style='visibility:hidden'>
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false" >
                        <i class="fab fa-facebook-messenger" ></i>
                      
                        <span class="label label-pill label-danger count" style="display:none !important;
                                                                                   "></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list " aria-labelledby="messageDropdown" style="width: 290px;">
                    <h6 class="p-3 mb-0">رسائل</h6>
                    <div class='message-list'></div>
                     <h6 class="p-3 mb-0 text-center"> <a href='../../php/message/message.php'>الرسائل الجديدة</a></h6>
                    </div>
                    </li>
                    <li class="nav-item dropdown" style='visibility:hidden'>
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="label label-pill label-danger count-activity" style="display:none !important"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list " aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">إخطارات</h6>
                        <div class='activity-list'></div>
                        <h6 class="p-3 mb-0 text-center"><a href='../../php/activity/activity.php'>اطلع على جميع الإشعارات</a></h6>
                    </div>
                    </li>
                      <?php }else{ ?>
                        <li class="nav-item dropdown" style='visibility:visible'>
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false" >
                        <i class="fab fa-facebook-messenger" style="color: #00B2FF;"></i>
                      
                        <span class="label label-pill label-danger count" style="visibility: hidden ;
                                                                                    padding: .2em .6em .3em;
                                                                                    font-size: 62%;
                                                                                    font-weight: 700;
                                                                                    line-height: 1;
                                                                                    color: #fff;
                                                                                    text-align: center;
                                                                                    white-space: nowrap;
                                                                                    vertical-align: baseline;
                                                                                    border-radius: 66%;
                                                                                    background-color: #FF0017;
                                                                                    position: relative;
                                                                                    top: -7px;
                                                                                    right: -3px;"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list " aria-labelledby="messageDropdown" style="width: 290px;">
                    <h6 class="p-3 mb-0">رسائل</h6>
                    <div class='message-list'></div>
                     <h6 class="p-3 mb-0 text-center">  <a href='../../php/message/message.php'>الرسائل الجديدة</a></h6>
                    </div>
                    </li>
                    <li class="nav-item dropdown" style='visibility:visible'>
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="fas fa-bell" style="color: #D25F29;"></i>
                        <span class="label label-pill label-danger count-activity" style="visibility: hidden;
                                                                                    padding: .2em .6em .3em;
                                                                                    font-size: 62%;
                                                                                    font-weight: 700;
                                                                                    line-height: 1;
                                                                                    color: #fff;
                                                                                    text-align: center;
                                                                                    white-space: nowrap;
                                                                                    vertical-align: baseline;
                                                                                    border-radius: 66%;
                                                                                    background-color: #19d895;
                                                                                    position: relative;
                                                                                    top: -7px;
                                                                                    right: -3px;"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list " aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">إخطارات</h6>
                        <div class='activity-list'></div>
                        <h6 class="p-3 mb-0 text-center"><a href='../../php/activity/activity.php'>اطلع على جميع الإشعارات</a></h6>
                    </div>
                    </li>
                     <?php }
                    ?>
                    
                    <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="../admin/logout.php">
                        <i class="fas fa-power-off"></i>
                    </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <i class="fas fa-bars"></i>
                </button>
                </div>
                </nav>
            <!-- ends here -->
             <!-- ends here -->
      <div class="container-fluid page-body-wrapper">
        <!-- settings-panel starts here -->
        <div id="settings-trigger">
            <i class="fas fa-cog"></i>
        </div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close fas fa-window-close"></i>
          <p class="settings-heading">القائمة الجانبية</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>افتراضي
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>داكن
          </div>
          <p class="settings-heading mt-2">القائمة الموجودة بالاعلي</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default light"></div>
          </div>
        </div>
        <!-- ends here -->
        <!-- sidebar starts here -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../../uploads/admin/<?php echo $fetch_admin['img']; ?>" alt="profile" class='img-new'>
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2 name-adminnew"><?php echo $fetch_admin['name']; ?></span>
                  <span class="text-secondary text-small"><?php 
                      if($fetch_admin['statue']==0){
                        echo 'مشرف';
                      }else{
                        echo 'اتحاد طلاب';
                      }
                  ?></span>
                </div>
                    <i class="fas fa-check-circle text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/main/main.php">
                <span class="menu-title">الاعدادت الرئيسية</span>
                <i class="fas fa-user-cog menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/slider/slider.php">
                <span class="menu-title">الاسليدر</span>
                <i class="fas fa-sliders-h menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/service/service.php">
                <span class="menu-title">خدمات الموقع</span>
                <i class="fas fa-box menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/maindepart/maindepart.php">
                <span class="menu-title">اقسام الصفحة الرئيسية</span>
                <i class="fa fa-building menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/news/news.php">
                <span class="menu-title">الاخبار</span>
                <i class="fas fa-newspaper menu-icon"></i>     
                     </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/events/events.php">
                <span class="menu-title">الاحداث</span>
                <i class="far fa-calendar-plus menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/manager/manager.php">
                <span class="menu-title">كلمة العميد</span>
                <i class="fas fa-user-edit menu-icon"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/first/firsts.php">
                <span class="menu-title">اوائل الدفعات والاقسام</span>
                <i class="fas fa-user-graduate menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/numbers/numbers.php">
                <span class="menu-title">المعهد في ارقام</span>
                <i class="fas fa-chart-bar menu-icon"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/about/about.php" >
                <span class="menu-title">عن المعهد</span>
                <i class="far fa-building menu-icon"></i>
            </a>
  
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#app" aria-expanded="false" aria-controls="app">
                <span class="menu-title">الاقسام</span>
                <i class="fas fa-book menu-icon"></i>
            </a>
            <div class="collapse" id="app">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> 
                     
                  <a class="nav-link" href="../../php/department/civil.php">
                  الهندسة المدنية
                
                </a>
            </li>
            <li class="nav-item"> 
                     
                     <a class="nav-link" href="../../php/department/mechatronics.php">
                     هندسة الميكاترونيكس           
                   </a>
               </li>
               <li class="nav-item"> 
                     
                     <a class="nav-link" href="../../php/department/computer.php">
                     هندسة الحاسب  
                   </a>
               </li>
               <li class="nav-item"> 
                     
                     <a class="nav-link" href="../../php/department/industrial.php">
                     الهندسة الصناعية   
                   </a>
               </li>
               
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/teach/teaching.php">
                <span class="menu-title">هيئة التدريس</span>
                <i class="fas fa-users menu-icon"></i>
            </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#apps" aria-expanded="false" aria-controls="apps">
                <span class="menu-title">خدمات طلابية</span>
                <i class="fas fa-address-book menu-icon"></i>
              </a>
              <div class="collapse" id="apps">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> 
                     
                  <a class="nav-link" href="../../php/result/result.php">
                  النتيجة
                
                </a>
            </li>
            <li class="nav-item"> 
                     
                     <a class="nav-link" href="../../php/progress/progress.php">
                     التقدم والقبول            
                   </a>
               </li>
               <li class="nav-item"> 
                     
                     <a class="nav-link" href="../../php/ask/asked.php">
                     الاسئلة الشائعة    
                   </a>
               </li>
               <li class="nav-item"> 
                     
                     <a class="nav-link" href="../../php/global/global.php">
                     عام   
                   </a>
               </li>
               <li class="nav-item"> 
                     
                     <a class="nav-link" href="../../php/activity/activity.php">
                     اتحاد الطلاب    
                   </a>
               </li>
               <li class="nav-item"> 
                     
                     <a class="nav-link" href="../../php/lahat/lahat.php">
                     لائحة المعهد   
                   </a>
               </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/message/message.php">
                <span class="menu-title">الرسائل والشكاوي الواردة</span>
                <i class="fas fa-inbox menu-icon"></i>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="../../php/contact/contact.php">
                <span class="menu-title">بيانات الاتصال</span>
                <i class="fas fa-phone-square menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/social/social.php">
                <span class="menu-title">سوشيال ميديا</span>
                <i class="fas fa-share-alt menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/admin/admin.php">
                <span class="menu-title">المشرفين</span>
                <i class="fas fa-id-card menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- ends here -->
        
        <!-- main-panel ends -->
      
      <!-- page-body-wrapper ends -->

      <!-- page-body-wrapper ends -->
        <!-- Button trigger modal -->

<!-- Full Height Modal Right -->
<div class="modal fade right" id="adminsetting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-right" role="document">


   <div class="modal-content" style="height: 100%;">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"> تعديل الاعدادت الخاصة بك </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="col-12 grid-margin stretch-card">
                <div class="card" style="height: 80%;">
                  <div class="card-body">
                    <form class="forms-sample form-settingadmin">
                    <h4 class="" style="
    font-size: 10px;
">ملحوظة : ان لم يتم ادخال اي بيانات سيتم حفظ بياناتك المسجلة لدينا</h4>
                    <div class="form-group">
                        <div id='respons-manageradmin'></div>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName1">الاسم</label>
                        <input type="text" class="form-control" id="nameadmin" name='nameadmin' 
                        value='' placeholder="الاسم">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">الايميل</label>
                        <input type="email" class="form-control" id="emailadmin" name='emailadmin' 
                        value='' placeholder="الايميل">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">كلمة السر</label>
                        <input type="password" class="form-control" id="passwordadmin" name='passwordadmin' placeholder="كلمة السر">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1"> تاكيد كلمة السر </label>
                        <input type="password" class="form-control" id="passwordadminverify" name='passwordadminverify' placeholder="كلمة السر">
                      </div>
                      <div class="form-group">
                        <label id='text-img-manager'>الصورة</label>
                        <input type="file" name="imgadmin" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" id='file-img-manageradmin' disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" 
                            type="button" style="margin: 0;">رفع </button>
                          </span>
                        </div>
                      </div>
                      <input type='hidden' id='id-manageradmin' value='<?php echo $fetch_admin['id']; ?>' name='id-manageradmin'>
                      <input type='hidden' id='type-manageradmin' value='update' name='type-manageradmin'>
                      <button type="submit" class="btn btn-gradient-primary mr-2">حفظ</button>
                      <button class="btn btn-light" data-dismiss="modal">الغاء</button>
                    </form>
                  </div>
                </div>
              </div>
               
      
    </div>
  </div>
</div>
<!-- Full Height Modal Right -->
      <!-- page-body-wrapper ends -->
    <!-------------------------------------------------------------------------
                                    موديل عرض اداري
<!------------------------------------------------------------------------->
<!-- Button trigger modal -->
<!-- Full Height Modal Right -->
<div class="modal fade right" id="adminsettingshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
      <div class="modal-body" id='modal_showadminsetting'>
        
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
    
      
   <?php }
   else{
    session_unset();
    session_destroy();
    header('location:../../index.php');
   }
    
  }
?>
