<?php 
 use PHPMailer\PHPMailer\PHPMailer;
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}
else{
    if($_SERVER['REQUEST_METHOD']=='POST'){
        header('content-type:application/json;charset=utf-8');
        $email=filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
        $email=filter_var(trim($_POST['email']),FILTER_VALIDATE_EMAIL);
        $myemail=filter_var(trim($_POST['myemail']),FILTER_SANITIZE_EMAIL);
        $myemail=filter_var(trim($_POST['myemail']),FILTER_VALIDATE_EMAIL);
        $message=filter_var(trim($_POST['message']),FILTER_SANITIZE_STRING);
        $data=array();
       if(empty($myemail) || $myemail != true){
            $data['error']='<div class="alert alert-danger alert-dismissible fade show" style=" text-align: right;" role="alert">
            <strong>  برجاء التاكد من صحة الايميل الخاص بك 😓 </strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $data['respons']='error';
        }
        elseif(empty($email) || $email != true){
            $data['error']='<div class="alert alert-danger alert-dismissible fade show" style=" text-align: right;" role="alert">
            <strong>  برجاء التاكد من صحة الايميل المرسل اليه 😓 </strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $data['respons']='error';
        }
         elseif(empty($message)){
            $data['error']='<div class="alert alert-danger alert-dismissible fade show" style=" text-align: right;" role="alert">
            <strong> برجاء عدم ترك الرسالة فارغة 😓 </strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;;">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $data['respons']='error';
        }
        else{
            $subject='Contact Us';
            $body='<html>
                      <meta charset="utf-8">
                      <head>
                      </head>
                      <body>
                      <h4 class="card-title">المعهد العالي للهندسة بمدينة الثقافة والعلوم</h4>
                      <table>
                             <thead>
                               <tr>
                                 <th>الرسالة</th>     
                               </tr>
                             </thead>
                             <tbody>                      
                                     <tr style=>
                                     <td style="
                                     border: 1px solid black;padding: 10px;text-align: right;">
                                         '.$message.'
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
            $mail->Username = "mmmnnn2016161515@gmail.com";
            $mail->Password= "Asas123654";
            $mail->SMTPSecure= 'ssl';
            $mail->Port= 465;
    
            $mail->isHTML(true);
            $mail->setFrom($myemail);
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            if($mail->send()){
                $data['content']='<div class="alert alert-success alert-dismissible fade show" style=" text-align: right;" role="alert">
                <strong> تم الارسال بنجاح 😊 </strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                $data['respons']='success';
            }
        }
        echo json_encode($data);
    }
}
 