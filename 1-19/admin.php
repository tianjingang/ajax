<?php
header('content-type:text/html;charset=utf-8');
//接值
$addman=isset($_POST['addman'])?$_POST['addman']:'';
$content=isset($_POST['content'])?$_POST['content']:'';
$addtime=isset($_POST['addtime'])?$_POST['addtime']:'';
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$sql="insert into message (addman,content,addtime)VALUES ('$addman','$content','$addtime')";
$re=mysqli_query($link,$sql);
if($re){
    echo "添加成功";
    header('refresh:2;url=look.php');
}
else{
    echo "添加失败";
    header('refresh:2;url=form.php');

}








?>