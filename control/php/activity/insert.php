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
    $text=filter_var(trim($_POST['text']),FILTER_SANITIZE_STRING);
    $file=$_FILES['img']['name'];
    $file_tmp=$_FILES['img']['tmp_name'];
    $file_size=$_FILES['img']['size'];
    $extension=array('jpeg','jpg','png');
    $image=explode('.',$file);
    $image=strtolower(end($image));
    $date=date('Y:m:d');
    $dateyear=date('Y');
    $datemonth=date('F');
    $dateday=date('d');
    $data=array();
    if(empty($text)){
                 $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>لا يمكن ترك النص فارغ</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>';
                 $data['respons']='error';
    }
    
    
    else{

            if($type=='update'){
                $select=$con->prepare('SELECT img FROM activity WHERE id=?');
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
                        $img_file_data='student1.png';
                            if($img_file_data != $fetch['img']){
                                unlink("../../../uploads/files/student/".$fetch['img']);
                            }
                        $myimg=rand(0,10000000000000).'.'.$image;
                        $folder='../../../uploads/files/student/'.$myimg;
                        move_uploaded_file($file_tmp,$folder);
                        $data['respons']='success';
                        $task='update';

                    }
                }
            }
            else{
                if(empty($file)){
                    $myimg='student1.png';
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
                        $folder='../../../uploads/files/student/'.$myimg;
                        move_uploaded_file($file_tmp,$folder);
                        $data['respons']='success';
                        $task='insert';
                }
            }
                
                    
                
               
            }

    }
            if($data['respons']=='success'){
                if($task=='update'){
                    $update=$con->prepare('UPDATE activity SET text=?,img=?,date=?,dateyear=?,datemonth=?,dateday=? WHERE id=?');
                    $update->execute(array($text,$myimg,$date,$dateyear,$datemonth,$dateday,$id));
                    $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>تم التعديل بنجاح</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
                else{
                    $insert=$con->prepare('INSERT INTO activity(text,img,date,dateyear,datemonth,dateday) VALUES(?,?,?,?,?,?)');
                    $insert->execute(array($text,$myimg,$date,$dateyear,$datemonth,$dateday));
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
        $global=$con->prepare('SELECT * FROM activity ORDER BY id DESC');
        $global->execute();
        $fetchglobal=$global->fetchAll();
        $data['html']='<table id="order-listing" class="table">
        <thead>
        <tr>
            <th>تاريخ الاضافة</th>
            <th>الفرقة</th>
            <th>تعديل</th>
            <th>حذف</th>
            <th>عرض</th>
            
        
        </tr>
        </thead>
        <tbody>';
            foreach($fetchglobal as $fet=>$fe){ 
                $data['html'].='
            
        <tr role="row">
           
            <td> '.$fe['timeday'].'</td>
            <td>
            <img src="../../../uploads/files/student/'.$fe['img'].'" 
            class="mr-2" alt="image">
            </td>
            <td>
                <button type="button" id='.$fe['id'].'
                class="btn btn-success editres" >تعديل</button>
            </td>
            <td>
                <button type="button" id='.$fe['id'].'
                class="btn btn-danger deleteres">حذف</button>
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
