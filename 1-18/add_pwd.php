<?php
header('content-type:text/html;charset=utf-8');

//接值
$username=isset($_GET['username'])?$_GET['username']:'';
$pwd=isset($_GET['pwd'])?$_GET['pwd']:'';
//链接数据库
mysql_connect('127.0.0.1','root','root');
mysql_select_db('jsyuekao');
mysql_query('set names utf8');

//写sql 运行 判断
$sql="select * from user where name='$username'";
//echo $sql;
$re=mysql_query($sql);
$arr=mysql_fetch_assoc($re);

//判断
if($arr['pwd']==$pwd){
    echo 1;
}else{
    echo -1;
}
?>