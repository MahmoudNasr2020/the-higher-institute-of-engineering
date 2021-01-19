<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}else{
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include '../DB/conn.php';
        $view=filter_var(trim($_POST['view']),FILTER_SANITIZE_STRING);
        if($view !=''){
            $update=$con->prepare('UPDATE contact SET statue=1 WHERE statue=0');
            $update->execute();
        }
        $select=$con->prepare('SELECT * FROM contact ORDER BY id DESC LIMIT 3');
        $select->execute();
        $fetch=$select->fetchAll();
        $content='';
        if($select->rowCount() > 0 ){
            foreach($fetch as $fetc=>$fet){
                $content.='
               
                <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item" href="../../php/message/message.php">
                        <div class="preview-thumbnail">
                            <img src="../../../uploads/user/12.png" alt="image" class="profile-pic">
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">'.$fet['name'].' ارسل رسالة</h6>
                            <p class="text-gray mb-0">'.$fet['date'].' </p>
                        </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        ';
                        
            }
        }
        else{
            $content.='<div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">لا توجد رسائل جديدة</h6>
                        </div>
                        </a>
                        <div class="dropdown-divider"></div>';
        }
        $select_count=$con->prepare('SELECT * FROM contact WHERE statue=0');
        $select_count->execute();
        $count=$select_count->rowCount();
        $data=array('content'=>$content,'count'=>$count);
        echo json_encode($data);
    }
}
   