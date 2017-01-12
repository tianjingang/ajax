<?php
header("content-type:text/html;charset=utf8");
$username=$_GET['username'];
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
//执行语句
$sql="select * from book where b_name='$username'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
if($arr['b_name']!=$username){
    echo 1;
}else{
    echo 0;
}