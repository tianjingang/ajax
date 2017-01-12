<?php
header('content-type:text/html;charset=utf8');
//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
//设置字符集
mysqli_query($link,'set names utf8');
//设置执行语句
$sql="select * from feng";
//echo $sql;die;
$re=mysqli_query($link,$sql);
?>
<table border="1">
    <tr>
        <td>编号</td>
        <td>名称</td>
        <td>封面</td>
        <td>描述</td>
        <td>权限</td>
        <td>操作</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($re)){?>
    <tr>
        <td><?php echo $arr['id']?></td>
        <td><?php echo $arr['f_name']?></td>
        <?php if($arr['f_boss']==1){?>
            <td><img src="<?php echo $arr['f_face']?>" alt="" height="100" width="100"/></td>
            <?php }else{
            ?>
            <td><font color="red">主人设置不显示</font></td>
        <?php }?>
        <td><?php echo $arr['f_desc']?></td>
        <td><?php
            if($arr['f_boss']==1){
                echo "是";
            }
            else{
                echo "否";
            }
            ?></td>
        <td><a href="upload2.php?upload2=<?php echo $arr['f_face']?>">下载</a></td>
    </tr>
    <?php }?>
</table>