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
        $id=filter_var(trim($_POST['id-ass']), FILTER_SANITIZE_NUMBER_INT);
        $type=filter_var(trim($_POST['type-ass']), FILTER_SANITIZE_STRING);
        $name=filter_var(trim($_POST['name-ass']),FILTER_SANITIZE_STRING);
        $room=filter_var(trim($_POST['room-ass']),FILTER_SANITIZE_STRING);
        $face=filter_var(trim($_POST['faceass']),FILTER_SANITIZE_STRING);
        $face=filter_var(trim($_POST['faceass']),FILTER_VALIDATE_URL);
        $insta=filter_var(trim($_POST['instaass']),FILTER_SANITIZE_STRING);
        $insta=filter_var(trim($_POST['instaass']),FILTER_VALIDATE_URL); 
        $file=$_FILES['img-ass']['name'];
        $file_tmp=$_FILES['img-ass']['tmp_name'];
        $file_size=$_FILES['img-ass']['size'];
        $extension=array('jpeg','jpg','png');
        $image=explode('.',$file);
        $image=strtolower(end($image));
        $data=array();
        if(empty($name)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>يجب ادخال الاسم </strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        
        else{
    
                if($type=='update'){
                    $select=$con->prepare('SELECT img FROM techass WHERE id=?');
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
                            $img_file_data='tech.png';
                            if($img_file_data != $fetch['img']){
                                unlink("../../../uploads/teaching/".$fetch['img']);
                            }
                            $myimg=rand(0,10000000000000).'.'.$image;
                            $folder='../../../uploads/teaching/'.$myimg;
                            move_uploaded_file($file_tmp,$folder);
                            $data['respons']='success';
                            $task='update';
    
                        }
                    }
                }
                else{
                    if(empty($file)){
                            $myimg='tech.png';
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
                                $folder='../../../uploads/teaching/'.$myimg;
                                move_uploaded_file($file_tmp,$folder);
                                $data['respons']='success';
                                $task='insert';
                        }
                    }
                   
                }
    
        }
                if($data['respons']=='success'){
                    if($task=='update'){
                        $update=$con->prepare('UPDATE techass SET name=?,room=?,face=?,insta=?,img=? WHERE id=?');
                        $update->execute(array($name,$room,$face,$insta,$myimg,$id));
                        $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>تم التعديل بنجاح</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    }
                    else{
                        $insert=$con->prepare('INSERT INTO techass(name,room,face,insta,img) VALUES(?,?,?,?,?)');
                        $insert->execute(array($name,$room,$face,$insta,$myimg));
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
            $global=$con->prepare('SELECT * FROM techass ORDER BY id DESC');
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
                      <img src="../../../uploads/teaching/'.$fe['img'].'" class="mr-2" alt="image"></td>
                    <td>'.$fe['name'].'</td>
                    <td>
                      <button type="button" class="btn btn-success update-ass" 
                      style="padding: 10px;margin-right: -7px;" id='.$fe['id'].'>تعديل</button>
                    </td>
                    <td> 
                        <button type="button" class="btn btn-danger delete-ass" 
                        style="padding: 10px;margin-right: -7px;" id='.$fe['id'].'>حذف</button>
                    </td>
                    <td> 
                    <button type="button" class="btn btn-info show-ass" 
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
