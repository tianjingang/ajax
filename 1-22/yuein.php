<?php
header('content-type:text/html;charset=utf8');
//接值
$x_name=$_POST['x_name'];
$class=$_POST['class'];
$num=$_POST['num'];
$sex=$_POST['sex'];
$hobby=$_POST['hobby'];
$ai=implode(',',$hobby);
$self=$_POST['self'];
//连库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
//语句
$sql="insert into xuexing (x_name,x_class,x_num,x_sex,x_hobby,x_self)VALUES ('$x_name','$class','$num','$sex','$ai','$self')";
$re=mysqli_query($link,$sql);
if($re){
    echo "添加成功";
    header('refresh:1;url=yueshow.php');
}
else{
    echo "添加失败";
    header('refresh:1;url=yuekao1.php');
}





?>