<?php
    session_start();
    include '../php/DB/conn.php';
    use PHPMailer\PHPMailer\PHPMailer;
    if(isset($_SESSION['email'])){
        if($_SESSION['statue'] != 0 ){
            header("location:../php/activity/activity.php");
        }
        else{
         header("location:../php/main/main.php");
        }
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
        $email=filter_var(trim($email),FILTER_VALIDATE_EMAIL);
        $error='';
        if(empty($email)|| $email != true ){
            $error='<div class="alert alert-danger alert-dismissible fade show" role="alert" style="
            text-align: right;
        ">
                    <strong> برجاء التاكد من الايميل </strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
        }

        else{
            $select=$con->prepare('SELECT * FROM admin WHERE email=?');
            $select->execute(array($email));
            $count=$select->rowCount();
            $fetch=$select->fetch();
            if($count > 0){
                $myemail='mmmnnn2016161515@gmail.com';
                $toEmail=$fetch['email'];
                $password=rand(0,100000000000000);
                $password_hash=password_hash($password,PASSWORD_DEFAULT);
                $update=$con->prepare('UPDATE admin SET password=? WHERE email=?');
                $update->execute(array($password_hash,$email));
                $subject='change password';
                $body='<html>
                <meta charset="utf-8">
                <head>
                </head>
                <body>
                <h4 class="card-title">المعهد العالي للهندسة بمدينة الثقافة والعلوم</h4>
                <table>
                       <thead>
                         <tr>
                           <th>كلمة السر الجديدة</th>     
                         </tr>
                       </thead>
                       <tbody>                      
                               <tr style=>
                               <td style="
                               border: 1px solid black;padding: 10px;text-align: right;">
                                   '.$password.'
                                   </td>      
                                   </tr>      
                       </tbody>
                     </table>
                     </body>
                </html>
                ';
                require_once "PHPMailer/PHPMailer.php";
                require_once "PHPMailer/SMTP.php";
                require_once "PHPMailer/Exception.php";
                $mail=new PHPMailer();
                $mail -> charSet = "UTF-8";
        
                $mail->isSMTP();
                $mail->Host= 'smtp.gmail.com';
                $mail->SMTPAuth= true;
                $mail->Username =  $myemail;
                $mail->Password= "Asas123654";
                $mail->SMTPSecure= 'ssl';
                $mail->Port= 465;
        
                $mail->isHTML(true);
                $mail->setFrom($myemail);
                $mail->addAddress($toEmail);
                $mail->Subject = $subject;
                $mail->Body    = $body;
                if($mail->send()){
                   $error='<div class="alert alert-success alert-dismissible fade show" style=" text-align: right;" role="alert">
                    <strong>  😊 تم ارسال رسالة الي الايميل الخاص بك </strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    echo "<meta http-equiv='refresh' content='2;url=../index.php'>";
                    $data['respons']='success';

                } 
               
            }
            else{
                $error='<div class="alert alert-danger alert-dismissible fade show" role="alert" style="
                text-align: right;
            ">
                <strong>  😡 هذه الايميل غير مسجل لدينا </strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="ar">
<head>
	<title>تسجيل الدخول</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../layout/pattern/control.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method='POST'>
                <div class="wrap-input100" style='border-bottom:none'>
						<?php if(!empty($error)){
                            echo $error;
                        } ?>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter Email">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							send
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>