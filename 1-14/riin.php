<?php
header('content-type:text/html;charset=utf8');
//接值
$user=$_POST['username'];
$type=$_POST['type'];
$path=$_POST['path'];
$desc=$_POST['desc'];
$date=date('Y-m-d H:i:s',time());
//连接库
$link=mysqli_connect("127.0.0.1","root","root","school");
//字符集
mysqli_query($link,'set names utf8');
//执行语句
$sql="insert into xitong(x_name,x_type,x_IP,x_desc,x_time)VALUES ('$user','$type','$path','$desc','$date')";
$re=mysqli_query($link,$sql);
if($re){
    header('location:rishow1.php');
}
else{
    header('location:rikao.php');
}
?>