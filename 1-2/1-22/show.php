<?php
header('content-type:text/html;charset=utf-8');
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf-8");
//编写执行语句
$sql_str="select * from zhuce";
$result=mysql_query($sql_str);
?>
<table border="1">
    <tr>
        <td>编号</td>
        <td>用户名</td>
        <td>密码</td>
        <td>性别</td>
        <td>部门</td>
        <td>简介</td>
        <td>操作</td>
    </tr>
    <?php
    while($arr=mysql_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$arr['z_id']."</td>";
        echo "<td>".$arr['z_name']."</td>";
        echo "<td>".$arr['z_password']."</td>";
        echo "<td>".$arr['z_sex']."</td>";
        echo "<td>".$arr['z_apart']."</td>";
        echo "<td>".$arr['z_my']."</td>";
        echo "<td><a href='shan.php?id=".$arr['z_id']."'>删除</a>||<a href='xiu1.php?id=".$arr['z_id']."'>修改</a></td>";
        echo "</tr>";
    }




    ?>
</table>