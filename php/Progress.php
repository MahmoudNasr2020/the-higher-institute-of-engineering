<?php 
	include '../control/php/DB/conn.php';
    $select=$con->prepare('SELECT * FROM setting WHERE id=?');
    $select->execute(array(1));
    $fetch=$select->fetch(); 
	$select_table=$con->prepare('SELECT * FROM progress');
    $select_table->execute();
	$fetch_table= $select_table->fetchAll();
    if($fetch['staute']==0){ ?>
		<!DOCTYPE html>
		<html>
			<head>
				<link rel='shortcut icon' href="../layout/pattern/close.png">
				 <title><?php $fetch['title']; ?> | قسم التقدم والقبول</title>
	
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
    $title=$fetch['title'].' | التقديم والقبول';
    include 'inithead.php';
?>
<div class='page-content'>
    <div class="section-head text-center">
         <h3 class="title" style='padding-top: 58px;margin-bottom: -21px;'>  قسم التقديم والقبول   </h3>
    </div>
 <div class="content-block">
			<div class="vision section-full content-inner bg-gray">
				<div class="container">
					<div class="row">
						<?php
							foreach($fetch_table as $fetch_tabl=>$fetch_tab){?> 
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="accordion faq-box m-b10" id="accordionExample12">
										<div class="card">
											<div class="card-header" id="headingOne">
												<a class="collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseOne<?php echo $fetch_tab['id']; ?>" aria-expanded="true" aria-controls="collapseOne">
													س : <?php echo $fetch_tab['question']; ?> ؟
												</a>
											</div>
											<div id="collapseOne<?php echo $fetch_tab['id']; ?>" class="collapse" aria-labelledby="headingOne02" data-parent="#accordionExample02">
												<div class="card-body">ج : <?php echo $fetch_tab['solution']; ?>.</div>
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

<?php
    include 'initfooter.php';
	  }    
?>
