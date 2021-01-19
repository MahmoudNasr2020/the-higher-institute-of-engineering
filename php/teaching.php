<?php 
include '../control/php/DB/conn.php';
$select=$con->prepare('SELECT * FROM setting WHERE id=?');
$select->execute(array(1));
$fetch=$select->fetch(); 
$select_manager=$con->prepare('SELECT * FROM techmanager ORDER BY id DESC');
$select_manager->execute();
$fetchmanager=$select_manager->fetchAll();
$select_doctor=$con->prepare('SELECT * FROM techdoctor ORDER BY id DESC');
$select_doctor->execute();
$fetchdoctor=$select_doctor->fetchAll();
$select_ass=$con->prepare('SELECT * FROM techass ORDER BY id DESC');
$select_ass->execute();
$fetchass= $select_ass->fetchAll();
if($fetch['staute']==0){ ?>
    <!DOCTYPE html>
    <html>
        <head>
            <link rel='shortcut icon' href="../layout/pattern/close.png">
             <title><?php $fetch['title']; ?> | هيئة التدريس</title>

            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="./Contact/css/bootstrap.min.css">
        </head>
        <body style="text-align: center;">
        <div class="sha_news section-full content-inner-2 bg-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="action-box">
                                <img src="../layout/pattern/الصيانة.gif" class="rounded mx-auto d-block" alt="...">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <script src='layout/js/jquery.min.js'></script>
                <script src='./Contact/js/bootstrap.min.js'></script>

        </body>
    </html> 
   <?php 
    exit(); 
  }else{ 
    $teching='active';
    $title=$fetch['title'].'| هيئة التدريس ';
    include 'inithead.php';?>
  <link rel='stylesheet' href="../layout/css/team-work.css">
 <!-- ##### Welcome Area Start ##### -->
 <div class="section-head text-center" style='background:#f8f9fb'>
         <h3 class="title" style='margin-top: -7px;padding-top: 58px;'> اعضاء هيئة التدريس </h3>
    </div>
 <section class="team-work features"
        style="background: #f8f9fb;
         border-top:none;direction: rtl;">
         
        <nav>
            <h2 style=' margin-bottom: 0'>مجلس الإدارة</h2>
        </nav>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php 
                        foreach($fetchmanager as $fetchmanage=>$fetchman){ ?>
                                   <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="profile-box">
                                            <img src="../uploads/teaching/<?php echo $fetchman['img'];  ?>" alt="profile pic">
                                            <h3 class="mt-4"><?php echo $fetchman['name']; ?></h3>
                                            <h4>غرفة رقم : <?php echo $fetchman['room']; ?> </h4>
                                            <div class="btn-container d-flex">
                                                <span class="profile-btn" id="assign">
                                                <a href='<?php echo $fetchman['face']; ?>' target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                </span>
                                                <span class="profile-btn" id="view">
                                                <a href='<?php echo $fetchman['insta']; ?>'  target="_blank">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                                </span>
                                            </div>
                                        </div>
                                     </div> 
                        <?php }
                    ?>
                </div>
            </div>


        </div>
    </>
    <!-- ##### Team Area End ##### -->
     <!-- ##### Team Area End ##### -->
     <section class="team-work features"
        style="background: #f8f9fb;
         border-top:none;direction: rtl;">
        <nav>
            <h2 style=' margin-bottom: 0;'>الدكاترة</h2>
        </nav>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                <?php 
                        foreach($fetchdoctor  as $fetchdoct=>$fetchdoc){ ?>
                                   <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="profile-box">
                                            <img src="../uploads/teaching/<?php echo $fetchdoc['img'];  ?>" alt="profile pic">
                                            <h3 class="mt-4"><?php echo $fetchdoc['name']; ?></h3>
                                            <h4>غرفة رقم : <?php echo $fetchdoc['room']; ?> </h4>
                                            <div class="btn-container d-flex">
                                                <span class="profile-btn" id="assign">
                                                <a href='<?php echo $fetchdoc['face']; ?>' target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                </span>
                                                <span class="profile-btn" id="view">
                                                <a href='<?php echo $fetchdoc['insta']; ?>'  target="_blank">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                                </span>
                                            </div>
                                        </div>
                                     </div> 
                        <?php }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Team Area End ##### -->
<!-- ##### Team Area End ##### -->
<section class="team-work features"
        style="background: #f8f9fb;
         border-top:none;direction: rtl;">
        <nav>
            <h2 style=' margin-bottom: 0;'>المعيدين</h2>
        </nav>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                <?php 
                        foreach($fetchass  as $fetchdas=>$fetcha){ ?>
                                   <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="profile-box">
                                            <img src="../uploads/teaching/<?php echo $fetcha['img'];  ?>" alt="profile pic">
                                            <h3 class="mt-4"><?php echo $fetcha['name']; ?></h3>
                                            <h4>غرفة رقم : <?php echo $fetcha['room']; ?> </h4>
                                            <div class="btn-container d-flex">
                                                <span class="profile-btn" id="assign">
                                                <a href='<?php echo $fetcha['face']; ?>' target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                </span>
                                                <span class="profile-btn" id="view">
                                                <a href='<?php echo $fetcha['insta']; ?>'  target="_blank">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                                </span>
                                            </div>
                                        </div>
                                     </div> 
                        <?php }
                    ?>
                </div>
            </div>


        </div>
    </section>
    <!-- ##### Team Area End ##### -->

<?php
    include 'initfooter.php';
     }
  ?>
    


  