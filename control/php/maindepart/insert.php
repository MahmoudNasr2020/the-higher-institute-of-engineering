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
        $text=filter_var(trim($_POST['text']),FILTER_SANITIZE_STRING);
        $file=$_FILES['img']['name'];
        $file_tmp=$_FILES['img']['tmp_name'];
        $file_size=$_FILES['img']['size'];
        $extension=array('jpeg','jpg','png');
        $image=explode('.',$file);
        $image=strtolower(end($image));
        $data=array();
        if(empty($name)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>يجب ادخال اسم القسم</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        elseif(empty($text)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>لا يمكن ترك وصف القسم فارغ</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        
        
        else{
    
                if($type=='update'){
                    $select=$con->prepare('SELECT img FROM depmain WHERE id=?');
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
                            unlink("../../../uploads/depmain/".$fetch['img']);  
                            $myimg=rand(0,10000000000000).'.'.$image;
                            $folder='../../../uploads/depmain/'.$myimg;
                            move_uploaded_file($file_tmp,$folder);
                            $data['respons']='success';
                            $task='update';
    
                        }
                    }
                }
                else{
                    if(empty($file)){
                        $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>يجب رفع الصورة</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                            $data['respons']='error';
                    }
                    elseif(!in_array($image,$extension)){
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
                            $folder='../../../uploads/depmain/'.$myimg;
                            move_uploaded_file($file_tmp,$folder);
                            $data['respons']='success';
                            $task='insert';
                    }
                }
    
        }
                if($data['respons']=='success'){
                    if($task=='update'){
                        $update=$con->prepare('UPDATE depmain SET name=?,text=?,img=? WHERE id=?');
                        $update->execute(array($name,$text,$myimg,$id));
                        $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>تم التعديل بنجاح</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    }
                    else{
                        $insert=$con->prepare('INSERT INTO depmain(name,text,img) VALUES(?,?,?)');
                        $insert->execute(array($name,$text,$myimg));
                        $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>تم الاضافة بنجاح</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                    }
                    
                }
                $selectglobl=$con->prepare('SELECT * FROM depmain ORDER BY id DESC');
                    $selectglobl->execute(array($id));
                    $fetchglobal=$selectglobl->fetchAll();
                    $data['html']='<table class="table">
                            <thead>
                              <tr>
                                <th> الصورة </th>
                                <th> اسم القسم </th>
                                <th> تعديل </th>
                                <th> حذف </th>
                                <th>عرض</th>
                              </tr>
                            </thead>
                            <tbody>';
                              
                                foreach($fetchglobal as $fe=>$fetching){ 
                                    $data['html'].='<tr>
                                <td>
                                  <img src="../../../uploads/depmain/'.$fetching['img'].'" 
                                  class="mr-2" alt="image"></td>
                                <td>'.$fetching['name'].'</td>
                                <td>
                                  <button type="button" class="btn btn-success update-element" 
                                  style="padding: 10px;margin-right: -7px;" 
                                  id='.$fetching['id'].'>تعديل</button>
                                </td>
                                <td> 
                                    <button type="button" class="btn btn-danger delete-element" 
                                    style="padding: 10px;margin-right: -7px;" 
                                    id='.$fetching['id'].'>حذف</button>
                                </td>
                                <td> 
                                <button type="button" class="btn btn-info show-element" 
                                style="padding: 10px;margin-right: -7px;" 
                                id='.$fetching['id'].'>عرض</button>
                                </td>
                              </tr>';
                                 }                         
                             
    
    
                    $data['html'].= '</tbody>
                          </table>';
                echo json_encode($data);
    }
}
