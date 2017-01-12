<?php
header('content-type:text/html;charset=utf8');
//接值
empty($_POST['ming'])?$ming='':$ming=$_POST['ming'];
empty($_POST['num'])?$num='':$num=$_POST['num'];
empty($_POST['type'])?$type='':$type=$_POST['type'];
empty($_POST['my'])?$my='':$my=$_POST['my'];
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf8");
//执行语句
$sql="insert into tushu(t_name,t_sum,t_type,t_my)VALUES ('$ming','$num','$type','$my')";
$re=mysql_query($sql);
if($re){
    header('location:show.php');
}
else{
    header('location:form.html');
}

?>