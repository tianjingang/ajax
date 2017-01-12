<?php
header('content-type:text/html;charset=utf8');
if($_COOKIE['u_name']){
    echo "欢迎".$_COOKIE['u_name']."登录";
}
?>
<a href="del.php">退出登录</a>
<form action="in1.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>图书名称</td>
            <td><input type="text" name="bookname"/></td>
        </tr>
        <tr>
            <td>图片</td>
            <td><input type="file" name="filename"/></td>
        </tr>
        <tr>
            <td>时间</td>
            <td><input type="text" name="date"/></td>
        </tr>
        <tr>
            <td>添加人</td>
            <td><input type="text" name="person"/></td>
        </tr>
        <tr>
            <td>描述</td>
            <td><textarea rows="5" cols="10" name="desc"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="展示"/></td>
        </tr>
    </table>
</form>