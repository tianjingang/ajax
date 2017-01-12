<?php
//session_start();
header('content-type:text/html;charset=utf8');
//接前页面的值
$user=$_POST['user'];
$pwd=$_POST['pwd'];
//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
//设置字符集
mysqli_query($link,'set names utf8');
//执行语句
$sql="select * from yonghu where y_name='$user'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
//验证用户名
if($arr){
    //验证密码
    if($arr['y_pwd']==$pwd){
        //验证是否点击保存
        if($_POST['box']==1){
           // $_SESSION['u_name']=$user;
          //  $_SESSION['pwd']=$pwd;
            setcookie('u_name', $user,time()+7*24*60*60);
            header('refresh:2;url=rishow.php');
        }
        if($_POST['box']==2){
           // $_SESSION['u_name']=$user;
           //$_SESSION['pwd']=$pwd;
            setcookie('u_name', $user);
            header('refresh:2;url=rishow.php');
        }
        echo "欢迎登录";
        header('refresh:2;url=rishow.php');
    }
    else{
        echo "密码不正确";
        header('refresh:2;url=rikao.php');
    }

}
else{
    echo "用户不存在";
    header('refresh:2;url=rikao.php');
}
?>