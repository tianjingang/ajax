<meta charset="utf-8">
<form action="riin.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>序列</td>
            <td><input type="text" name="order"/></td>
        </tr>
        <tr>
            <td>名称</td>
            <td><input type="text" name="photoname"/></td>
        </tr>
        <tr>
            <td>图片</td>
            <td><input type="file" name="filename"/></td>
        </tr>
        <tr>
            <td>作者</td>
            <td><input type="text" name="author"/></td>
        </tr>
        <tr>
            <td>添加人</td>
            <td><input type="text" name="addman"/></td>
        </tr>
        <tr>
            <td>描述</td>
            <td><input type="text" name="desc"/></td>
        </tr>
        <tr>
            <td>权限</td>
            <td><input type="text" name="boss"/></td>
        </tr>
        <tr>
            <td>特定信息</td>
            <td><input type="text" name="te"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
        </tr>
    </table>
</form>