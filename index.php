<?php 
    include 'control/php/DB/conn.php';
    $select=$con->prepare('SELECT * FROM setting WHERE id=?');
    $select->execute(array(1));
    $fetch=$select->fetch(); 
    $select_slider=$con->prepare('SELECT * FROM slider');
    $select_slider->execute();
    $fetch_slider=$select_slider->fetchAll();
    $select_service=$con->prepare('SELECT * FROM service');
    $select_service->execute();
    $fetch_service=$select_service->fetchAll();
    $select_depmain=$con->prepare('SELECT * FROM depmain');
    $select_depmain->execute();
    $fetch_depmain=$select_depmain->fetchAll();
    $select_news=$con->prepare('SELECT * FROM news ORDER BY id DESC');
    $select_news->execute();
    $fetch_news= $select_news->fetchAll();
    $select_event=$con->prepare('SELECT * FROM event ORDER BY id DESC');
    $select_event->execute();
    $fetch_event= $select_event->fetchAll();
    $select_manager=$con->prepare('SELECT * FROM manager WHERE id=1');
    $select_manager->execute();
    $fetch_manager= $select_manager->fetch();
    $select_first=$con->prepare('SELECT * FROM first ORDER BY id DESC');
    $select_first->execute();
    $fetch_first= $select_first->fetchAll();
    $select_number=$con->prepare('SELECT * FROM numbers WHERE id=1');
    $select_number->execute();
    $fetch_number= $select_number->fetch();
  
    if($fetch['staute']==0){ ?>
    <!DOCTYPE html>
    <html>
        <head>
            <link rel='shortcut icon' href="layout/pattern/close.png">
             <title><?php $fetch['title']; ?></title>

            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="./Contact/css/bootstrap.min.css">
        </head>
        <body style="text-align: center;">
        <div class="sha_news section-full content-inner-2 bg-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="action-box">
                                <img src="layout/pattern/الصيانة.gif" class="rounded mx-auto d-block" alt="...">
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
  }
    else{
      $temp='';
      $footer='';
      $main='active';
      $title=$fetch['title'];
      include 'php/inithead.php';
    ?>
    <!--css-->
    
    <link rel='stylesheet' href="layout/css/number.css">
    <link rel='stylesheet' href="layout/css/owl.carousel.css">

     <!--End css-->
    <div class="page-wraper">
    <div class="page-content bg-white">
        <!-- Slider Banner -->
        <!-- Main Slider -->
        <div class="owl-slider owl-carousel Slider owl-theme owl-btn-center-lr dots-none">
            <?php
                foreach($fetch_slider as $global=>$fe){ ?>
                        <div class="item slide-item">
                          <div class="slide-item-img"><img src="uploads/slider/<?php echo $fe['img']; ?>" class="" alt=""/></div>
                          <div class="slide-content">
                            <div class="slide-content-box container">
                              <div class="slide-content-area">
                                <p><?php echo $fe['text']; ?></p>
                              </div>
                            </div>
                          </div>
                      </div>
               <?php }
            ?>
                      
       			      </div>
        <!-- Slider Banner -->
        <!--Serves-->
        <div class="content-block">
      <div class="section-full bg-gray content-inner-2">
      <h3 class="title"> خدمات الموقع </h3>
        <div class="container">
          <div class="row">
          <div class="courses-carousel owl-carousel owl-btn-center-lr owl-btn-3 col-md-12 p-lr0">
          <?php
              foreach($fetch_service as $fetch_serv=>$fetch_servic){ ?>
                    <div class="item">
                      <?php
                        if($fetch_servic['link']==''){ ?>
                            <a href="#"> <div class="courses-bx">
                        <?php }
                        else{ ?>
                               <a href="<?php echo $fetch_servic['link']; ?>" target="_blank"> <div class="courses-bx">
                        <?php }
                      ?>
                       
                          <img src="uploads/serves/<?php echo $fetch_servic['img']; ?>" alt=""/>
                          <h2 class="title"> <?php echo $fetch_servic['name']; ?> </h2>
                        </div> 
                      </a>
                    </div>
              <?php }
          ?>      
          </div>
        </div>
       </div>
      </div>

			<div class="institutes section-full content-inner-2 bg-gray">
				<div class="container">
					<div class="row">
            <?php 
            foreach($fetch_depmain as $fetch_de=>$fetch_dep){ ?>
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="courses-bx-2 m-b30">
                      <img src="uploads/depmain/<?php echo $fetch_dep['img']; ?>" alt="">
                      <div class="info">
                        <h2 class="title"><a href=""><?php echo $fetch_dep['name']; ?></a></h2>
                        <p><?php echo $fetch_dep['text']; ?></p>
                      </div>
                    </div>
						      </div>
            <?php }
            
            ?>
					</div>
				</div>
			</div> 
		</div>
        <!--End Serves-->
        <!-- Start News-->
        <div class="sha_news section-full content-inner-2 bg-gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12 col-sm-12 col-12">
						<div class="action-box">
							<div class="head">
								<h4 class="title"><a href="news.html" style="color: #005454;"> أخر الأخبار </a></h4>
							</div>
							<div class="action-area marquee1">
								<ul>
                <?php
              foreach($fetch_news as $fetch_n=>$fetch_new){ ?>
                    <li>
												<div class="row ">
													<div class="col-md-4 col-sm-12 col-12">
														<img src="uploads/news/<?php echo $fetch_new['img']; ?>" alt="">
													</div>
													<div class="col-md-8 col-sm-12 col-12">
														<h5><?php echo $fetch_new['title']; ?></h5>
														<p><?php echo $fetch_new['text']; ?></p>
														<span><?php echo $fetch_new['date']; ?></span>
													</div>
												</div>
											
								  </li>
              <?php }
          ?>      
                		
																	</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="action-box">
							<div class="head">
								<h4 class="title"><a href="year_map.html" style="color: #005454;">الاحداث</a></h4>
							</div>
							<div class="action-area marquee1">
								<ul>
                  <?php 
                     foreach($fetch_event as $fetch_eve=>$fetch_even){ ?>
                      <li><a href="javascript:void(0);"><?php echo $fetch_even['text']; ?> </a></li>
                <?php }
                  ?>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!--End News-->
        <!--Start words-->
        <div class="resala_ahdaf section-full bg-white content-inner-2" style="background-image:url(layout/pattern/pt1.png);">
			<div class="container">
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingfour">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                  كلمة السيد عميد المعهد
                </button>
              </h2>
            </div>
            <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
              <div class="card-body">
                <div class="row align-items-center about-bx2">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="about-box">
                      <p class="ext"> <?php echo  $fetch_manager['text']; ?></p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <img src="uploads/manager/<?php echo  $fetch_manager['img']; ?>" 
                    style="width: 536px;height: 225px;"
                    class="img" alt=""/>
                    <div class="about-box">
                      <br><p class="ext" style=" text-align: center;">
                      <?php echo  $fetch_manager['name']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
				</div>
			</div>
	       </div>
        <!--End Words-->
        <!-- ##### team Area start ##### -->
    <section class="our_team_area section-padding-0-0 clearfix" id="team">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mb-0">
                        <!-- Dream Dots -->
                        <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                            <img src="assets/img/svg/section-icon-1.svg" alt="">
                        </div>
                        <h2 class="fadeInUp" data-wow-delay="0.3s" style=' position: relative;top: 77px;'>اوائل الدفعات والاقسام</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- TESTIMONIALS -->
        <section class="testimonials owl-first">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <div id="customers-testimonials" class="owl-carousel testimonials-bot" style='position: relative;top: 59px;'>
                            <!--TESTIMONIAL -->
                            <?php
                              foreach($fetch_first as $fetch_fir=>$fetch_firs){ ?>
                                  <div class="item">
                                      <div class="shadow-effect">
                                          <img class="img-circle img-up" src="uploads/first/<?php echo $fetch_firs['img']; ?>" alt="" style="border-radius: 50%;">
                                          <p>
                                          <?php echo  $fetch_firs['arrangement']; ?>
                                          </p>
                                      </div>
                                      <div class="testimonial-name"><?php echo $fetch_firs['name']; ?></div>
                                  </div>
                                  
                              <?php }
                          ?>      
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF TESTIMONIALS -->
    </section>

    <!-- ##### Team Area End ##### -->

    <!-- Main Number start -->
    <section class="counterup-area">
        <h3>المعهد في ارقام</h3>
        <div class="single-counterup">
            <div class="counterup-content">
              <i class="fa fa-user-circle"></i>
              <p><span class="counter"><?php  echo $fetch_number['teaching']; ?></span></p>
              <h2>اعداد هيئه التدريس</h2>
            </div>
        </div>
        <div class="single-counterup">
            <div class="counterup-content">
              <i class="fa fa-id-card"></i>
              <p><span class="counter"><?php  echo $fetch_number['worker']; ?></span></p>
              <h2>اعداد العاملين</h2>
            </div>
        </div>
        <div class="single-counterup">
            <div class="counterup-content">
              <i class="fa fa-users"></i>
              <p><span class="counter"><?php  echo $fetch_number['student']; ?></span></p>
              <h2>اعداد الطلاب</h2>
            </div>
        </div>
        <div class="single-counterup">
            <div class="counterup-content">
              <i class="fa fa-graduation-cap"></i>
              <p><span class="counter"><?php  echo $fetch_number['graduate']; ?></span></p>
              <h2>اعداد الخريجين</h2>
            </div>
        </div>
    </section>
	<!-- Main Number End -->
  
    </div>
    </div>




<?php
    include 'php/initfooter.php';
    
?>
<script src="layout/js/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="layout/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS -->
<script src="layout/js/jquery.marquee.js"></script><!-- Leading FUCTIONS -->
<script src="layout/js/pluginsone.js"></script><!-- Leading FUCTIONS -->
<script src="layout/js/script.js"></script><!-- Leading FUCTIONS -->
<!-- Counter Up js -->
<script src="layout/js/jquery.counterup.min.js" type="text/javascript"></script>
<script src="layout/js/jquery.waypoints.min.js" type="text/javascript"></script>
    <!-- Active js -->
<script src="js/active.js" type="text/javascript"></script>

<script>
    
$(function(){
	$('.marquee').marquee({
		speed: 100,
		gap: 0,
		delayBeforeStart: 0,
		direction: 'left',
		duplicated: true,
		pauseOnHover: true
	});
	$('.marquee1').marquee({
		speed: 50,
		gap: 0,
		delayBeforeStart: 0,
		direction: 'up',
		duplicated: true,
		pauseOnHover: true
	});
});
</script>
   <?php }
   ?>
    