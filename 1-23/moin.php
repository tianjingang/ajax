<?php
header('content-type:text/html;charset=utf8');
//接值
$m_name=$_POST['m_name'];
$m_class=$_POST['m_class'];
$m_num=$_POST['m_num'];
$sex=$_POST['sex'];
$hobby=$_POST['hobby'];
$ai=implode(',',$hobby);
$myself=$_POST['myself'];
//var_dump($_POST);die;
//入库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
//语句
$sql="insert into ri23 (m_name,m_class,m_num,m_sex,m_hobby,m_myself)VALUES('$m_name','$m_class','$m_num','$sex','$ai','$myself')";
$re=mysqli_query($link,$sql);
if($re){
    echo "添加成功";
    header('refresh:1;url=moshow.php');
}
else{
    echo "添加失败";
    header('refresh:1;url=mo.php');
}


?>