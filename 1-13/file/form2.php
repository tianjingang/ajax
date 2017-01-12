<meta charset="utf-8">
<form action="in2.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>相册名称</td>
            <td><input type="text" name="fname"/></td>
        </tr>
        <tr>
            <td>封面</td>
            <td><input type="file" name="filename"/></td>
        </tr>
        <tr>
            <td>描述</td>
            <td><textarea rows="5" cols="10" name="desc"></textarea></td>
        </tr>
        <tr>
            <td>权限</td>
            <td><input type="radio" name="boss" value="1"/>是
                <input type="radio" name="boss" value="0"/>否
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
            <td></td>
        </tr>
    </table>
</form>