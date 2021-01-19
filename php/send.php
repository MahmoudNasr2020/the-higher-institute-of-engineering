<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    header('content-type:application/json;charset=utf-8');
    include '../control/php/DB/conn.php';
    $name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $email=filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
    $email=filter_var(trim($_POST['email']),FILTER_VALIDATE_EMAIL);
    $link=filter_var(trim($_POST['link']),FILTER_SANITIZE_STRING);
    $phone=filter_var(trim($_POST['subject']),FILTER_SANITIZE_NUMBER_INT);
    $message=filter_var(trim($_POST['message']),FILTER_SANITIZE_STRING);
    $date=date('Y:m:d h-i-s');
    $data=array();
    if(strlen($name) < 3){
        $data['error']='<div class="alert alert-danger alert-dismissible fade show" style=" text-align: right;" role="alert">
        <strong> 😓 برجاء ادخال الاسم بشكل صحيح </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;font-size: 30px;">
        <span aria-hidden="true">&times;</span>
        </button>
     </div>';
     $data['respons']='error';
    }
    elseif($email!=true){
        $data['error']='<div class="alert alert-danger alert-dismissible fade show" style=" text-align: right;" role="alert">
        <strong> 😓 برجاء ادخال الايميل بشكل صحيح   </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;font-size: 30px;">
        <span aria-hidden="true">&times;</span>
        </button>
     </div>';
        $data['respons']='error';
    }

    
    elseif(strlen($phone) < 10){
        $data['error']='<div class="alert alert-danger alert-dismissible fade show" style=" text-align: right;" role="alert">
        <strong> 😓 رقم الموبايل غير صالح  </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;font-size: 30px;">
        <span aria-hidden="true">&times;</span>
        </button>
     </div>';
        $data['respons']='error';
    }
    elseif(strlen($message) < 5){
        $data['error']='<div class="alert alert-danger alert-dismissible fade show" style=" text-align: right;" role="alert">
        <strong> 😓 رسالتك صغيرة جداً  </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;font-size: 30px;">
        <span aria-hidden="true">&times;</span>
        </button>
     </div>';
        $data['respons']='error';
    }
    
    else{
            $insert=$con->prepare("INSERT INTO contact(name,email,link,phone,message,date) VALUES(?,?,?,?,?,?)");
            $insert->execute(array($name,$email,$link,$phone,$message,$date));
            $data['error']='<div class="alert alert-success alert-dismissible fade show" style=" text-align: right;" role="alert">
            <strong> 😊 تم الارسال بنجاح </strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: 0;font-size: 30px;">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $data['respons']='success';
    }
    echo json_encode($data);

}