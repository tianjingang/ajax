<?php
header('content-type:text/html;charset=utf8');
//连库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$id=$_GET['id'];
$sql="select * from huiyuan where id='$id'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
?>
<form action="huixiu1.php" method="post">
    <input type="hidden" value="<?php echo $arr['id']?>" name="id"/>
    <table>
        <tr>
            <td>会员名称</td>
            <td><input type="text" value="<?php echo $arr['h_name']?>" name="h_name"/></td>
        </tr>
        <tr>
            <td>会员密码</td>
            <td><input type="password" value="<?php echo $arr['h_pwd']?>" name="h_pwd"/></td>
        </tr>
        <tr>
            <td>性别</td>
            <td><input type="radio" value="<?php echo $arr['h_sex']?>" name="sex"/>男
                <input type="radio" value="<?php echo $arr['h_sex']?>" name="sex"/>女
            </td>
        </tr>
        <tr>
            <td>年龄</td>
            <td><input type="text" value="<?php echo $arr['h_age']?>" name="h_age"/></td>
        </tr>
        <tr>
            <td>所在城市</td>
            <td>
                <select name="type">
                    <option value="北京" selected="selected">北京</option>
                    <option value="南京" selected="selected">南京</option>
                    <option value="上海" selected="selected">上海</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>会员爱好</td>
            <td>
                <input type="checkbox" value="<?php echo $arr['h_hobby']?>" name="h_hobby[]"/>吃饭
                <input type="checkbox" value="<?php echo $arr['h_hobby']?>" name="h_hobby[]"/>睡觉
                <input type="checkbox" value="<?php echo $arr['h_hobby']?>" name="h_hobby[]"/>上网
                <input type="checkbox" value="<?php echo $arr['h_hobby']?>" name="h_hobby[]"/>打豆豆
            </td>
        </tr>
        <tr>
            <td>会员电话</td>
            <td><input type="text" value="<?php echo $arr['h_tel']?>" name="h_tel"/></td>
        </tr>
        <tr>
            <td>自我介绍</td>
            <td><textarea rows="5" cols="10" name="h_self"><?php $arr['h_self']?></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
        </tr>
    </table>
</form>