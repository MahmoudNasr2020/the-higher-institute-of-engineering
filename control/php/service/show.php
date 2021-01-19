<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}else{
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    include '../DB/conn.php';
    header('content-type:application/json;charset=utf-8');
    $id=filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
    $select=$con->prepare('SELECT * FROM service WHERE id=?');
    $select->execute(array($id));
    $fetch=$select->fetch();
    $data=array();
    if($select){
      $data['content']='<!-- Card -->
    <div class="card">
    
      <!-- Card image -->
      <img class="card-img-top" src="../../../uploads/serves/'.$fetch['img'].'" 
      style="height: 275px;" alt="Card image cap">
      <!-- Card content -->
      <div class="card-body">
    
        <!-- Title -->
        <h4 class="card-title"><a>اسم الخدمة : '.$fetch['name'].'</a></h4>
        <h4 class="card-title"><a>لينك الخدمة : '.$fetch['link'].'</a></h4>
        <!-- Text -->
      </div>
    
    </div>
    <!-- Card -->';
    }
    
    echo json_encode($data);
}
}
