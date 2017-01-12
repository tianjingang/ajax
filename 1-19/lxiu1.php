<?php
header('content-type:text/html;charset=utf8');
//接值
$addman=$_POST['addman'];
$content=$_POST['content'];
$addtime=$_POST['addtime'];
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$id=$_POST['id'];
$sql="update message set addman='$addman',content='$content',addtime='$addtime' where id='$id'";
$re=mysqli_query($link,$sql);
if($re){
    echo "修改成功";
    header('refresh:1;url=look.php');
}
else{
    echo "修改失败";
    header('refresh:1;url=look.php');
}







?>