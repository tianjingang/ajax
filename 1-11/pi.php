<?php
header('content-type:text/html;charset=utf-8');
//接值
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$sql="select * from cook where c_name='$user'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
//如果该用户名存在
if($arr){
    //取出该条记录，并验证密码是否正确
    if($arr['c_pwd']==$pwd){
        if(isset($_POST['day7'])){
            setcookie('us_name',$user,time()+7*24*60*60);
        }
        else{
            setcookie('us_name',$user);
        }
        echo "登陆成功";
        header('refresh:1;url=show.php');
    }
    else{
        echo "密码错误";
        //跳转到登陆页面
        header('refresh:1;url=form.php');
    }
}
else{
    //如果该用户名不存在
    echo "该用户名不存在，请修正用户名或注册后再登陆";
    //跳转到登陆页面
    header('refresh:1;url=form.php');
}
?>