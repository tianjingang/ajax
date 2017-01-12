<?php
header('content-type:text/html;charset=utf-8');
//接值
empty($_POST['name'])?$name='':$name=$_POST['name'];
empty($_POST['pwd'])?$pwd='':$pwd=$_POST['pwd'];
empty($_POST['sex'])?$sex='':$sex=$_POST['sex'];
empty($_POST['apartment'])?$apartment='':$apartment=$_POST['apartment'];
empty($_POST['myself'])?$myself='':$myself=$_POST['myself'];

//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf-8");
//编写执行语句
$sql="insert into zhuce(z_name,z_password,z_sex,z_apart,z_my)VALUES ('$name','$pwd','$sex','$apartment','$myself')";
$re=mysql_query($sql);
if($re){
    echo "注册成功";
    header('location:show.php');
}
else{
    echo "注册失败";
    header('location:form.html');
}





?>