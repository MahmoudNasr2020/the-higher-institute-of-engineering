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
    $select=$con->prepare('SELECT * FROM admin WHERE id=?');
    $select->execute(array($id));
    $fetch=$select->fetch();
    $data=array();
    if($select){
        $data['content']='<table class="table">
        <thead class="black white-text">
          <tr>
            <th scope="col">الاسم</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>'.$fetch['name'].'</td>
          </tr>
        </tbody>
        <thead class="black white-text">
          <tr>
            <th scope="col">الايميل</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>'.$fetch['email'].'</td>
          </tr>
        </tbody>
        <thead class="black white-text">
          <tr>
            <th scope="col">الدور</th>
          </tr>
        </thead>
        <tbody>
          <tr>';
          if($fetch['statue']==0){
            $data['content'].=' <td>مشرف</td>';
          }else{
            $data['content'].=' <td>اتحاد طلاب</td>';
          }
          $data['content'].='
          </tr>
        </tbody>
        <thead class="black white-text">
          <tr>
            <th scope="col">الصورة</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td style="border-radius:0;width:100px;height:100px;
          line-height: 28px;"><img style="border-radius:0;width:100px;height:100px;" src="../../../uploads/admin/'.$fetch['img'].'"></td>
          </tr>
        </tbody>
      </table>
      ';
      }
      
      echo json_encode($data);
}
}
