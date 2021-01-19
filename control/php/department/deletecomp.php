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
     $select_file_img=$con->prepare('SELECT * FROM comtable WHERE id=?');
     $select_file_img->execute(array($id));
     $fetch_file_img=$select_file_img->fetch();
     $file_image_unlink=$fetch_file_img['img'];
     unlink("../../../uploads/computer/".$file_image_unlink);
     $delete=$con->prepare('DELETE FROM comtable WHERE id=?');
     $delete->execute(array($id));
     $select=$con->prepare('SELECT * FROM comtable ORDER BY id DESC');
     $select->execute();
     $fetch=$select->fetchAll();
     $data=array();
     if ($delete) {
         $data['content']=' <table class="civiltable">
         <thead>
           <tr>
             <th> الاسم </th>
             <th> تعديل </th>
             <th> حذف </th>
             <th>عرض</th>
           </tr>
         </thead>
         <tbody>';
             foreach($fetch as $fetchtabl=>$fetchtab){ 
                 $data['content'].='<tr>
               <td>
               '.$fetchtab['text'].'
                 <td>
                 <button type="button" class="btn btn-success edittable"
                 id='.$fetchtab['id'].'
                 data-toggle="modal" data-target="#tables"
                 style="padding: 10px;margin-right: -7px;"
                 
                 >تعديل</button>
               </td>
               <td>
                    <button type="button" id='.$fetchtab['id'].'
                    data-toggle="modal" data-target="#modalConfirmDelete"
                    style="padding: 10px;margin-right: -7px;"
                    class="btn btn-danger deletetable">حذف</button>
             </td>
               <td> 
               <button type="button" class="btn btn-info showtable" 
               id='.$fetchtab['id'].'
               data-toggle="modal" data-target="#modal-showtable""
               style="padding: 10px;margin-right: -7px;">عرض</button>
               </td>
             </tr>';
          } 
          $data['content'].='</tbody>
       </table>';
     }
     echo json_encode($data);
 }
  
}
 