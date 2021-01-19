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
        $id=filter_var(trim($_POST['id']),FILTER_SANITIZE_NUMBER_INT);
        $select=$con->prepare('SELECT * FROM comtable WHERE id=?');
        $select->execute(array($id));
        $fetch=$select->fetch();
        if($select){
            echo json_encode($fetch);
        }
    }
}
