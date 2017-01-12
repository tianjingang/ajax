<?php
header('content-type:text/html;charset=utf8');
//session_start();
//if(session_destroy()){
    setcookie('u_name','',time()-1);
    header('location:rikao.php');
//}




?>