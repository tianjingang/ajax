<?php
header('content-type:text/html;charset=utf8');
$username=$_GET['username'];
//连库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
//语句
$sql="select * from ri24 where r_name='$username'";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
if($ar['r_name']==$username){
    echo "1";
}
else{
    echo "0";
}





?>