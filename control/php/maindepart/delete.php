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
     $select_file_img=$con->prepare('SELECT * FROM depmain WHERE id=?');
     $select_file_img->execute(array($id));
     $fetch_file_img=$select_file_img->fetch();
     $file_image_unlink=$fetch_file_img['img'];
     unlink("../../../uploads/depmain/".$file_image_unlink);
     $delete=$con->prepare('DELETE FROM depmain WHERE id=?');
     $delete->execute(array($id));
     $select=$con->prepare('SELECT * FROM depmain ORDER BY id DESC');
     $select->execute();
     $fetchglobal=$select->fetchAll();
     $data=array();
     if ($delete) {
         $data['content']='<table class="table">
                         <thead>
                           <tr>
                             <th> الصورة </th>
                             <th> اسم الخدمة </th>
                             <th> تعديل </th>
                             <th> حذف </th>
                             <th>عرض</th>
                           </tr>
                         </thead>
                         <tbody>';
                           
                             foreach($fetchglobal as $fe=>$fetch){ 
                                 $data['content'].='<tr>
                             <td>
                               <img src="../../../uploads/depmain/'.$fetch['img'].'" 
                               class="mr-2" alt="image"></td>
                             <td>'.$fetch['name'].'</td>
                             <td>
                               <button type="button" class="btn btn-success update-element" 
                               style="padding: 10px;margin-right: -7px;" 
                               id='.$fetch['id'].'>تعديل</button>
                             </td>
                             <td> 
                                 <button type="button" class="btn btn-danger delete-element" 
                                 style="padding: 10px;margin-right: -7px;" 
                                 id='.$fetch['id'].'>حذف</button>
                             </td>
                             <td> 
                             <button type="button" class="btn btn-info show-element" 
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
