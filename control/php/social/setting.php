<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}else{
    include '../DB/conn.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $face=filter_var(trim($_POST['face']),FILTER_SANITIZE_STRING);
        $twitter=filter_var(trim($_POST['twitter']),FILTER_SANITIZE_STRING);
        $youtube=filter_var(trim($_POST['youtube']),FILTER_SANITIZE_STRING);
        $instagram=filter_var(trim($_POST['instagram']),FILTER_SANITIZE_STRING);
        $data=array();

            $update=$con->prepare('UPDATE social SET facebook=?,twitter=?,youtube=?,instagram=? WHERE id=1');
            $update->execute(array($face,$twitter,$youtube,$instagram));
            $data['respons']='<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>تم الحفظ بنجاح</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div>';
             $data['error']='success';

    
        echo json_encode($data);

    }
}
 