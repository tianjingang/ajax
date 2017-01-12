<meta charset="utf-8">
<form action="admin.php" method="post">
    <table>
        <tr>
            <td>添加人</td>
            <td><select name="addman">
                    <option value="程伟">程伟</option>
                    <option value="刘鹏飞">刘鹏飞</option>
                    <option value="田金刚">田金刚</option>
                    <option value="刘宁">刘宁</option>
                </select></td>
        </tr>
        <tr>
            <td>留言内容</td>
            <td><textarea name="content" cols="10" rows="5"></textarea></td>
        </tr>
        <tr>
            <td>添加时间</td>
            <td><input type="date" name="addtime"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="添加"/></td>
        </tr>
    </table>
</form>