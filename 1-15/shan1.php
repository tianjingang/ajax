<?php
header('content-type:text/html;charset=utf8');
//连接库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
//语句
$id=$_GET['str'];
$sql="delete from zongxi where id in ($id)";
$re=mysqli_query($link,$sql);
if($re){
    echo "ok";
    header('refresh:2;url=show1.php');
}
else{
    echo "no";
    header('refresh:2;url=show1.php');
}
?>