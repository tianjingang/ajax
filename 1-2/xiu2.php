<?php
header('content-type:text/html;charset=utf-8');
//接值
empty($_POST['name'])?$name='':$name=$_POST['name'];
empty($_POST['pwd'])?$pwd='':$pwd=$_POST['pwd'];
empty($_POST['phone'])?$phone='':$phone=$_POST['phone'];
empty($_POST['production'])?$production='':$production=$_POST['production'];

//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf-8");
//编写执行语句
$id=$_POST['id'];
$sql="update wangdian set w_name='$name',w_password='$pwd',w_phone='$phone',w_production='$production' where w_id='$id'";
$re=mysql_query($sql);
if($re){
    echo "修改成功";
    header('location:show.php');
}
else{
    echo "修改失败";
    header('location:show.php');
}




?>