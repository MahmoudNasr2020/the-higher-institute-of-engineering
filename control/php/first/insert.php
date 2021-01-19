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
        $id=filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
        $type=filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);
        $name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
        $arrangement=filter_var(trim($_POST['arrangement']),FILTER_SANITIZE_STRING);
        $file=$_FILES['img']['name'];
        $file_tmp=$_FILES['img']['tmp_name'];
        $file_size=$_FILES['img']['size'];
        $extension=array('jpeg','jpg','png');
        $image=explode('.',$file);
        $image=strtolower(end($image));
        $date=date('Y:m:d');
        $data=array();
        if(empty($name)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>يجب ادخال اسم الطالب</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        elseif(empty($arrangement)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>يجب ادخال مركز الطالب</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        
        
        else{
    
                if($type=='update'){
                    $select=$con->prepare('SELECT img FROM first WHERE id=?');
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
                            $img_file_data='default.jpg';
                            if($img_file_data != $fetch['img']){
                                unlink("../../../uploads/first/".$fetch['img']);
                            }
                            $myimg=rand(0,10000000000000).'.'.$image;
                            $folder='../../../uploads/first/'.$myimg;
                            move_uploaded_file($file_tmp,$folder);
                            $data['respons']='success';
                            $task='update';
    
                        }
                    }
                }
                else{
                    if(empty($file)){
                            $myimg='default.png';
                            $data['respons']='success';
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
                                $myimg=rand(0,10000000000000).'.'.$image;
                                $folder='../../../uploads/first/'.$myimg;
                                move_uploaded_file($file_tmp,$folder);
                                $data['respons']='success';
                                $task='insert';
                        }
                    }
                   
                }
    
        }
                if($data['respons']=='success'){
                    if($task=='update'){
                        $update=$con->prepare('UPDATE first SET name=?,arrangement=?,img=? WHERE id=?');
                        $update->execute(array($name,$arrangement,$myimg,$id));
                        $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>تم التعديل بنجاح</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    }
                    else{
                        $insert=$con->prepare('INSERT INTO first(name,arrangement,img) VALUES(?,?,?)');
                        $insert->execute(array($name,$arrangement,$myimg));
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
            $global=$con->prepare('SELECT * FROM first ORDER BY id DESC');
            $global->execute();
            $fetchglobal=$global->fetchAll();
            $data['html']='<table id="order-listing" class="table">
            <thead>
            <tr>
                <th>الرقم</th>
                <th>الصورة</th>
                <th>تعديل</th>
                <th>حذف</th>
                <th>عرض</th>
                
            
            </tr>
            </thead>
            <tbody>';
                foreach($fetchglobal as $fet=>$fe){ 
                    $data['html'].='
                
            <tr role="row">
                <td>'.$fe['id'].'</td>
                <td>
                      <img src="../../../uploads/first/'.$fe['img'].'" 
                      class="mr-2" alt="image"> 
                            </td>
                <td>
                    <button type="button" id='.$fe['id'].'
                    class="btn btn-success editnews" >تعديل</button>
                </td>
                <td>
                    <button type="button" id='.$fe['id'].'
                    class="btn btn-danger deletenews">حذف</button>
                </td>
                <td>
                    <button type="button" id='.$fe['id'].'
                    class="btn btn-info show-element">عرض</button>
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
