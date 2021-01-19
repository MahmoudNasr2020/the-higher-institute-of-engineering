<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['email'])){
  header("location:../../index.php");
  exit();
}else{
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        include '../DB/conn.php';
        $id=filter_var(trim($_POST['id-table']), FILTER_SANITIZE_NUMBER_INT);
        $type=filter_var(trim($_POST['type-table']), FILTER_SANITIZE_STRING);
        $text=filter_var(trim($_POST['text-table']), FILTER_SANITIZE_STRING);
        $file=$_FILES['file']['name'];
        $file_tmp=$_FILES['file']['tmp_name'];
        $file_size=$_FILES['file']['size'];
        $extension=array('pdf','word','docs','excel','docx','zip','rar');
        $image=explode('.',$file);
        $image=strtolower(end($image));
        $data=array();
        
        if(empty($text)){
            $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>لا يمكن ترك اسم الجدول فارغ</strong> 
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
                $select=$con->prepare('SELECT img FROM comtable WHERE id=?');
                $select->execute(array($id));
                $fetch=$select->fetch();
                if(empty($file)){
                   $myimg=$fetch['img'];
                    $data['update']='update';
                }
                else{
                   if(!in_array($image,$extension)){
                                    $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>نوع الملف غير صالح</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>';
                                    $data['respnos']='error';
                    }
                    elseif($file_size >10000000){
                        $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>حجم الملف كبير جداً</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                        $data['respnos']='error';
            }
            else{
                unlink("../../../uploads/computer/".$fetch['img']);
                $myimg=rand(0,10000000000000).'.'.$image;
                $folder='../../../uploads/computer/'.$myimg;
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
                                        <strong>يجب رفع الملف</strong> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                    $data['respnos']='error';
                }
                elseif(!in_array($image,$extension)){
                                $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>نوع الملف غير صالح</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                                $data['respnos']='error';
                }
                elseif($file_size>10000000){
                    $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>حجم الملف كبير جداً</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['respnos']='error';
        }
        else{
            $myimg=rand(0,10000000000000).'.'.$image;
            $folder='../../../uploads/computer/'.$myimg;
            move_uploaded_file($file_tmp,$folder);
            $data['success']='success';
        }  
           }
            /*------------------------------------------------------------------------------------------
                                                        تخزين البيانات والتاكد        
            -------------------------------------------------------------------------------------------*/


           if(isset($data['update'])){
                    $update=$con->prepare('UPDATE comtable SET text=?,img=? WHERE id=?');
                    $update->execute(array($text,$myimg,$id));
                    $data['responsv']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>تم التعديل بنجاح</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['respnos']='success';
        }
        if(isset($data['success'])){
            $insert=$con->prepare('INSERT INTO comtable(text,img) VALUES(?,?)');
            $insert->execute(array($text,$myimg));
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
        $global=$con->prepare('SELECT * FROM comtable ORDER BY id DESC');
        $global->execute();
        $fetchglobal=$global->fetchAll();
        $data['html']='<table class="civiltable">
        <thead>
          <tr>
            <th> الاسم </th>
            <th> تعديل </th>
            <th> حذف </th>
            <th>عرض</th>
          </tr>
        </thead>
        <tbody>';
            foreach($fetchglobal as $fetchtabl=>$fetchtab){ 
                $data['html'].='<tr>
              <td>
                    '.$fetchtab['text'].'
              <td>
                <button type="button" class="btn btn-success edittable"
                id='.$fetchtab['id'].'
                data-toggle="modal" data-target="#tables"
                style="padding: 10px;margin-right: -7px;"
                
                >تعديل</button>
              </td>
              <td>
                   <button type="button" id='.$fetchtab['id'].'
                   data-toggle="modal" data-target="#modalConfirmDelete"
                   class="btn btn-danger deletetable"
                   style="padding: 10px;margin-right: -7px;"
                   >حذف</button>
            </td>
              <td> 
              <button type="button" class="btn btn-info showtable" 
              id='.$fetchtab['id'].'
              data-toggle="modal" data-target="#modal-showtable""
              style="padding: 10px;margin-right: -7px;">عرض</button>
              </td>
            </tr>';
         } 
         $data['html'].='</tbody>
      </table>';
           
        }
        echo json_encode($data);   
    } 
    
}
   