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
    $select=$con->prepare('SELECT * FROM contact WHERE id=?');
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
          <th scope="col">لينك الفيس بوك</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td><span class="profile-btn" id="assign"><a href="'.$fetch['link'].'" target=_blank ><i class="fab fa-facebook-f" style="
        font-size: 21px;color:#007bff"></i></a></span></a></td>
        </tr>
      </tbody>
      <thead class="black white-text">
        <tr>
          <th scope="col">رقم الموبايل</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td>'.$fetch['phone'].'</td>
        </tr>
      </tbody>
      <thead class="black white-text">
        <tr>
          <th scope="col">الرسالة</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td style="
        line-height: 28px;">'.$fetch['message'].'</td>
        </tr>
      </tbody>
    </table>
    ';
    }
    
    echo json_encode($data);
}
}
