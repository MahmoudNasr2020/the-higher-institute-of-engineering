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
    $select=$con->prepare('SELECT * FROM comtable WHERE id=?');
    $select->execute(array($id));
    $fetch=$select->fetch();
    $data=array();
    if($select){
      $data['content']='<table class="table">
      <thead class="black white-text">
        <tr>
          <th scope="col">اسم الجدول</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$fetch['text'].'</td>
        </tr>
      </tbody>
      <thead class="black white-text">
        <tr>
          <th scope="col">تحميل الملف</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <a href="../../../uploads/computer/'.$fetch['img'].'" 
          download="../../../uploads/computer/'.$fetch['img'].'">
          <button type="button" class="btn btn-info waves-effect waves-light" 
          style=" right: 58px;top: -21px;">تحميل 
          </button>
          </a>
          </td>
        </tr>
      </tbody>
    </table>
    ';
    }
    
    echo json_encode($data);
}  
}
