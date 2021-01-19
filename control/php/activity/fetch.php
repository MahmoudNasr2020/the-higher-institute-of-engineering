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
        if($view != ''){
            $update=$con->prepare('UPDATE activity SET statue=? WHERE statue=0');
            $update->execute(array(1));
    }
    $select=$con->prepare('SELECT * FROM activity ORDER BY id DESC LIMIT 3 ');
    $select->execute();
    $fetch=$select->fetchAll();
    $output='';
    if($select->rowCount() > 0 ){
        foreach($fetch as $fetc=>$fet){
            $output.='  <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item" href="../../php/activity/activity.php">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                            <i class="fas fa-bell"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject font-weight-normal mb-1">اتحاد الطلاب</h6>
                        <p class="text-gray ellipsis mb-0"> اضافة جديدة..اضغط للاطلاع </p>
                        <p class="text-gray ellipsis mb-0">'.$fet['timeday'].'</p>
                    </div>
                    </a>';
        }
    
    }else{
        $output.='<div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">لا توجد اضافات جديدة</h6>
                    </div>
                    </a>
                    <div class="dropdown-divider"></div>';
    }
    $select_count=$con->prepare("SELECT * FROM activity WHERE statue=0");
    $select_count->execute();
    $count=$select_count->rowCount();
    $data=array('content'=>$output,'count'=>$count);
    echo json_encode($data);
    }
}
