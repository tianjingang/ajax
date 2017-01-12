<meta charset="utf-8">
<form action="riin.php" method="post">
    <table>
        <tr>
            <td>登录名</td>
            <td><input type="text" name="username"/></td>
        </tr>
        <tr>
            <td>类型</td>
            <td><select name="type">
                    <option value="0">系统开始关闭</option>
                    <option value="1">系统开始启动</option>
                    <option value="2">用户打开菜单</option>
                </select></td>
        </tr>
        <tr>
            <td>IP地址</td>
            <td><input type="text" name="path"/></td>
        </tr>
        <tr>
            <td>日志描述</td>
            <td><select name="desc">
                    <option value="0">通知公告</option>
                    <option value="1">权限管理</option>
                    <option value="2">代码管理</option>
                </select></td></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
        </tr>
    </table>
</form>