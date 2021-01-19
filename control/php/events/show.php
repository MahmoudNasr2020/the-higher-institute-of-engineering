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
    $select=$con->prepare('SELECT * FROM event WHERE id=?');
    $select->execute(array($id));
    $fetch=$select->fetch();
    $data=array();
    if($select){
      $data['content']='<!-- Card -->
    <div class="card">
      <!-- Card content -->
      <div class="card-body">
    
        <!-- Title -->
        <h3>الحدث :</h3><br>
        <h4 class="card-title"><a>'.$fetch['text'].'</a></h3>
        <!-- Text -->
        
      </div>
    
    </div>
    <!-- Card -->';
    }
    
    echo json_encode($data);
}
}
