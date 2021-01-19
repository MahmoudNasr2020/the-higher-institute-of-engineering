<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}else{
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        include '../DB/conn.php';
        $id=filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
        $type=filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);
        $message=filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);
        $file=$_FILES['img']['name'];
        $file_tmp=$_FILES['img']['tmp_name'];
        $file_size=$_FILES['img']['size'];
        $extension=array('jpeg','jpg','png');
        $image=explode('.',$file);
        $image=strtolower(end($image));
        $data=array();
        
        if(empty($message)){
            $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>لا يمكن ترك النص فارغ</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
            $data['respnos']='error';
        }
        /*------------------------------------------------------------------------------------------
                                                لو النص مش فاضي
        --------------------------------------------------------------------------------------------*/
        else{
            
            if($type=='update'){
                $select=$con->prepare('SELECT img FROM slider WHERE id=?');
                $select->execute(array($id));
                $fetch=$select->fetch();
                if(empty($file)){
                   $myimg=$fetch['img'];
                    $data['update']='update';
                }
                else{
                   if(!in_array($image,$extension)){
                                    $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>نوع الصورة غير صالح</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>';
                                    $data['respnos']='error';
                    }
                    elseif($file_size>1000000){
                        $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>حجم الصورة كبير جداً</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                        $data['respnos']='error';
            }
            else{
          
                unlink("../../../uploads/slider/".$fetch['img']);       
                $myimg=rand(0,10000000000000).'.'.$image;
                $folder='../../../uploads/slider/'.$myimg;
                move_uploaded_file($file_tmp,$folder);
                $data['update']='update';
            }
                }

            }
             /*------------------------------------------------------------------------------------------
                                                          لو النوع مش ابديت      
            --------------------------------------------------------------------------------------------*/
            else{
                if(empty($file)){
                    $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>يجب رفع صورة</strong> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                    $data['respnos']='error';
                }
                elseif(!in_array($image,$extension)){
                                $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>نوع الصورة غير صالح</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                                $data['respnos']='error';
                }
                elseif($file_size>1000000){
                    $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>حجم الصورة كبير جداً</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['respnos']='error';
        }
        else{
            $myimg=rand(0,10000000000000).'.'.$image;
            $folder='../../../uploads/slider/'.$myimg;
            move_uploaded_file($file_tmp,$folder);
            $data['success']='success';
        }  
           }
            /*------------------------------------------------------------------------------------------
                                                        تخزين البيانات والتاكد        
            -------------------------------------------------------------------------------------------*/


           if(isset($data['update'])){
                    $update=$con->prepare('UPDATE slider SET text=?,img=? WHERE id=?');
                    $update->execute(array($message,$myimg,$id));
                    $data['responsv']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>تم التعديل بنجاح</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['respnos']='success';
        }
        if(isset($data['success'])){
            $insert=$con->prepare('INSERT INTO slider(text,img) VALUES(?,?)');
            $insert->execute(array($message,$myimg));
            $data['responsv']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>تم الاضافة بنجاح</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['respnos']='success';
        }


            /*------------------------------------------------------------------------------------------
                                                       جلب البيانات كلها لعرضها بدون تحميل         
        --------------------------------------------------------------------------------------------*/
        $global=$con->prepare('SELECT * FROM slider');
        $global->execute();
        $fetchglobal=$global->fetchAll();
        $data['html']='<table id="order-listing" class="table">
        <thead>
        <tr>
            <th>الرقم</th>
            <th>تاريخ الاضافة</th>
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
            <td> '.$fe['date'].'</td>
            <td>
                  <img src="../../../uploads/slider/'.$fe['img'].'" 
                  class="mr-2" alt="image"> 
                        </td>
            <td>
                <button type="button" id='.$fe['id'].'
                class="btn btn-success editsilder" >تعديل</button>
            </td>
            <td>
                <button type="button" id='.$fe['id'].'
                class="btn btn-danger deletesilder">حذف</button>
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
    