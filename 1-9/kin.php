<?php
header('content-type:text/html;charset-utf8');
//接值
empty($_POST['pe'])?$pe='':$pe=$_POST['pe'];
empty($_POST['pwd'])?$pwd='':$pwd=$_POST['pwd'];
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("js_week2_exam",$link);
//设置字符集
mysql_query("set names utf8");
//执行
$sql="insert into j_week2(j_pe,j_pwd)VALUES ('$pe','$pwd')";
//echo $sql;die;

if(mysql_query($sql)){
   echo "成功"; header('location:kshow.php');
}
else{
    echo "失败";header('location:kao2.html');
}




?>