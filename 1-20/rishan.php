<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","js_day20");
mysqli_query($link,'set names utf8');
$id=$_GET['str'];
$sql="delete from ri20 where id in ($id)";
$re=mysqli_query($link,$sql);
if($re){
    echo "删除成功";
    header('refresh:2;url=rikao.php');
}
else{
    echo "删除失败";
    header('refresh:2;url=rikao.php');
}


?>