<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}else{
    include '../DB/conn.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $title=filter_var(trim($_POST['title']),FILTER_SANITIZE_STRING);
        $desc=filter_var(trim($_POST['desc']),FILTER_SANITIZE_STRING);
        $satute=filter_var(trim($_POST['satute']),FILTER_SANITIZE_NUMBER_INT);
        $data=array();
        if(empty($title)){
            $data['respons']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>العنوان صغير جداً</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            $data['error']=1;
        }
        elseif(strlen($desc)<6){
            $data['respons']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>وصف الموقع صغير جداً</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
             $data['error']=1;
        }
        
        else{
            $update=$con->prepare('UPDATE setting SET title=?,description=?,staute=? WHERE id=1');
            $update->execute(array($title,$desc,$satute));
            $data['respons']='<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>تم الحفظ بنجاح</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div>';
             $data['error']=0;

        }
        echo json_encode($data);

    }
}
   