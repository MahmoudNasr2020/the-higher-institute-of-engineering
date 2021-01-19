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
    $question=filter_var(trim($_POST['question']), FILTER_SANITIZE_STRING);
    $solution=filter_var(trim($_POST['sol']), FILTER_SANITIZE_STRING);
    $data=array();
    $date=date('Y:m:d');
    
    if(empty($question)){
        $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>لا يمكن ترك السؤال  فارغ</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        $data['respnos']='error';
    }
    elseif(empty($solution)){
        $data['content']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>لا يمكن ترك الاجابة فارغة </strong> 
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
            $update=$con->prepare('UPDATE progress SET question=?,solution=?,date=? WHERE id=?');
                $update->execute(array($question,$solution,$date,$id));
                $data['responsv']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>تم التعديل بنجاح</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                $data['respnos']='success';

        }
         /*------------------------------------------------------------------------------------------
                                                      لو النوع مش ابديت      
        --------------------------------------------------------------------------------------------*/
        else{
            $insert=$con->prepare('INSERT INTO progress(question,solution,date) VALUES(?,?,?)');
            $insert->execute(array($question,$solution,$date));
            $data['responsv']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>تم الاضافة بنجاح</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    $data['respnos']='success';    
       }
        /*------------------------------------------------------------------------------------------
                                                    تخزين البيانات والتاكد        
        -------------------------------------------------------------------------------------------*/



        /*------------------------------------------------------------------------------------------
                                                   جلب البيانات كلها لعرضها بدون تحميل         
    --------------------------------------------------------------------------------------------*/
    $global=$con->prepare('SELECT * FROM progress ORDER BY id DESC');
    $global->execute();
    $fetchglobal=$global->fetchAll();
    $data['html']='<table class="civiltable">
    <thead>
      <tr>
        <th> الرقم </th>
        <th> تاريخ الاضافة </th>
        <th> تعديل </th>
        <th> حذف </th>
        <th>عرض</th>
      </tr>
    </thead>
    <tbody>';
        foreach($fetchglobal as $fetchtabl=>$fetchtab){ 
            $data['html'].='<tr>
                  <td>
                  '.$fetchtab['id'].'</td>
                  <td>
                  '.$fetchtab['date'].'</td>
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
                       style="padding: 10px;margin-right: -7px;"
                       class="btn btn-danger deletetable">حذف</button>
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
   