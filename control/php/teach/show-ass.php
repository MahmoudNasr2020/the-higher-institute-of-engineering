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
    $select=$con->prepare('SELECT * FROM techass WHERE id=?');
    $select->execute(array($id));
    $fetch=$select->fetch();
    $data=array();
    if($select){
      $data['content']='<!-- Card -->
    <div class="card">
    
      <!-- Card image -->
      <img class="card-img-top" src="../../../uploads/teaching/'.$fetch['img'].'" 
      style="height: 275px;" alt="Card image cap">
      <!-- Card content -->
      <div class="card-body">
    
      <!-- Title -->
      <h4 class="card-title"><a>الاسم  : '.$fetch['name'].'</a></h4>
      <h4 class="card-title"><a>رقم الغرفة  : '.$fetch['room'].'</a></h4>
      <h4 class="card-title"><a>الفيس بوك  :
      <span class="profile-btn" id="assign">
      <a href="'.$fetch["face"].'" target=_blank >
                      <i class="fab fa-facebook-f"></i>
                   </a>
         </span>
                   </a>
      </h4>
      <h4 class="card-title"><a>الانستغرام  :
      <span class="profile-btn" id="assign">
      <a href="'.$fetch["insta"].'"  target=_blank>
                      <i class="fab fa-linkedin-in"></i>
                   </a>
         </span>
                   </a>
      </h4>
      <!-- Text -->
      </div>
    
    </div>
    <!-- Card -->';
    }
    
    echo json_encode($data);
}
}
