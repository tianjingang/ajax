<?php
header('content-type:text/html;charset=utf8');
session_start();
if(session_destroy()){
    header('location:form1.php');
}
?>