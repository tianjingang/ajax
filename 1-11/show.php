<?php
header('content-type:text/html;charset=utf-8');
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf8");
//执行语句
$u_name=$_COOKIE['us_name'];
$sql="select * from cook where c_name='$u_name'";
$re=mysql_query($sql);
$arr=mysql_fetch_assoc($re);
?>
<?php
if($_COOKIE['us_name']){
    echo "欢迎".$_COOKIE['us_name']."登录";
}
?>

<table border="1">
    <tr>
        <td>编号</td>
        <td>姓名</td>
        <td>密码</td>
        <td>邮箱</td>
        <td>电话</td>
    </tr>

<tr>
        <td><?php echo $arr['id'];?></td>
        <td><?php echo $arr['c_name'];?></td>
        <td><?php echo $arr['c_pwd'];?></td>
        <td><?php echo $arr['c_email'];?></td>
        <td><?php echo $arr['c_tel'];?></td>
</tr>

</table>
<a href="del.php">退出登录</a>