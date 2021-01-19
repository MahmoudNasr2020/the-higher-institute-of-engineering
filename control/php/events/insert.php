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
        $text=filter_var(trim($_POST['event']),FILTER_SANITIZE_STRING);
        $date=date('Y:m:d');
        $data=array();
        if(empty($text)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>لا يمكن ترك نص الحدث فارغ</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        
        
        else{
    
                if($type=='update'){
                        $update=$con->prepare('UPDATE event SET text=?,date=? WHERE id=?');
                        $update->execute(array($text,$date,$id));
                        $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>تم التعديل بنجاح</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                        $data['respons']='success';
                }
                
                    else{
                        $insert=$con->prepare('INSERT INTO event(text,date) VALUES(?,?)');
                        $insert->execute(array($text,$date));
                        $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>تم الاضافة بنجاح</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                                $data['respons']='success';
                        
                   
                }
    
        
                       /*------------------------------------------------------------------------------------------
                                                           جلب البيانات كلها لعرضها بدون تحميل         
                      ---------------------------------------------------------------------------------*/
            $global=$con->prepare('SELECT * FROM event ORDER BY id DESC');
            $global->execute();
            $fetchglobal=$global->fetchAll();
            
            $data['html']='<table id="order-listing" class="table">
            <thead>
            <tr>
                <th>الرقم</th>
                <th>تاريخ الاضافة</th>
                <th>تعديل</th>
                <th>حذف</th>
                <th>عرض</th>
                
            
            </tr>
            </thead>
            <tbody>';
    foreach ($fetchglobal as $ftech=>$fe) {
       
    $data['html'].='
                
            <tr role="row">
                <td>'.$fe['id'].'</td>
                <td> '.$fe['date'].'</td>
                <td>
                    <button type="button" id='.$fe['id'].'
                    class="btn btn-success editevents">تعديل</button>
                </td>
                <td>
                    <button type="button" id='.$fe['id'].'
                    class="btn btn-danger deleteevents">حذف</button>
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
