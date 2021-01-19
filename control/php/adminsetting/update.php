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
    $id=filter_var(trim($_POST['id-manageradmin']), FILTER_SANITIZE_NUMBER_INT);
    $type=filter_var(trim($_POST['type-manageradmin']), FILTER_SANITIZE_STRING);
    $name=filter_var(trim($_POST['nameadmin']),FILTER_SANITIZE_STRING);
    $email=filter_var(trim($_POST['emailadmin']),FILTER_SANITIZE_STRING);
    $password=filter_var(trim($_POST['passwordadmin']),FILTER_SANITIZE_STRING);
    $passwordadminverify=filter_var(trim($_POST['passwordadminverify']),FILTER_SANITIZE_STRING);
    $file=$_FILES['imgadmin']['name'];
    $file_tmp=$_FILES['imgadmin']['tmp_name'];
    $file_size=$_FILES['imgadmin']['size'];
    $extension=array('jpeg','jpg','png');
    $image=explode('.',$file);
    $image=strtolower(end($image));
    $data=array();
    $selectall=$con->prepare('SELECT * FROM admin WHERE email=?');
    $selectall->execute(array($email));
    $count=$selectall->rowCount();
   
        if($type=='update'){
                $select=$con->prepare('SELECT * FROM admin WHERE id=?');
                $select->execute(array($id));
                $fetch=$select->fetch();
                if($name == ''){
                    $name=$fetch['name'];
                }
                if($email == ''){
                    $email=$fetch['email'];
                    $data['email']='success';
                }
                else{
                    if($count > 0){
                        $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>هذا الايميل مسجل لدينا بالفعل</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    $data['email']='error';
                    }
                    else{
                        $data['email']='success';
                    }
                }
                if($password == ''){
                    $password_hash= $fetch['password'];
                    $data['pass']='success';
                 
                }
               else{
                if(strlen($password)<8){
                    $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>كلمة السر يجب ان تكون اكبر من 8 حروف او ارقام</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['pass']='error';
                }
                elseif($password !== $passwordadminverify){
                    $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>كلمة السر غير متطابقة</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['pass']='error';
                }
                else{
                    $password_hash=password_hash($password,PASSWORD_DEFAULT);
                    $data['pass']='success';
                   
                } 
               }
                                      
                
                if(empty($file)){
                    $myimg=$fetch['img'];
                    $data['file']='success';
                   
                }
                else{
                    if(!in_array($image,$extension)){
                        $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>نوع الصورة غير صالح</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                        $data['file']='error';

                    }
                    elseif($file_size > 1000000){
                        $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>حجم الصورة كبير جداً</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                        $data['file']='error';
                    }
                    else{
                        $img_file_data='user1.png';
                        if($img_file_data != $fetch['img']){
                         unlink("../../../uploads/admin/".$fetch['img']);
                        }
                        $myimg=rand(0,10000000000000).'.'.$image;
                        $folder='../../../uploads/admin/'.$myimg;
                        move_uploaded_file($file_tmp,$folder);
                        $data['file']='success';
                       
                    }
                }           
        }

    
            if($data['email']=='success'&& $data['pass'] == 'success' && $data['file']=='success' ){
                    $update=$con->prepare('UPDATE admin SET name=?,email=?,password=?,img=? WHERE id=?');
                    $update->execute(array($name,$email,$password_hash,$myimg,$id));
                    $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>تم التعديل بنجاح</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                
                
                   /*------------------------------------------------------------------------------------------
                                                       جلب البيانات كلها لعرضها بدون تحميل         
                  ---------------------------------------------------------------------------------*/
        $global=$con->prepare('SELECT * FROM admin  WHERE id=?');
        $global->execute(array($id));
        $fetchglobal=$global->fetch();
        $data['name']=$fetchglobal['name'];
        $data['img']='../../../uploads/admin/'.$fetchglobal['img'];
                
            }
          
            echo json_encode($data);
}
}
