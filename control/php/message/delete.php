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
       $delete=$con->prepare('DELETE FROM contact WHERE id=?');
       $delete->execute(array($id));
       $select=$con->prepare('SELECT * FROM contact ORDER BY id DESC');
       $select->execute();
       $fetchglobal=$select->fetchAll();
       $data=array();
       if ($delete) {
           $data['content']='<table id="order-listing" class="table">
                               <thead>
                               <tr>
                                   <th>الاسم</th>
                                   <th>تاريخ الارسال</th>
                                   <th>رد</th>
                                   <th>حذف</th>
                                   <th>عرض</th>
                                   
                               
                               </tr>
                               </thead>
                               <tbody>';
                             
                               foreach($fetchglobal as $fe=>$fetch){ 
                                   $data['content'].=' <tr>
                                   <td>'.$fetch['name'].'</td>
                                   <td>'.$fetch['date'].'</td>
                                   <td>
                                          <button type="button" class="btn btn-secondary replay" 
                                          id='.$fetch['id'].'>
                                          رد</button>
                                   </td>
                                   <td>
                                          <button type="button" class="btn btn-danger delete"
                                          id='.$fetch['id'].'>حذف
                                          </button>
                                   </td>
                                   <td>
                                         <button type="button" class="btn btn-info show"  id='.$fetch['id'].'>
                                         عرض</button>
                                   </td>
                                 </tr>';
                                }                         
                            
   
   
                   $data['content'].= '</tbody>
                         </table>';
       }
       echo json_encode($data);
   }
      
}
 