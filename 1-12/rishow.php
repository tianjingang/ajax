<?php
header('content-type:text/html;charset=utf8');
//session_start();
/*//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
//设置字符集
mysqli_query($link,'set names utf8');
//执行语句
$unname=$_COOKIE['u_name'];
$sql="select * from yonghu where y_name='$unname'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);*/

//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
//设置字符集
mysqli_query($link,'set names utf8');
$uu_name=$_COOKIE['u_name'];
$sql="select * from yonghu where y_name='$uu_name'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
?>
<?php
if($_COOKIE['u_name']){
    echo "欢迎".$_COOKIE['u_name']."登录";
}
?>
<table border="1">
    <tr>
        <td>编号</td>
        <td>用户名</td>
        <td>密码</td>
    </tr>
    <tr>
        <td><?php echo $arr['id'];?></td>
        <td><?php echo $arr['y_name'];?></td>
        <td><?php echo $arr['y_pwd'];?></td>
    </tr>
</table>
<a href="ridel.php">退出登录</a>