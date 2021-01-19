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
      $id=filter_var(trim($_POST['id-about']), FILTER_SANITIZE_NUMBER_INT);
      $type=filter_var(trim($_POST['type-about']), FILTER_SANITIZE_STRING);
      $text=filter_var(trim($_POST['textabout']),FILTER_SANITIZE_STRING);
      $file=$_FILES['img']['name'];
      $file_tmp=$_FILES['img']['tmp_name'];
      $file_size=$_FILES['img']['size'];
      $extension=array('jpeg','jpg','png');
      $image=explode('.',$file);
      $image=strtolower(end($image));
      $data=array();
   if(empty($text)){
          $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>يجب ادخال النص </strong> 
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>';
          $data['respons']='error';
  }
      else{
  
              if($type=='update'){
                  $select=$con->prepare('SELECT img FROM aboutmech WHERE id=?');
                  $select->execute(array($id));
                  $fetch=$select->fetch();
                  if(empty($file)){
                      $myimg=$fetch['img'];
                      $data['respons']='success';
                      $task='update';
                  }
                  else{
                      if(!in_array($image,$extension)){
                          $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>نوع الصورة غير صالح</strong> 
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>';
                          $data['respons']='error';
  
                      }
                      elseif($file_size > 1000000){
                          $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>حجم الصورة كبير جداً</strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>';
                          $data['respons']='error';
                      }
                      else{
                          unlink("../../../uploads/mech/".$fetch['img']);
                          $myimg=rand(0,10000000000000).'.'.$image;
                          $folder='../../../uploads/mech/'.$myimg;
                          move_uploaded_file($file_tmp,$folder);
                          $data['respons']='success';
                          $task='update';
  
                      }
                  }
              }
             
  
      }
              if($data['respons']=='success'){
                  if($task=='update'){
                      $update=$con->prepare('UPDATE aboutmech SET text=?,img=? WHERE id=?');
                      $update->execute(array($text,$myimg,$id));
                      $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>تم التعديل بنجاح</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>';
                  }
                  
              }
                  $selectglobl=$con->prepare('SELECT * FROM aboutmech WHERE id=?');
                  $selectglobl->execute(array($id));
                  $fetchglobal=$selectglobl->fetch();
                  $data['html']=' <table class="table table-about">
                  <thead>
                    <tr>
                      <th> الصورة </th>
                      <th> تعديل </th>
                      <th>عرض</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <img src="../../../uploads/mech/'.$fetchglobal["img"].'" class="mr-2" alt="image"></td>
                      <td>
                        <button type="button" class="btn btn-success update" 
                        style="padding: 10px;margin-right: -7px;"
                        data-toggle="modal" data-target="#modalSubscriptionForm"
                        id='.$fetchglobal['id'].'
                        >تعديل</button>
                      </td>
                      <td> 
                      <button type="button" class="btn btn-info show-about" 
                      id='.$fetchglobal['id'].' 
                      style="padding: 10px;margin-right: -7px;">عرض</button>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>';
              echo json_encode($data);
  }
}
