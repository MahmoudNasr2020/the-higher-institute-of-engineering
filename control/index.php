<?php
    session_start();
    include 'php/DB/conn.php';
    if(isset($_SESSION['email'])){
        if($_SESSION['statue'] != 0 ){
            header("location:php/activity/activity.php");
        }
        else{
         header("location:php/main/main.php");
        }
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
        $email=filter_var(trim($email),FILTER_VALIDATE_EMAIL);
        $password=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
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
        elseif(empty($password)){
            $error='<div class="alert alert-danger alert-dismissible fade show" role="alert" style="
            text-align: right;
        ">
                    <strong> لا يمكن ترك كلمة السر فارغة </strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
        }
        else{
            $select=$con->prepare('SELECT * FROM admin WHERE email=?');
            $select->execute(array($email));
            $count=$select->rowCount();
            if($count > 0){
                $fetch=$select->fetch();
                $password_hash=$fetch['password'];
                $id=$fetch['id'];
                if(password_verify($password,$password_hash)){
                    $_SESSION['email']=$email;
                    $_SESSION['id']=$id;
                    $_SESSION['statue']=$fetch['statue'];
                    if($_SESSION['statue'] != 0 ){
                        header("location:php/activity/activity.php");
                    }
                    else{
                     header("location:php/main/main.php");
                    }
                }else{
                    $error='<div class="alert alert-danger alert-dismissible fade show" role="alert" style="
                    text-align: right;
                ">
                    <strong> هذه البيانات غيرموجودة </strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
               
            }
            else{
                $error='<div class="alert alert-danger alert-dismissible fade show" role="alert" style="
                text-align: right;
            ">
                <strong> هذه البيانات غير موجودة </strong> 
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
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(login/images/bg-01.jpg);">
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

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">

						<div>
							<a href="login/reset.php" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
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