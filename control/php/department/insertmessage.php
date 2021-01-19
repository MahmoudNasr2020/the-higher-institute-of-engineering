<?php 
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}else{
  include '../DB/conn.php';
  header('content-type:application/json;charset=utf-8');
  if($_SERVER['REQUEST_METHOD']=='POST'){
      $id=filter_var(trim($_POST['id-message']), FILTER_SANITIZE_NUMBER_INT);
      $type=filter_var(trim($_POST['type-message']), FILTER_SANITIZE_STRING);
      $message=filter_var(trim($_POST['message']),FILTER_SANITIZE_STRING);
      $version=filter_var(trim($_POST['version']),FILTER_SANITIZE_STRING);
      $aims=filter_var(trim($_POST['aims']),FILTER_SANITIZE_STRING);
      $data=array();
      if(empty($version)){
                   $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>يجب ادخال الرؤية</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                   </div>';
                   $data['respons']='error';
      }
      elseif(empty($message)){
          $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>يجب ادخال الرسالة </strong> 
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>';
          $data['respons']='error';
  }
  elseif(empty($aims)){
      $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>يجب ادخال الاهداف </strong> 
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>';
      $data['respons']='error';
  }
      else{
  
              if($type=='update'){
                  $update=$con->prepare('UPDATE civilmessage SET version=?,message=?,aims=? WHERE id=?');
                  $update->execute(array($version,$message,$aims,$id));
                  $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>تم التعديل بنجاح</strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>';
                  
              }
             
  
      }
                  $selectmessage=$con->prepare('SELECT * FROM civilmessage WHERE id=?');
                  $selectmessage->execute(array(1));
                  $fetchmessage=$selectmessage->fetch();
                  $data['html']=' <table class="table" id="table2">
                  <thead>
                    <tr>
                      <th> # </th>
                      <th> تعديل </th>
                      <th>عرض</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        الرؤية والرسالة والاهداف
                      <td>
                        <button type="button" class="btn btn-success update-message" 
                        style="padding: 10px;margin-right: -7px;" id='.$fetchmessage['id'].'
                        data-toggle="modal" data-target="#message-modal"
                        >تعديل</button>
                      </td>
                      <td> 
                      <button type="button" class="btn btn-info show-message"
                      id='.$fetchmessage['id'].' 
                      style="padding: 10px;margin-right: -7px;">عرض</button>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>';
              echo json_encode($data);
  }
}
