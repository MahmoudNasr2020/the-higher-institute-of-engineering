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
       $select_file_img=$con->prepare('SELECT * FROM activity WHERE id=?');
       $select_file_img->execute(array($id));
       $fetch_file_img=$select_file_img->fetch();
       $file_image_unlink=$fetch_file_img['img'];
       $img_file_data='student1.png';
       if($file_image_unlink != $img_file_data){
        unlink("../../../uploads/files/student/".$file_image_unlink);
       }
       $delete=$con->prepare('DELETE FROM activity WHERE id=?');
       $delete->execute(array($id));
       $select=$con->prepare('SELECT * FROM activity ORDER BY id DESC');
       $select->execute();
       $fetch=$select->fetchAll();
       $data=array();
       if ($delete) {
           $data['content']='<table id="order-listing" class="table">
                       <thead>
                       <tr>
                           <th>تاريخ الاضافة</th>
                           <th>الفرقة</th>
                           <th>تعديل</th>
                           <th>حذف</th>
                           <th>عرض</th>
                           
                       
                       </tr>
                       </thead>
                       <tbody>';
           foreach ($fetch as $fet=>$fe) {
               $data['content'].='
                           
                       <tr role="row">
                           
                           <td> '.$fe['timeday'].'</td>
                           <td>
                           <img src="../../../uploads/files/student/'.$fe['img'].'" 
                           class="mr-2" alt="image"></td>
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
