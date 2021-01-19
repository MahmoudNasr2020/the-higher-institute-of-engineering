<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}else{
    include '../DB/conn.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $number=filter_var(trim($_POST['number']),FILTER_SANITIZE_NUMBER_INT);
        $email=filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
        $address=filter_var(trim($_POST['address']),FILTER_SANITIZE_STRING);
        $data=array();
        if(empty($number)){
            $data['respons']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>يجب ادخال رقم التواصل</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            $data['error']='error';
        }
        elseif(empty($email)){
            $data['respons']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>يجب ادخال الايميل</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
             $data['error']='error';
        }
        elseif(empty($address)){
            $data['respons']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>يجب ادخال العنوان </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
             $data['error']='error';
        }
        else{
            $update=$con->prepare('UPDATE mainContact SET number=?,email=?,address=? WHERE id=1');
            $update->execute(array($number,$email,$address));
            $data['respons']='<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>تم الحفظ بنجاح</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div>';
             $data['error']='success';

        }
        echo json_encode($data);

    }
}
   