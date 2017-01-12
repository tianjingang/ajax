<meta charset="utf-8">
<?php
if(isset($_COOKIE['us_name'])){
header("location:show.php");
}
?>

<form action="pi.php" method="post" onsubmit="return checkall()">
    <table>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="user" onblur="checkuser()"/><span name="sp1"></span></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="pwd" onblur="checkpwd()"/><span name="sp2"></span></td>
        </tr>
        <tr>
            <td>邮箱</td>
            <td><input type="text" name="email" onblur="checkemail()"/><span name="sp3"></span></td>
        </tr>
        <tr>
            <td>电话</td>
            <td><input type="text" name="tel" onblur="checktel()"/><span name="sp4"></span></td>
        </tr>
        <tr>
            <td><input type="checkbox" name="day7"/>七天免登录</td>
        </tr>
        <tr>
            <td><input type="submit" value="登录"/></td>
        </tr>

    </table>

</form>
<script>
    function $(name){
        return document.getElementsByName(name)[0];
    }
    //验证姓名
    function checkuser(){
        var user=$('user').value;
        if(user==''){
            $('sp1').innerHTML="不能为空";
            $('sp1').style.color="red";
            return false;
        }
        else{
            var tag=/^[\u4e00-\u9fa5]{2,4}$/;
            if(!tag.test(user)){
                $('sp1').innerHTML="用户名2-4位中文";
                $('sp1').style.color="red";
                return false;
            }
            else{
                $('sp1').innerHTML="ok";
                $('sp1').style.color="red";
                return true;
            }
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
            var pwd=$('pwd').value;
            var tag=/^\d{6,}$/;
            if(!tag.test(pwd)){
                $('sp2').innerHTML="密码6位以上数字";
                $('sp2').style.color="red";
                return false;
            }
            else{
                $('sp2').innerHTML="ok";
                $('sp2').style.color="red";
                return true;
            }
        }
    }
    //验证邮箱
    function checkemail(){
        var email=$('email').value;
        if(email==''){
            $('sp3').innerHTML="不能为空";
            $('sp3').style.color="red";
            return false;
        }
        else{
            var email=$('email').value;
            var tag=/^\w+@\w+\.(com|net|css)$/;
            if(!tag.test(email)){
                $('sp3').innerHTML="邮箱格式不正确";
                $('sp3').style.color="red";
                return false;
            }
            else{
                $('sp3').innerHTML="ok";
                $('sp3').style.color="red";
                return true;
            }
        }
    }
    //验证电话
    function checktel(){
        var tel=$('tel').value;
        if(tel==''){
            $('sp4').innerHTML="不能为空";
            $('sp4').style.color="red";
            return false;
        }
        else{
            var tel=$('tel').value;
            var tag=/^\d{3}-\d{8}$/;
            if(!tag.test(tel)){
                $('sp4').innerHTML="电话格式不正确";
                $('sp4').style.color="red";
                return false;
            }
            else{
                $('sp4').innerHTML="ok";
                $('sp4').style.color="red";
                return true;
            }
        }
    }
    //验证所有项
    function checkall(){
        if(checkuser($('user'))&checkpwd($('pwd'))&checkemail($('email'))&checktel($('tel'))){
          return true;
        }
        else{
            return false;
        }
    }
</script>