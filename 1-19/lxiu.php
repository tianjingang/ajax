<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$id=$_GET['id'];
$sql="select * from message where id='$id'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
?>
<form action="lxiu1.php" method="post">
    <input type="hidden" value="<?php echo $arr['id']?>" name="id"/>
    <table border="1">
        <tr>
            <td>添加人</td>
            <td><input type="text" value="<?php echo $arr['addman']?>" name="addman"/></td>
        </tr>
        <tr>
            <td>内容</td>
            <td><input type="text" value="<?php echo $arr['content']?>" name="content"/></td>
        </tr>
        <tr>
            <td>添加时间</td>
            <td><input type="text" value="<?php echo $arr['addtime']?>" name="addtime"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="修改"/></td>
            <td></td>
        </tr>
    </table>
</form>