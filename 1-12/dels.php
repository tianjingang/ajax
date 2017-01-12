<?php
header('content-type:text/html;charset=utf8');
/*session_start();
header('content-type:text/html;charset=utf-8');
if(session_destroy()){
    header('location:form.php');
}*/
setcookie('u_name','',time()-1);
header('location:form.php');


?>