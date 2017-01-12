<?php
//session_start();
header('content-type:text/html;charset=utf-8');
//接值
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$sql="select * from session where s_name='$user'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
if($arr){
    //验证密码
    if($pwd==$arr['s_pwd']){
        //验证七天免费登陆是否点击
        if(isset($_POST['day7'])){
            //$_SESSION['u_name']=$user;
            //$_SESSION['pwd']=$pwd;
            setcookie('u_name',$user,time()+7*24*60*60);
        }
      else {
          //$_SESSION['u_name'] = $user;
          //$_SESSION['pwd'] = $pwd;
          setcookie('u_name', $user);
      }

    echo "欢迎登陆";
    header('location:show.php');
    }
    else{
        echo "密码不正确";
        header('refresh:1;url=form.html');
    }
}
else{
    echo "用户名不正确";
    header('refresh:1;url=form.php');
}




?>;