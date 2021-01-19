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
    $select=$con->prepare('SELECT * FROM activity WHERE id=?');
    $select->execute(array($id));
    $fetch=$select->fetch();
    $data=array();
    if($select){
      $data['content']='<table class="table">
      <thead class="black white-text">
        <tr>
          <th scope="col">الصورة</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <img src="../../../uploads/files/student/'.$fetch['img'].'" 
          class="mr-2" alt="image" style="width: 100%;height: 50%;border-radius: 0;">
          </td>
        </tr>
      </tbody>
      <thead class="black white-text">
        <tr>
          <th scope="col">الحدث</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$fetch['text'].'</td>
        </tr>
      </tbody>
    </table>
    ';
    }
    
    echo json_encode($data);
}
}
