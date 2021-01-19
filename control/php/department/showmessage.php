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
    $select=$con->prepare('SELECT * FROM civilmessage WHERE id=?');
    $select->execute(array(1));
    $fetch=$select->fetch();
    $data=array();
    if($select){
      $data['content']='<table class="table">
      <thead class="black white-text">
        <tr>
          <th scope="col">الرؤية</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$fetch['version'].'</td>
        </tr>
      </tbody>
      <thead class="black white-text">
        <tr>
          <th scope="col">الرسالة</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$fetch['message'].'</td>
        </tr>
      </tbody>
      <thead class="black white-text">
        <tr>
          <th scope="col">الاهداف</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$fetch['aims'].'</td>
        </tr>
      </tbody>
    </table>
    ';
    }
    
    echo json_encode($data);
}
}
