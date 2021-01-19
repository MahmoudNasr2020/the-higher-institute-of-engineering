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
     $select_file_img=$con->prepare('SELECT * FROM techmanager WHERE id=?');
     $select_file_img->execute(array($id));
     $fetch_file_img=$select_file_img->fetch();
     $file_image_unlink=$fetch_file_img['img'];
     $img_file_data='tech.png';
     if($file_image_unlink != $img_file_data){
      unlink("../../../uploads/teaching/".$file_image_unlink);
     }
     $delete=$con->prepare('DELETE FROM techmanager WHERE id=?');
     $delete->execute(array($id));
     $select=$con->prepare('SELECT * FROM techmanager ORDER BY id DESC');
     $select->execute();
     $fetchglobal=$select->fetchAll();
     $data=array();
     if ($delete) {
         $data['content']='<table class="table table-manager">
                         <thead>
                           <tr>
                             <th> الصورة </th>
                             <th> الاسم </th>
                             <th> تعديل </th>
                             <th> حذف </th>
                             <th>عرض</th>
                           </tr>
                         </thead>
                         <tbody>';
                           
                             foreach($fetchglobal as $fe=>$fetch){ 
                                 $data['content'].='<tr>
                             <td>
                               <img src="../../../uploads/teaching/'.$fetch['img'].'" 
                               class="mr-2" alt="image"></td>
                             <td>'.$fetch['name'].'</td>
                             <td>
                               <button type="button" class="btn btn-success update-manager" 
                               style="padding: 10px;margin-right: -7px;" 
                               id='.$fetch['id'].'>تعديل</button>
                             </td>
                             <td> 
                                 <button type="button" class="btn btn-danger delete-manager" 
                                 style="padding: 10px;margin-right: -7px;" 
                                 id='.$fetch['id'].'>حذف</button>
                             </td>
                             <td> 
                             <button type="button" class="btn btn-info show-manager" 
                             style="padding: 10px;margin-right: -7px;" 
                             id='.$fetch['id'].'>عرض</button>
                             </td>
                           </tr>';
                              }                         
                          
 
 
                 $data['content'].= '</tbody>
                       </table>';
     }
     echo json_encode($data);
 }
    
 
}
 