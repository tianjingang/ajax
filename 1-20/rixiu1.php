<?php
header('content-type:text/html;charset=utf8');
//接值
$id=$_POST['id'];
$title=$_POST['title'];
$date=$_POST['date'];
$author=$_POST['author'];
$num=$_POST['num'];
$link=mysqli_connect("127.0.0.1","root","root","js_day20");
mysqli_query($link,'set names utf8');
$sql="update ri20 set w_title='$title' ,w_date='$date',w_author='$author',w_num='$num'where id='$id'";
$re=mysqli_query($link,$sql);
if($re){
    echo "编辑成功";
    header('refresh:1;url=rikao.php');
}
else{
    echo "编辑失败";
    header('refresh:1;url=rikao.php');
}







?>