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
        $graduate=filter_var(trim($_POST['graduate']),FILTER_SANITIZE_STRING);
        $student=filter_var(trim($_POST['student']),FILTER_SANITIZE_STRING);
        $worker=filter_var(trim($_POST['worker']),FILTER_SANITIZE_STRING);
        $teaching=filter_var(trim($_POST['teaching']),FILTER_SANITIZE_STRING);
        $data=array();
        if(empty($graduate)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>يجب ادخال عدد الخريجين </strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        elseif(empty($student)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>يجب ادخال عدد الطلاب </strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        elseif(empty($worker)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>يجب ادخال عدد العاملين </strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        elseif(empty($teaching)){
                     $data['error']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>يجب ادخال عدد هيئة التدريس </strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>';
                     $data['respons']='error';
        }
        
        
        else{
    
                        $update=$con->prepare('UPDATE numbers SET graduate=?,student=?,worker=?,teaching=? WHERE id=?');
                        $update->execute(array($graduate,$student,$worker,$teaching,1));
                        $data['content']='<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>تم التعديل بنجاح</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                        $global=$con->prepare('SELECT * FROM numbers WHERE id=1');
                        $global->execute();
                        $fetchglobal=$global->fetch();
                        $data['html']='<div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="https://www.bootstrapdash.com/demo/purple/jquery/template/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">اعداد الخريجين 
                            <i class="fas fa-user-graduate float-right" style="
                                    margin-left: 10px;
                                "></i>
                            </h4>
                            <h2 class="mb-5 graduate-h">'.$fetchglobal['graduate'].'</h2>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="https://www.bootstrapdash.com/demo/purple/jquery/template/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">اعداد الطلاب 
                            <i class="fas fa-user-friends float-right" style="margin-left:10px;"></i>
                        </h4>
                        <h2 class="mb-5">'.$fetchglobal['student'].'</h2>
                    </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="https://www.bootstrapdash.com/demo/purple/jquery/template/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">اعداد العاملين 
                            <i class="fas fa-user float-right" style="margin-left: 10px;"></i>
                        </h4>
                        <h2 class="mb-5">'.$fetchglobal['worker'].'</h2>
                        
                    </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white" style="background: linear-gradient(to right, #FFC074, #84DA97) !important;">
                    <div class="card-body">
                        <img src="https://www.bootstrapdash.com/demo/purple/jquery/template/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">اعداد هيئة التدريس 
                            <i class="fas fa-chalkboard-teacher float-right" style="margin-left:10px;"></i>
                        </h4>
                        <h2 class="mb-5">'.$fetchglobal['teaching'].'</h2>
                        
                    </div>
                    </div>
                </div>';        
    
        }
                      
                echo json_encode($data);
    }
}
