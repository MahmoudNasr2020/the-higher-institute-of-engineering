<?php 
  $select=$con->prepare('SELECT * FROM setting WHERE id=?');
  $select->execute(array(1));
  $fetch=$select->fetch(); 
  $select_lahat=$con->prepare('SELECT * FROM lahat ORDER BY id DESC');
  $select_lahat->execute();
  $fetch_lahat=$select_lahat->fetchAll();
  $select_contact=$con->prepare('SELECT * FROM mainContact WHERE id=?');
  $select_contact->execute(array(1));
  $fetch_contact=$select_contact->fetch();
  $select_social=$con->prepare('SELECT * FROM social WHERE id=?');
  $select_social->execute(array(1));
  $fetch_social=$select_social->fetch();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="<?php echo $fetch['description']; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <!-- Font Awesome -->
        <link rel="shortcut icon" href="<?php echo $logo; ?>logo.png">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="<?php echo $css ?>bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $css ?>plugins.css">
        <link rel="stylesheet" href="<?php echo $css ?>skin-1.css">
        <link rel="stylesheet" href="<?php echo $css ?>style.css">
        <link rel="stylesheet" href="<?php echo $css ?>templates.css">
        <link rel="stylesheet" href="<?php echo $css ?>font-awesome.min.css">
        <link rel='stylesheet' href="<?php echo $css ?>line-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Harmattan&display=swap" rel="stylesheet">
    </head>
    <body>
    
   <!-- header -->
	    <header class="site-header header mo-left">
	<!-- main header -->
			<div class="sticky-header main-bar-wraper navbar-expand-lg">
					<div class="main-bar clearfix ">
            <div class="container-floud clearfix">
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">
                                    <li class="<?php if(isset($main)){echo $main; } ?>"><a href="<?php echo $index; ?>">الصفحة الرئيسية <i class="fa"></i></a></li>
                                    <li class="<?php if(isset($about)){echo $about; } ?>"><a href="<?php echo $about_institues; ?>"> عن المعهد </a></li>
                                    
                                    <li class="<?php if(isset($department)){echo $department; } ?>"><a href="#"> الأقسام العلمية <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                                       <li><a href="<?php echo $civil;?>">  قسم مدني    </a></li>
                                                        <li><a href="<?php echo $mechatronics;?>"> قسم ميكاترونكس  </a></li>
                                                        <li><a href="<?php echo $computer;?>">  قسم حاسب   </a></li>
                                                        <li><a href="<?php echo $industrie;?>"> قسم صناعية   </a></li>
                                                                                   
                                                                                </ul>
                                    </li>
                                    <li class='<?php if(isset($teching)){echo $teching; } ?>'><a href="<?php echo $teach;?>" > هيئة التدريس </a></li>
                                   
                                    <li class="<?php if(isset($service)){echo $service; } ?>"><a href="javascript:void(0);"> خدمات طلابية <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu" style="min-width: 500px;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#fullHeightModalRight"> الجداول الدراسية </a></li>                                                  
                                                    <li><a href="<?php echo $result;?>"> النتيجة </a></li>
                                                    <li><a href="<?php echo $question; ?>">  الاسئلة الشائعة  </a></li>
                                                    <li><a href="<?php echo $student;?>"> اتحاد الطلاب </a></li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li><a href="javascript:void(0);"  data-toggle="modal" data-target="#fullHeightModal"> جداول الإمتحانات </a></li>
                                                    <li><a href="<?php echo $Progress;?>">  التقدم و القبول  </a></li>
                                                    <li><a href="<?php echo $global; ?>">  عام  </a></li>
                                                    <li><a href="" data-toggle="modal" data-target="#lahat"> لائحة المعهد </a></li>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class='<?php if(isset($contect)){echo $contect; } ?>'><a href="<?php echo $contact; ?>"> اتصل بنا </a></>
                            </ul>
                    </div>
                    <!-- website logo -->
                    
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    </div>
                        </div>
                </div>
                <!-- main header END -->
                <!-- Start Right Table  -->
                <!-- Button trigger modal -->
                    <!-- Button trigger modal -->
<!-- Full Height Modal Right -->
<div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">الجداول الدراسية</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style='font-size: 28px;'>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="modal-body">
  								<ul>
									<li style="text-align: right;"><a href="<?php echo $civil;?>?id=#gadawel">الجداول الدراسية الخاصه بقسم الهندسة المدنية</a></li>
									<li style="text-align: right;"><a href="<?php echo $industrie;?>?id=#gadawel">الجداول الدراسية الخاصه بقسم الهندسة الصناعية</a></li>
									<li style="text-align: right;"><a href="<?php echo $mechatronics;?>?id=#gadawel">الجداول الدراسية الخاصه بقسم هندسة الميكاترونيكس </a></li>
									<li style="text-align: right;"><a href="<?php echo $computer;?>?id=#gadawel">الجداول الدراسية الخاصه بقسم هندسة الحاسب</a></li>
									
										
  								</ul>
  							</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>

<!-- Full Height Modal Right -->
<div class="modal fade right" id="fullHeightModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">جداول الامتحانات</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style='font-size: 28px;'>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="modal-body">
  								<ul>
									<li style="text-align: right;"><a href="<?php echo $civil;?>?id=#gadawel">جداول الامتحانات الخاصه بقسم الهندسة المدنية </a></li>
									<li style="text-align: right;"><a href="<?php echo $industrie;?>?id=#gadawel">جداول الامتحانات الخاصه بقسم الهندسة الصناعية</a></li>
									<li style="text-align: right;"><a href="<?php echo $mechatronics;?>?id=#gadawel">جداول الامتحانات الخاصه بقسم هندسة الميكاترونيكس </a></li>
									<li style="text-align: right;"><a href="<?php echo $computer;?>?id=#gadawel">جداول الامتحانات الخاصه بقسم هندسة الحاسب</a></li>
									
										
  								</ul>
  							</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>

<!-- End Right Table  -->
<!--  لائحة المعهد -->
<div class="modal fade right" id="lahat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">لائحة المعهد </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style='font-size: 28px;'>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="modal-body">
  								<ul>
                    <?php
                      foreach($fetch_lahat as $fetch_slid=>$fetch_sli) { ?>
                            <li style="text-align: right;"><a href="<?php echo $file.$fetch_sli['img']; ?>" 
                            download="<?php echo $file.$fetch_sli['img']; ?>">
                            <?php echo $fetch_sli['text']; ?> </a></li>
                     <?php }
                    ?>					
  								</ul>
  							</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>
<!-- نهاية لائحة المعهد  -->
	</header>
	<!-- header END -->