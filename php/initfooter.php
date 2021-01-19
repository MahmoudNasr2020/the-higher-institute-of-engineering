<?php 
    
    if(isset($footer)){
        $js='layout/js/';
        $include='include/';
        include $include .'footer.php';
        
    }else{
        $js='../layout/js/';
        $include='../include/';
        include $include .'footer.php';
    }
    