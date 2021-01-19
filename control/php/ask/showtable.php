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
    $select=$con->prepare('SELECT * FROM question WHERE id=?');
    $select->execute(array($id));
    $fetch=$select->fetch();
    $data=array();
    if($select){
      $data['content']='<table class="table">
      <thead class="black white-text">
        <tr>
          <th scope="col">السؤال</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$fetch['question'].'</td>
        </tr>
      </tbody>
      <thead class="black white-text">
        <tr>
          <th scope="col">الاجابة</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td>'.$fetch['solution'].'</td>
        </tr>
      </tbody>
    </table>
    ';
    }
    
    echo json_encode($data);
}
}
