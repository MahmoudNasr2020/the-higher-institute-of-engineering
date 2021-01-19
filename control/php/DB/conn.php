<?php
    $host='mysql:host=localhost;dbname=institute';
    $root='root';
    $pass='';
    try{
        $con=new PDO($host,$root,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e){
        echo 'waring'.$e->getMessage();
    }