<?php 
include '../control/php/DB/conn.php';
$select=$con->prepare('SELECT * FROM setting WHERE id=?');
$select->execute(array(1));
$fetch=$select->fetch(); 
$select_about=$con->prepare('SELECT * FROM activity ORDER BY id DESC ');
$select_about->execute();
$fetch_about= $select_about->fetchAll();
if($fetch['staute']==0){ ?>
    <!DOCTYPE html>
    <html>
        <head>
            <link rel='shortcut icon' href="../layout/pattern/close.png">
             <title><?php $fetch['title']; ?> | قسم اتحاد الطلاب</title>

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
    $service='active';
    $title=$fetch['title'].' | اتحاد الطلاب ';
    include 'inithead.php';
?>
<div class='page-content'>
    <div class="section-head text-center">
         <h3 class="title" style='padding-top: 58px;margin-bottom: -21px;'> قسم اتحاد الطلاب </h3>
    </div>
<!-- inner page banner END -->
<div class="content-block">
			    <div class="section_news section-full bg-gray content-inner">
            <div class="container">
			    <div class="row">
                    <?php 
                        foreach($fetch_about as $fetch_abou=>$fetch_abo){ ?>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="event-box">
                                        <div class="event-media">
                                        <img src="../uploads/files/student/<?php echo $fetch_abo['img']; ?>" alt=""/>
                                        </div>
                                        <div class="event-info">
                                        <div class="dlab-post-title">
                                            <h3 class="post-title"><a href="#" style='color: #000;'><?php echo $fetch_abo['text']; ?></a></h3>
                                        </div>
                                        <div class="event-meta">
                                            <ul>
                                            <li class="post-date"><strong><?php echo $fetch_abo['dateday']; ?></strong><span><?php echo $fetch_abo['datemonth']; ?></span><span><?php echo $fetch_abo['dateyear']; ?></span></li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-text">
                                            <p>  </p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                       <?php }
                    ?>                      
    				</div>
				</div>
            </div>
        </div>
        <!--End Content-->
</div>
<?php
    include 'initfooter.php';
    

  }
  ?>
    