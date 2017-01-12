<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","js_day20");
mysqli_query($link,'set names utf8');
$id=$_GET['id'];
$sql="select * from ri20 where id='$id'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
?>
<form action="rixiu1.php" method="post">
    <input type="hidden" value="<?php echo $arr['id']?>" name="id"/>
    <table border="1">
        <tr>
            <td>文章标题</td>
            <td><input type="text" value="<?php echo $arr['w_title']?>" name="title"/></td>
        </tr>
        <tr>
            <td>添加时间</td>
            <td><input type="text" value="<?php echo $arr['w_date']?>" name="date"/></td>
        </tr>
        <tr>
            <td>作者</td>
            <td><input type="text" value="<?php echo $arr['w_author']?>" name="author"/></td>
        </tr>
        <tr>
            <td>点击量</td>
            <td><input type="text" value="<?php echo $arr['w_num']?>" name="num"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
        </tr>
    </table>
</form>
