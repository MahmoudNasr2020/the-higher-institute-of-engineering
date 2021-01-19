<?php 
include '../control/php/DB/conn.php';
$select=$con->prepare('SELECT * FROM setting WHERE id=?');
$select->execute(array(1));
$fetch=$select->fetch(); 
if($fetch['staute']==0){ ?>
	<!DOCTYPE html>
	<html>
		<head>
			<link rel='shortcut icon' href="../layout/pattern/close.png">
			 <title><?php $fetch['title']; ?> | اتصل بنا</title>

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
	$contect='active';
    $title=$fetch['title'].' | اتصل بنا ';
    include 'inithead.php';
?>
<link rel='stylesheet' href="../layout/css/main.css">
<div class="contact1" style="margin-top: -3px;padding-top: 63px;padding-bottom: 63px;">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="../layout/pattern/img.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form form-send">
				<span class="contact1-form-title">
					المعهد العالي للهندسة - اتصل بنا
				</span>
				
				<div class="wrap-input1 validate-input" data-validate = "الاسم مطلوب">
					<input class="input1" type="text" name="name" placeholder="الاسم">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "الايميل مطلوب : ex@abc.xyz">
					<input class="input1" type="email" name="email" placeholder="الايميل">
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input">
					<input class="input1" type="text" name="link" placeholder="  لينك اكونت الفيس بوك للتواصل - اختياري">
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input" data-validate = "رقم الموبايل مطلوب">
					<input class="input1" type="text" name="subject" placeholder="رقم الموبايل">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "الرساله مطلوبة">
					<textarea class="input1" name="message" placeholder="الرساله"></textarea>
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1">
					<div id='respons'></div>
				</div>
				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn send" type='submit'>
						<span>
							ارسال
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
    </div>
    <?php
    include 'initfooter.php';
    
?>

<!--===============================================================================================-->
	<script src="../layout/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="../layout/js/main.js"></script>
	<script>
		$('.form-send').on('submit',function(e){
			e.preventDefault();
			$.ajax({
				url:'send.php',
				method:'POST',
				data:$(this).serialize(),
				dataType:'json',
				success:function(data){
					if(data.respons=='error'){
						$('#respons').html(data.error);
					}else{
						$('#respons').html(data.error);
						
					}
				}
			});
		});
	</script>

<?php
  }
  ?>
	