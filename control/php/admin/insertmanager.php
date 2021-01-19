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
    $id=filter_var(trim($_POST['id-manager']), FILTER_SANITIZE_NUMBER_INT);
    $type=filter_var(trim($_POST['type-manager']), FILTER_SANITIZE_STRING);
    $name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $email=filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
    $passwordverfiy=filter_var(trim($_POST['passwordverfiy']),FILTER_SANITIZE_STRING);
    $statue=filter_var(trim($_POST['statue']),FILTER_SANITIZE_STRING); 
    $file=$_FILES['img']['name'];
    $file_tmp=$_FILES['img']['tmp_name'];
    $file_size=$_FILES['img']['size'];
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
                }else{
                    $data['email']='success';
                }
            }
            if($file == ''){
                $myimg=$fetch['img'];
                $data['file']='success';
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
                    $task='update';

                }
            }

            if($password==''){
                $password_hash= $fetch['password'];
                $data['pass']='success';
                $task='update';
            }
            else{
                if(strlen($password) < 8){
                    $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>كلمة السر يجب ان تكون اكبر من 8 حروف او ارقام</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['pass']='error';
                }
                elseif($password !== $passwordverfiy){
                    $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>الباسورد غير مطابق</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['pass']='error';
                }
                else{
                    $password_hash=password_hash($password,PASSWORD_DEFAULT);
                    $data['pass']='success';
                    $task='update';
                }
                
                
            }
            if($name == ''){
                $name=$fetch['name'];    
            }
           
        }
        else{
            if(empty($file)){
                    $myimg='user1.png';
                    $data['file']='success';
                    $task='insert';
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
                        $myimg=rand(0,10000000000000).'.'.$image;
                        $folder='../../../uploads/admin/'.$myimg;
                        move_uploaded_file($file_tmp,$folder);
                        $data['file']='success';
                        $task='insert';
                }
            }
        
            if(strlen($password) < 8 ){
                $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>كلمة السر يجب ان تكون اكبر من 8 حروف او ارقام</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                $data['pass']='error';
            }
            elseif($password !== $passwordverfiy){
                $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>الباسورد غير مطابق</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                $data['pass']='error';
            }
            else{
                $password_hash=password_hash($password,PASSWORD_DEFAULT);
                $data['pass']='success';
                $task='insert';
            }     
            if(empty($name)){
                $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>يجب ادخال الاسم </strong> 
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                </div>';
                $data['name']='error';
                }
                else{
                    $data['name']='success';
                    $task='insert';
                }
                if(empty($email)){
                    $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       <strong>يجب ادخال الايميل </strong> 
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       </button>
                    </div>';
                    $data['email']='error';
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
                     $task='insert';
                } 
            } 
        }
    
            if($data['email'] == 'success' && $data['file']=='success' && $data['pass']=='success'){
                if($task=='update'){
                    $update=$con->prepare('UPDATE admin SET name=?,email=?,password=?,statue=?,img=? WHERE id=?');
                    $update->execute(array($name,$email,$password_hash,$statue,$myimg,$id));
                    $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>تم التعديل بنجاح</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
                else{
                    $insert=$con->prepare('INSERT INTO admin(name,email,password,statue,img) VALUES(?,?,?,?,?)');
                    $insert->execute(array($name,$email,$password_hash,$statue,$myimg));
                    $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>تم الاضافة بنجاح</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                            
                }
                   /*------------------------------------------------------------------------------------------
                                                       جلب البيانات كلها لعرضها بدون تحميل         
                  ---------------------------------------------------------------------------------*/
        $global=$con->prepare('SELECT * FROM admin ORDER BY id DESC');
        $global->execute();
        $fetchglobal=$global->fetchAll();
        $data['html']='<table id="order-listing" class="table">
        <thead>
        <tr>
            <th>الصورة</th>
            <th>الاسم</th>
            <th>تعديل</th>
            <th>حذف</th>
            <th>عرض</th>
            
        
        </tr>
        </thead>
        <tbody>';
            foreach($fetchglobal as $fet=>$fe){ 
                $data['html'].='<tr>
                <td>
                  <img src="../../../uploads/admin/'.$fe['img'].'" class="mr-2" alt="image"></td>
                <td>'.$fe['name'].'</td>
                <td>
                  <button type="button" class="btn btn-success update-manager" 
                  style="padding: 10px;margin-right: -7px;" id='.$fe['id'].'>تعديل</button>
                </td>
                <td> 
                    <button type="button" class="btn btn-danger delete-manager" 
                    style="padding: 10px;margin-right: -7px;" id='.$fe['id'].'>حذف</button>
                </td>
                <td> 
                <button type="button" class="btn btn-info show-manager" 
                style="padding: 10px;margin-right: -7px;" id='.$fe['id'].'>عرض</button>
                </td>
              </tr>';
            }
         
            $data['html'].='
                        </tbody>
                            </table>';
                
            }
          
            echo json_encode($data);
}
}
