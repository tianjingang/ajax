<?php
header('content-type:text/html;charset=utf-8');
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("js_week2_exam",$link);
//设置字符集
mysql_query("set names utf8");
//执行
$sql="select * from j_week2";
$re=mysql_query($sql);
?>
<table border="1">
    <tr>
        <td>序号</td>
        <td>手机/邮箱</td>
        <td>密码</td>
    </tr>
    <?php
     while($arr=mysql_fetch_assoc($re)){
         echo "<tr>";
         echo "<td>".$arr['id']."</td>";
         echo "<td>".$arr['j_pe']."</td>";
         echo "<td>".$arr['j_pwd']."</td>";
         echo "</tr>";
     }
    ?>
</table>

