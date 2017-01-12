<?php
header('content-type:text/html;charset=utf8');
//接值
$user=$_POST['user'];
$pwd=$_POST['pwd'];
//连库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$sql="select * from zonghe where z_name='$user'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
if($arr){
    //验证密码是否正确
    if($pwd==$arr['z_pwd']){
        //验证是否点击7天免登录
        if(isset($_POST['day7'])){
            setcookie('u_name',$user,time()+7*24*60*60);
            header('refresh:2;url=show.php');
        }
        else{
            setcookie('u_name',$user);
            header('refresh:2;url=show.php');
        }
    }
    else{
        echo "密码不正确";
        header('refresh:2;url=form.php');
    }

}
else{
    echo "用户名不存在";
    header('refresh:2;url=form.php');
}









?>