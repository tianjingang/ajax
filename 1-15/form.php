<meta charset="utf-8">
<?php
if(isset($_COOKIE['u_name'])){
    header('location:show.php');
}
?>
<form action="in.php" method="post">
    <table>
        <tr>
            <td>用户名</td>
            <td><input type="text" name="user"/></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="pwd"/></td>
        </tr>
        <tr>
            <td><input type="checkbox" name="day7"/>七天免登录</td>
        </tr>
        <tr>
            <td><input type="submit" value="登录"/></td>
        </tr>
    </table>
</form>
