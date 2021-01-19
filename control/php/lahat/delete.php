<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}else{

include '../DB/conn.php';
header('content-type:application/json;charset=utf-8');
if ($_SERVER['REQUEST_METHOD']=='POST') {
  
   $id=filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
   $select_file_img=$con->prepare('SELECT * FROM lahat WHERE id=?');
   $select_file_img->execute(array($id));
   $fetch_file_img=$select_file_img->fetch();
   $file_image_unlink=$fetch_file_img['img'];
    unlink("../../../uploads/files/lahat/".$file_image_unlink);
   $delete=$con->prepare('DELETE FROM lahat WHERE id=?');
   $delete->execute(array($id));
   $select=$con->prepare('SELECT * FROM lahat ORDER BY id DESC');
   $select->execute();
   $fetch=$select->fetchAll();
   $data=array();
   if ($delete) {
       $data['content']='<table id="order-listing" class="table">
                   <thead>
                   <tr>
                       <th>الرقم</th>
                       <th>تاريخ الاضافة</th>
                       <th>تعديل</th>
                       <th>حذف</th>
                       <th>عرض</th>
                       
                   
                   </tr>
                   </thead>
                   <tbody>';
       foreach ($fetch as $fet=>$fe) {
           $data['content'].='
                       
                   <tr role="row">
                       
                       <td> '.$fe['id'].'</td>
                       <td> '.$fe['date'].'</td>
                       <td>
                           <button type="button" id='.$fe['id'].'
                           class="btn btn-success editres" >تعديل</button>
                       </td>
                       <td>
                           <button type="button" id='.$fe['id'].'
                           class="btn btn-danger deleteres">حذف</button>
                       </td>
                       <td>
                           <button type="button" id='.$fe['id'].'
                           class="btn btn-info show-element">عرض</button>
                       </td>
                   </tr>';
       }
                    
       $data['content'].='
                                   </tbody>
                                       </table>';
   }
   echo json_encode($data);
}

}