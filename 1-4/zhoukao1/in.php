<?php
header('content-type:text/html;charset=utf-8');
//接值
empty($_POST['username'])?$username='':$username=$_POST['username'];
empty($_POST['email'])?$email='':$email=$_POST['email'];
empty($_POST['phone'])?$phone='':$phone=$_POST['phone'];
empty($_POST['sex'])?$sex='':$sex=$_POST['sex'];
//var_dump($_POST);
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf-8");
//执行语句
$sql="insert into zhou1(k_name,k_email,k_phone,k_sex) VALUES ('$username','$email','$phone','$sex')";
$re=mysql_query($sql);
if($re){
    echo "添加成功";
    header('location:show.php');
}
else{
    echo "添加失败";
    header('location:form_z.html');
}






?>