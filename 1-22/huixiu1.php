<?php
header('content-type:text/html;charset=utf8');
$h_name=$_POST['h_name'];
$h_pwd=$_POST['h_pwd'];
$h_sex=$_POST['sex'];
//var_dump($h_sex);die;
$h_age=$_POST['h_age'];
$h_city=$_POST['type'];
$h_hobby=$_POST['h_hobby[]'];
//var_dump($h_hobby);die;
$ai=implode(',',$h_hobby);
$h_tel=$_POST['h_tel'];
$h_self=$_POST['h_self'];
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$id=$_POST['id'];
$sql="update huiyuan set h_name='$h_name',h_pwd='$h_pwd',h_sex='$h_sex',h_age='$h_age',h_city='$h_city',h_hobby='$ai',h_tel='$h_tel',h_self='$h_self' where id='$id'";
$re=mysqli_query($link,$sql);
if($re){
    echo "修改成功";
    header('refresh:2;url=huiyuan.php');
}
else{
    echo "修改失败";
    header('refresh:2;url=huiyuan.php');
}






?>