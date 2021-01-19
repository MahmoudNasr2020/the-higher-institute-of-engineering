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
    $select=$con->prepare('SELECT * FROM aboutcom WHERE id=?');
    $select->execute(array(1));
    $fetch=$select->fetch();
    $data=array();
    if($select){
      $data['content']='<!-- Card -->
    <div class="card">
    <!-- Card image -->
      <img class="card-img-top" src="../../../uploads/computer/'.$fetch['img'].'" 
      style="height: 275px;" alt="Card image cap">
      <!-- Card content -->
      <!-- Card content -->
      <div class="card-body">
    
        <!-- Title -->
        <h4 class="card-title"><a> <span>النص : </span><br>
         '.$fetch['text'].'</a></h4>
        <!-- Text -->
        
      </div>
    
    </div>
    <!-- Card -->';
    }
    
    echo json_encode($data);
}
}
