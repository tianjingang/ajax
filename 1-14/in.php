<?php
header('content-type:text/html;charset=utf8');
//接值
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$email=$_POST['email'];
$qq=$_POST['qq'];
$num=$_POST['num'];
$my=$_POST['my'];
//var_dump($_POST);die;
//连接库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
//入库
$sql="insert into xinxi (l_name,l_pwd,l_email,l_qq,l_num,l_my) VALUES ('$username','$pwd','$email','$qq','$num','$my')";
//echo $sql; die;
$re=mysqli_query($link,$sql);
if($re){
    header('location:show.php');
}
else{
    header('location:form.html');
}





?>