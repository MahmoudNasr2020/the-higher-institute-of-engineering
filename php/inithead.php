<?php 
    if(isset($temp)){
        $css='layout/css/';
        $js='layout/js/';
        $temp='include/';
        $index='index.php';
        $about_institues='php/about-institute.php';
        $civil='php/civil.php';
        $mechatronics='php/mechatronics.php';
        $computer='php/computer.php';
        $industrie='php/industrie.php';
        $teach='php/teaching.php';
        $global='php/global.php';
        $result='php/result.php';
        $student='php/student.php';
        $Progress='php/Progress.php';
        $student='php/student.php';
        $question='php/question.php';
        $contact='php/contact.php';
        $file='uploads/files/lahat/';
        $logo='layout/pattern/';
        include $temp ."header.php";
        
    }else{
        $css='../layout/css/';
        $js='../layout/js/';
        $temp='../include/';
        $index='../index.php';
        $about_institues='about-institute.php';
        $civil='civil.php';
        $mechatronics='mechatronics.php';
        $computer='computer.php';
        $industrie='industrie.php';
        $teach='teaching.php';
        $global='global.php';
        $result='result.php';
        $student='student.php';
        $Progress='Progress.php';
        $question='question.php';
        $contact='contact.php';
        $file='../uploads/files/lahat/';
        $logo='../layout/pattern/';
        include $temp .'header.php';
    }
   