<?php
header('content-type:text/html;charset=utf8');
$uname = $_GET['uname'];
$pwd=$_GET['pwd'];
//连库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
//语句
$sql="select * from ri24 where r_name='$uname'";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
if($ar['r_pwd']==$pwd){
    echo "1";
}
else{
    echo "0";
}





?>