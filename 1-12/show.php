<?php
//session_start();
header('content-type:text/html;charset=utf-8');
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$uuser=$_COOKIE['u_name'];
$sql="select * from session where s_name='$uuser'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
?>
<table border="1">
    <tr>
        <td>序号</td>
        <td>姓名</td>
        <td>密码</td>
    </tr>
    <tr>
        <td><?php echo $arr['id'];?></td>
        <td><?php echo $arr['s_name'];?></td>
        <td><?php echo $arr['s_pwd'];?></td>
    </tr>
</table>
<a href="dels.php">退出登录</a>