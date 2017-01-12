<meta charset="utf-8">
<?php
//session_start();
//if(isset($_SESSION['u_name'])){
    if(isset($_COOKIE['u_name'])){
        header("location:rishow.php");
    }
//}
?>
<form action="riin.php" method="post" onsubmit="return checkall()">
    <table>
        <tr>
            <td>用户名:</td>
            <td><input type="text" name="user" onblur="checkuser()"/><span name="sp1"></span></td>
        </tr>
        <tr>
            <td>密码:</td>
            <td><input type="password" name="pwd" onblur="checkpwd()"/><span name="sp2"></span></td>
        </tr>
        <tr>
            <td>Cookie:</td>
            <td><select name="box">
                    <option value="2">不保存</option>
                    <option value="1">保存</option>
                </select></td>
        </tr>
        <tr>
            <td><input type="submit" value="登录"/></td>
        </tr>
    </table>
</form>
<script>
    //自定义
    function $(name){
        return document.getElementsByName('name')[0];
    }
    //验证用户名
    function checkuser(){
        var user=$('user').value;
        if(user==''){
            $('sp1').innerHTML="不能为空";
            $('sp1').style.color="red";
            return false;
        }
        else{
            $('sp1').innerHTML="ok";
            $('sp1').style.color="red";
            return true;
        }
    }
    //验证密码
    function checkpwd(){
        var pwd=$('pwd').value;
        if(pwd==''){
            $('sp2').innerHTML="不能为空";
            $('sp2').style.color="red";
            return false;
        }
        else{
            $('sp2').innerHTML="ok";
            $('sp2').style.color="red";
            return true;
        }
    }
    //验证所有
    function checkall(){
        if(checkuser($('user'))&checkpwd($('pwd'))){
            return true;
        }
        else{
            return false;
        }
    }
</script>