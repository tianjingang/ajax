<meta charset="utf-8">
<?php
   /* session_start();
    if(isset($_SESSION['u_name'])){*/
        if(isset($_COOKIE['u_name'])){
            header('location:show.php');
        }
   /* }*/

?>
<form action="pei.php" method="post" onsubmit="return checkall()">
    <table>
        <tr>
            <td>用户名</td>
            <td><input type="text" name="user" onblur="checkuser()"/><span name="sp1"></span></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="text" name="pwd" onblur="checkpwd()"/><span name="sp2"></span></td>
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
            var user=$('user').value;
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
            var tag=/^\d{5,}$/;
            if(!tag.test(pwd)){
                $('sp2').innerHTML="密码4位以上数字";
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
    //验证所有项
    function checkall(){
        if(checkuser()&checkpwd()){
            return true;
        }
        else{
            return false;
        }
    }
</script>