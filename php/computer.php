<?php 
	include '../control/php/DB/conn.php';
    $select=$con->prepare('SELECT * FROM setting WHERE id=?');
    $select->execute(array(1));
    $fetch=$select->fetch(); 
	$select_about=$con->prepare('SELECT * FROM aboutcom WHERE id=1');
    $select_about->execute();
	$fetch_about= $select_about->fetch();
	$select_message=$con->prepare('SELECT * FROM commessage WHERE id=1');
    $select_message->execute();
	$fetch_message= $select_message->fetch();
	$select_table=$con->prepare('SELECT * FROM comtable ORDER BY id DESC');
    $select_table->execute();
	$fetch_table= $select_table->fetchAll();
    if($fetch['staute']==0){ ?>
		<!DOCTYPE html>
		<html>
			<head>
				<link rel='shortcut icon' href="../layout/pattern/close.png">
				 <title><?php $fetch['title']; ?> | قسم هندسة الحاسب</title>
	
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
		$department='active';
		$title=$fetch['title'].' | هندسة الحاسب ';
	   include 'inithead.php'; 
		  ?>
		<div class='page-content'>
        <!--Start word-->
                <div class="depertment_pre section-full bg-white content-inner-2" style="background-image:url(../layout/pattern/pt1.png);">
                                        <div class="container">
                                          <div class="section-head text-center">
                                                <h3 class="title">قسم هندسة الحاسب</h3>
                                        </div>
                                        <div class="row align-items-center about-bx2">
                                        <div class="col-lg-10 col-md-12 col-sm-12 col-12">
                                         <div class="about-box">
                                        <p class="ext"><?php echo $fetch_about['text']; ?><p>
                                        </div>
                                         </div>
                                        <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                                        <img src="../uploads/computer/<?php echo $fetch_about['img']; ?>" class="img" alt=""/>
                                    <h5> كلمة رئيس القسم</h5>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="content-block">
			<div class="resala_ahdaf home_gallery section-full content-inner bg-gray">
				<div class="container">
		    	<div class="row">
						<div class="accordion" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h2 class="mb-0">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          الرؤية
				        </button>
				      </h2>
				    </div>

				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body"><?php echo $fetch_message['version']; ?></div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          الرسالة
				        </button>
				      </h2>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class="card-body"><?php echo $fetch_message['message']; ?></div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          الأهداف
				        </button>
				      </h2>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <div class="card-body"> <?php echo $fetch_message['aims']; ?></div>
				    </div>
				  </div>
				</div>
					</div>
		      </div>
		  </div>
			
			</div>
			
        </div>
      <!--End Word-->
      <!--start tables-->
      <div class="content-block" id="gadawel">
				<div class="gadawel resala_ahdaf home_gallery section-full content-inner bg-gray">
	         <div class="container">
						<div class="row">
							<?php
								foreach($fetch_table as $fetch_tabl=>$fetch_tab){ ?>
									<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="accordion faq-box m-b10" id="accordion<?php echo $fetch_tab['id']; ?>">
												<div class="card">
													<div class="card-header" id="headingOne">
														<a class="collapsed"  data-toggle="collapse" 
														data-target="#collapse<?php echo $fetch_tab['id']; ?>" 
														aria-expanded="true" aria-controls="collapseOne">
														<?php echo $fetch_tab['text']; ?>
													</a>
													</div>
													<div id="collapse<?php echo $fetch_tab['id']; ?>" class="collapse"  
													data-parent="#accordion<?php echo $fetch_tab['id']; ?>">
														<div class="card-body"><a href="../uploads/computer/<?php echo $fetch_tab['img']; ?>" 
																   download="../uploads/computer/<?php echo $fetch_tab['img']; ?>"> تحميل الملف المطلوب </a>
														</div>
															
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
      <!--End tables-->
     </div>

<?php
    include 'initfooter.php';
    
	  }
    ?>
    