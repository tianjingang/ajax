<?php
header('content-type:text/html;charset=utf-8');
//接值
empty($_POST['username'])?$username='':$username=$_POST['username'];
empty($_POST['pwd'])?$pwd='':$pwd=$_POST['pwd'];
empty($_POST['tel'])?$tel='':$tel=$_POST['tel'];
empty($_POST['email'])?$email='':$email=$_POST['email'];
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die ("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf8");
//执行语句
$sql="insert into xuezhu(x_name,x_pwd,x_tel,x_email)VALUES ('$username','$pwd','$tel','$email')";
$re=mysql_query($sql);
if($re){
    echo "添加成功";
}
else{
    echo "添加失败";
}



?>