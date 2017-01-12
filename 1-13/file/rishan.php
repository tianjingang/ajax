<?php
header('content-type:text/html;charset=utf8');
//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
//设置字符集
mysqli_query($link,'set names utf8');
//执行语句
$id=$_GET['str'];
$sql="delete from qq where id in ($id)";
$re=mysqli_query($link,$sql);
if($re){
    echo "删除成功";
    header('refresh:2;url=rishow.php');
}
else{
    echo "删除失败";
    header('refresh:2;url=rishow.php');
}







?>