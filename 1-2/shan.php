<?php
header('content-type:text/html;charset=utf-8');
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf-8");
//编写执行语句
$id=$_GET['str'];
$sql="delete from wangdian where w_id in ($id)";
$re=mysql_query($sql);
if($re){
    echo "删除成功";
    header('location:show.php');
}
else{
    echo "删除失败";
    header('location:show.php');
}






?>